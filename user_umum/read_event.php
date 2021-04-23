<?php

include_once('layout_atas.php');
include_once('koneksi.php');

$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}

$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event WHERE event.status_terlaksana != 'SUDAH TERLAKSANA' LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
//var_dump(array_values($eksekusi));
?>
  <div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
  <div class="col-11 col-s-9">
  	<div style="overflow-x:auto;">
      <div class="table-responsive">  
        <table class="w3-table-all w3-hoverable">
          <tbody>
            <tr>
            <th class="w3-center">No</th>
              <th class="w3-center">Nama Event</th>
              <th class="w3-center">Kategori Event </th>
              <th class="w3-center">Tanggal Event</th>
              <th class="w3-center">Action </th>
            </tr>

                       <?php
                              $no = $posisi+1;
                              while ($row=mysqli_fetch_array($eksekusi)) {
                            ?>

            <tr>
            <td class="w3-center"><?php echo $no ?></td>         
              <td class="w3-center"><?php echo $row['nama_event'] ?></td>
              <td class="w3-center"><?php echo $row['kategori_event'] ?></td>
              <td class="w3-center"><?php echo $row['tanggal_acara'] ?></td>
              <td class="w3-center">
                <a href="detail_event.php?id_event=<?php echo $row['id_event'] ?>" class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
              </td>      
            </tr>

                       <?php
                          $no++;
                            }
                            ?>

          </tbody>
        </table>
      </div>
      <?php
        // Langkah 3: Hitung total data dan halaman serta link 1,2,3 
                                $sql2 = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
                                FROM event
                                JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                                JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event WHERE event.status_terlaksana != 'SUDAH TERLAKSANA'";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                                }
                                else{ 
                                  echo " <b>$i</b> | "; 
                                }
                              echo "<p>Total event creator : <b>$jmldata</b> event creator</p>";
                            ?>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
