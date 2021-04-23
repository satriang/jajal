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

$sql = "SELECT * FROM `user` LIMIT $posisi,$batas" ;

$eksekusi = mysqli_query($conn, $sql);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_user.php">Tambah User</a></li>
      <li><a href="form_cari_user.php">Cari</a></li>
    </ul>
  </div>
 <div class="col-9 col-s-9">
      <div class="w3-container">
            <div class="table-responsive">  
              <table class="w3-table-all w3-large w3-hoverable">
                <tbody>
                  <tr> 
                    <th>NO</th>
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>LEVEL</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                      <?php
                          $no = $posisi+1;
                          while ($row=mysqli_fetch_array($eksekusi))  {
                      ?>
                  <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $row['id_user'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['level'] ?></td>
                    <td>
                      <a href="form_edit_user.php?id_user=<?php echo $row['id_user'] ?>"  class="w3-button w3-border w3-small w3-blue"> Edit </a>
                      <a href="hapus_user.php?id_user=<?php echo $row['id_user'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
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
                $sql2 = "SELECT * FROM `user`";
                $eksekusi2 = mysqli_query($conn, $sql2);
                $jmldata    = mysqli_num_rows($eksekusi2);
                $jmlhalaman = ceil($jmldata/$batas);
              ?>
                <br/> Halaman :
              <?php
                for($i=1;$i<=$jmlhalaman;$i++)
                  if ($i != $halaman){
                    echo " <a href=\"read_user.php?halaman=$i\">$i</a> | ";
                    }
                  else{ 
                    echo " <b>$i</b> | "; 
                    }
                  echo "<p>Total User : <b>$jmldata</b> User</p>";
              ?>   
    </div>
  </div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php
 include_once('layout_bawah.php');
?>
