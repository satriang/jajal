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


$sql_event_didanai = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status, event.dana_anggaran
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
$eksekusi_event_didanai = mysqli_query($conn, $sql_event_didanai);
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
                  <th class="w3-center">DANA</th>
                  <th class="w3-center">STATUS</th>
                  <th class="w3-center">PRESENTASE SUMBANGAN</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row2=mysqli_fetch_array($eksekusi_event_didanai)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>
                  <td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row2['id_event'] ?>"><?php echo $row2['nama_event'] ?></a></td>
                    <td class="w3-center"><label><?php $hasil_rupiah = "Rp " . number_format($row2['dana_event'],2,',','.'); echo $hasil_rupiah;?></label></td>
                  <td class="w3-center"><?php echo $row2['status'] ?></td>
                  <td class="w3-center"><?php $dana_sumbangan = $row2['dana_event'] / $row2['dana_anggaran'] * 100;
                      echo $dana_sumbangan;?> %
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
              $sql2_event_diterima = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event,
                                              event.nama_event, event.id_event_creator, event_creator.nama_eo,
                                              pengajuan_event.dana_event, pengajuan_event.status
                                              FROM `pengajuan_event`
                                              JOIN event ON pengajuan_event.id_event = event.id_event
                                              JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                              JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                                              WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
              $eksekusi2_event_diterima = mysqli_query($conn, $sql2_event_diterima);
              $jmldata_event_diterima   = mysqli_num_rows($eksekusi2_event_diterima);
              $jmlhalaman_event_diterima = ceil($jmldata_event_diterima/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman_event_diterima;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event : <b>$jmldata_event_diterima</b> event</p>";
                      ?>
          </div>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
