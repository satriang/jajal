<?php

include_once('layout_atas.php');

$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{
	  $posisi  = ($halaman-1) * $batas;
	}

$id_sponsorship = $hasil['id_sponsorship'];

//sql read event
$sql = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'Di AJUKAN'
LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
  <div class="col-10 col-s-9">
        <div style="overflow-x:auto;">
          <div class="table-responsive">
            <table class="w3-table-all w3-hoverable">
              <tbody>
                <tr>
                  <th class="w3-center">NO</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">STATUS</th>
                  <th colspan="2" class="w3-center">ACTION</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row=mysqli_fetch_array($eksekusi)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>
                  <td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row['id_event'] ?>"><?php echo $row['nama_event'] ?></a></td>
                  <td class="w3-center"><?php echo $row['status'] ?></td>
                  <td class="w3-center">
                    <a href="form_danai_event.php?id_pengajuan_event=<?php echo $row['id_pengajuan_event'] ?>" class="w3-button w3-border w3-small w3-blue"> Konfirmasi </a>
                    <a href="detail_event1.php?id_event=<?php echo $row['id_event'] ?>"  class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
                  </td>
                </tr>

                  <?php
                     $no++;
                    }
                  ?>
              </tbody>
            </table>

              <?php
              // Langkah 3: Hitung total data dan halaman serta link 1,2,3
              $sql2 = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
              FROM `pengajuan_event`
             JOIN event ON pengajuan_event.id_event = event.id_event
             JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
             JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
             WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'Di Ajukan'
             LIMIT $posisi,$batas";
              $eksekusi2 = mysqli_query($conn, $sql2);
              $jmldata    = mysqli_num_rows($eksekusi2);
              $jmlhalaman = ceil($jmldata/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event creator : <b>$jmldata</b> event creator</p>";
                      ?>
          </div>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
