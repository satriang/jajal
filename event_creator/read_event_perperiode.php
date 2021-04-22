<?php

include_once('layout_atas.php');
include_once('koneksi.php');

$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];
$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}

$sql = "SELECT pengajuan_event.id_event, event.nama_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, 
        pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, 
        pengajuan_event.dana_event, pengajuan_event.status, kategori_event.kategori_event
        FROM event
        JOIN pengajuan_event ON event.id_event = pengajuan_event.id_event
        JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event
        JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
        WHERE (event.tanggal BETWEEN '{$tanggal_awal}' AND '{$tanggal_akhir}') AND pengajuan_event.status ='DI TERIMA'" ;

$eksekusi = mysqli_query($conn, $sql);

?>
  <div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <!--<ul>
      <li><a href="form_tambah_kategori.php">Tambah Kategori Event</a></li>
      <li><a href="form_tambah_event_creator.php">Cari</a></li>
    </ul>-->
  </div>
 <div class="col-11 col-s-9">
 <h2 style="text-align: center;">Event Tersponsori Berdasarkan Tanggal</h2> <br>
  	<div style="overflow-x:auto;">
            <div class="table-responsive">  
                    <table class="w3-table-all w3-large w3-hoverable">
                            <tbody>
                        <tr>
                          <th class="w3-center">NO</th>
                          <th class="w3-center">NAMA SPONSORSHIP</th>
                          <th class="w3-center">NAMA EVENT</th>
                          <th class="w3-center">KATEGORI EVENT</th>
                          <th class="w3-center">TANGGAL EVENT
                          <th class="w3-center">DANA SUMBANGAN</th>
                          <th class="w3-center">STATUS</th>
                        </tr>
                      <?php
                            $no = $posisi+1;
                             while ($row=mysqli_fetch_array($eksekusi))  {
                      ?>
                       <tr>
                            <td class="w3-center"><?php echo $no?></td>
                            <td class="w3-center"><?php echo $row['nama_sponsorship'] ?></td>
                            <td class="w3-center"><?php echo $row['nama_event'] ?></td>
                            <td class="w3-center"><?php echo $row['kategori_event'] ?></td>
                            <td class="w3-center"><?php echo $row['tanggal_acara'] ?></td>
                            <td class="w3-center">Rp <?php echo $hasil_dana_event = number_format($row['dana_event'],0,',','.'); ?></td>
                            <td class="w3-center"><?php echo $row['status'] ?></td>
                       </tr>
                       <?php
                          $no++;
                            }
                            ?>
                         </tbody>                             
                     </table>                            
            </div>
            
            
     </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
