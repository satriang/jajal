<?php

include_once('header_signup.php');
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

$sql = "SELECT * FROM `kategori_sponsorship` LIMIT $posisi,$batas" ;

$eksekusi = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
<div class="row" style="margin-top:1em; margin-bottom:10em;">
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>

 <div class="col-9 col-s-9">
  	<div style="overflow-x:auto;">
            <div class="table-responsive">  
                    <table class="w3-table-all w3-large w3-hoverable">
                            <tbody>
                        <tr>
                          <th>NO</th>
                          <th>NAMA KATEGORI SPONSORSHIP</th>
                          <th>DESKRIPSI KATEGORI SPONSORSHIP</th>
                        </tr>
                      <?php
                            $no = $posisi+1;
                             while ($row=mysqli_fetch_array($eksekusi))  {
                      ?>
                       <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $row['nama_kategori_sponsorship'] ?></td>
                            <td><?php echo $row['deskripsi_kategori_sponsorship'] ?></td>              
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
                                $sql2 = "SELECT * FROM `kategori_sponsorship`";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_kategori_sponsorship.php?halaman=$i\">$i</a> | ";
                                }
                                else{ 
                                  echo " <b>$i</b> | "; 
                                }
                              echo "<p>Total kategori : <b>$jmldata</b> kategori</p>";
                            ?>
     </div>
  </div>

<?php
 include_once('footer_signup.php');
?>
