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

$sql = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_sponsorship, 
        sponsorship.nama_sponsorship, pengajuan_event.id_event, event.nama_event, 
        kategori_event.kategori_event, pengajuan_event.dana_event 
        FROM pengajuan_event 
        JOIN event ON pengajuan_event.id_event = event.id_event
        JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
        JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event
        order by pengajuan_event.dana_event desc LIMIT $posisi,$batas" ;

$eksekusi = mysqli_query($conn, $sql);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_kategori.php">Tambah Kategori Event</a></li>
      <li><a href="form_tambah_event_creator.php">Cari</a></li>
    </ul>
  </div>
 <div class="col-9 col-s-9">
  	<div style="overflow-x:auto;">
            <div class="table-responsive">  
                    <table class="w3-table-all w3-large w3-hoverable">
                            <tbody>
                        <tr>
                          <th class="w3-center">NO</th>
                          <th class="w3-center">NAMA SPONSORSHIP</th>
                          <th class="w3-center">NAMA EVENT</th>
                          <th class="w3-center">KATEGORI EVENT</th>
                          <th class="w3-center">DANA SUMBANGAN</th>
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
                            <td class="w3-center">Rp <?php echo $hasil_dana_event = number_format($row['dana_event'],0,',','.'); ?></td>
                            
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
                                $sql2 = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.id_event, event.nama_event, kategori_event.kategori_event, pengajuan_event.dana_event 
                                FROM pengajuan_event 
                                JOIN event ON pengajuan_event.id_event = event.id_event
                                JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event
                                order by pengajuan_event.dana_event desc";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_sponsorship_berdasarkan_dana.php?halaman=$i\">$i</a> | ";
                                }
                                else{ 
                                  echo " <b>$i</b> | "; 
                                }
                              echo "<p>Total sponsorship : <b>$jmldata</b> sponsorship</p>";
                            ?>
     </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
