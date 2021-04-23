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

$sql = "SELECT * FROM `kategori_peserta` LIMIT $posisi,$batas" ;

$eksekusi = mysqli_query($conn, $sql);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_kategori_peserta.php">Tambah Kategori Peserta Event</a></li>
    </ul>
  </div>
 <div class="col-9 col-s-9">
 <h1 style="text-align: center;">Daftar Kategori Peserta</h1>
  	<div style="overflow-x:auto;">
            <div class="table-responsive">  
                    <table class="w3-table-all w3-large w3-hoverable">
                            <tbody>
                        <tr>
                          <th>NO</th>
                          <th>ID</th>
                          <th>KATEGORI</th>
                          <th>ACTION</th>
                        </tr>
                      <?php
                            $no = $posisi+1;
                             while ($row=mysqli_fetch_array($eksekusi))  {
                      ?>
                       <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $row['id_kategori_peserta'] ?></td>
                            <td><?php echo $row['kategori_peserta'] ?></td>
                            <td>
                                <a href="form_edit_kategori_peserta.php?id_kategori_peserta=<?php echo $row['id_kategori_peserta'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a>
                                <a href="hapus_kategori_peserta.php?id_kategori_peserta=<?php echo $row['id_kategori_peserta'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
                                <a href="detail_kategori_peserta.php?id_kategori_peserta=<?php echo $row['id_kategori_peserta'] ?>"  class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
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
                                $sql2 = "SELECT * FROM `kategori_peserta`";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_kategori_peserta.php?halaman=$i\">$i</a> | ";
                                }
                                else{ 
                                  echo " <b>$i</b> | "; 
                                }
                              echo "<p>Total kategori : <b>$jmldata</b> kategori</p>";
                            ?>
     </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
