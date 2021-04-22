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

//var_dump(array_values($eksekusi));
// sql read pengajuan event
$sql_pengajuan_event = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.status
FROM `pengajuan_event` 
JOIN event ON pengajuan_event.id_event = event.id_event 
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship 
WHERE event.id_event_creator = '{$id_event_creator}' AND pengajuan_event.status = 'DI AJUKAN'
LIMIT $posisi,$batas";
$eksekusi_pengajuan_event = mysqli_query($conn, $sql_pengajuan_event);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_event.php">Tambah Event</a></li>
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
                  <th class="w3-center">NAMA SPONSORSHIP</th>
                  <th class="w3-center">STATUS</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row2=mysqli_fetch_array($eksekusi_pengajuan_event)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row2['id_event'] ?>"><?php echo $row2['nama_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row2['id_sponsorship'] ?>"><?php echo $row2['nama_sponsorship'] ?></a></td>
                  <td class="w3-center"><?php echo $row2['status'] ?></td>
                </tr>

                  <?php
                     $no++;
                    }
                  ?>
              </tbody>
            </table>
          
              <?php
              // Langkah 3: Hitung total data dan halaman serta link 1,2,3 
              $sql2_pengajuan_event = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.status
              FROM `pengajuan_event` 
              JOIN event ON pengajuan_event.id_event = event.id_event 
              JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship 
              WHERE event.id_event_creator = '{$id_event_creator}' AND pengajuan_event.status = 'DI AJUKAN'";
              $eksekusi2_pengajuan_event = mysqli_query($conn, $sql2_pengajuan_event);
              $jmldata_pengajuan_event    = mysqli_num_rows($eksekusi2_pengajuan_event);
              $jmlhalaman_pengajuan_event = ceil($jmldata_pengajuan_event/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman_pengajuan_event;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event : <b>$jmldata_pengajuan_event</b> event</p>";
                      ?>
          </div>        
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
