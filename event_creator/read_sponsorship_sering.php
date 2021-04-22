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
        pengajuan_event.dana_event, kategori_event.kategori_event
        FROM pengajuan_event
        JOIN event ON pengajuan_event.id_event = event.id_event
        JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
        JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event
        WHERE pengajuan_event.status = 'DI TERIMA'
        ORDER by nama_sponsorship desc  LIMIT $posisi,$batas" ;

$eksekusi = mysqli_query($conn, $sql);

$sql_data_jumlah_persponsorship = "SELECT  sponsorship.nama_sponsorship, 
count(pengajuan_event.id_sponsorship) as banyak, pengajuan_event.id_sponsorship
FROM pengajuan_event
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event
WHERE pengajuan_event.status = 'DI TERIMA'
group by (sponsorship.nama_sponsorship) order by banyak desc  LIMIT $posisi,$batas";

$eksekusi_data_jumlah_persponsorship= mysqli_query($conn, $sql_data_jumlah_persponsorship);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="read_jumlah_sponsorship_yang_sering.php">Data Jumlah Per Sponsorship</a></li>
	  <li><a href="read_sponsorship_sering.php">Data Keseluruhan</a></li>
    </ul>
  </div>
 <div class="col-10 col-s-9">
 <h2 style="text-align: center;">Sponsorship Paling Sering Mendanai Event</h2> <br>
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
                                $sql2 = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.id_event, event.nama_event, pengajuan_event.dana_event, kategori_event.kategori_event
                                FROM pengajuan_event
                                JOIN event ON pengajuan_event.id_event = event.id_event
                                JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
                                WHERE pengajuan_event.status = 'DI TERIMA'
                                order by nama_sponsorship desc ";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_sponsorship_sering.php?halaman=$i\">$i</a> | ";
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
