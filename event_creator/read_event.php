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

//sql read event
$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
WHERE event_creator.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);

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
                  <th class="w3-center">NAMA EVENT CREATOR</th>
                  <th class="w3-center">KATEGORI EVENT </th>
                  <th class="w3-center">TANGGAL EVENT</th>
                  <th class="w3-center">PROPOSAL</th>
                  <th class="w3-center">LOKASI EVENT </th>
                  <th class="w3-center">STATUS TERDANAI EVENT</th>
                  <th class="w3-center">TANGGAL TEREALISASI EVENT</th>
                  <th class="w3-center">STATUS TERLAKSANA EVENT</th>
                  <th colspan="3" class="w3-center">ACTION</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row=mysqli_fetch_array($eksekusi)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><?php echo $row['nama_event'] ?></td>
                  <td class="w3-center"><?php echo $row['nama_eo'] ?></td>
                  <td class="w3-center"><?php echo $row['kategori_event'] ?></td>
                  <td class="w3-center"><?php echo $row['tanggal_acara'] ?></td>
                  <td class="w3-center"><a href="proposal/<?php echo $row['proposal'] ?>"/>Baca Proposal</a></td>
                  <td class="w3-center"><?php echo $row['lokasi_event'] ?></td>
                  <td class="w3-center"><?php echo $row['status_terdanai'] ?></td>
                  <td class="w3-center"><?php echo $row['tanggal_berakhir'] ?></td>
                  <td class="w3-center"><?php echo $row['status_terlaksana'] ?></td>
                  <td class="w3-center">
                    <a href="form_edit_event.php?id_event=<?php echo $row['id_event'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a> 
                    </td>
                  <td class="w3-center">
                    <a href="hapus_event.php?id_event=<?php echo $row['id_event'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
                  </td>  
                  <td class="w3-center">
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
              $sql2 = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
                       FROM event
                       JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                       JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
                       WHERE event_creator.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";
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
                        echo "<p>Total event : <b>$jmldata</b> event</p>";
                      ?>
          </div>        
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
