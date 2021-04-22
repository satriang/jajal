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

$sql = "SELECT sponsorship.id_sponsorship, user.id_user, user.email, 
        sponsorship.nama_sponsorship, sponsorship.alamat, 
        sponsorship.no_telp, sponsorship.dana_maksimal, sponsorship.deskripsi_sponsorship
        FROM sponsorship LEFT JOIN user
        ON sponsorship.id_user = user.id_user LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
//var_dump(array_values($eksekusi));
?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_event_creator.php">Tambah Sponsorship</a></li>
      <li><a href="form_tambah_event_creator.php">Cari</a></li>
    </ul>
  </div>
  <div class="col-10 col-s-9">
  	<div style="overflow-x:auto;">
      <div class="table-responsive">  
        <table class="w3-table-all w3-hoverable">
          <tbody>
            <tr>
            <th class="w3-center">NO</th>
              <th class="w3-center">ID_SPONSORSHIP</th>
              <th class="w3-center">ID_USER</th>
              <th class="w3-center">EMAIL</th>
              <th class="w3-center">NAMA_SPONSORSHIP</th>
              <th class="w3-center">ALAMAT</th>
              <th class="w3-center">NO_TELP</th>
              <th colspan="3" class="w3-center">ACTION</th>
            </tr>

                       <?php
                              $no = $posisi+1;
                              while ($row=mysqli_fetch_array($eksekusi)) {
                            ?>

            <tr>
            <td><?php echo $no ?></td>         
              <td><?php echo $row['id_sponsorship'] ?></td>
              <td><?php echo $row['id_user'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['nama_sponsorship'] ?></td>
              <td><?php echo $row['alamat'] ?></td>
              <td><?php echo $row['no_telp'] ?></td>

              <td>
                <a href="form_edit_sponsorship.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a> 
              </td>
              <td>
                <a href="hapus_sponsorship.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
              </td>
              <td>
                <a href="detail_sponsorship.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>"  class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
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
                                $sql2 = "SELECT sponsorship.id_sponsorship, user.id_user, user.email, sponsorship.nama_sponsorship, sponsorship.alamat, 
                                sponsorship.no_telp, sponsorship.dana_maksimal, sponsorship.deskripsi_sponsorship
                                FROM sponsorship LEFT JOIN user
                                ON sponsorship.id_user = user.id_user ";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_sponsorship.php?halaman=$i\">$i</a> | ";
                                }
                                else{ 
                                  echo " <b>$i</b> | "; 
                                }
                              echo "<p>Total Sponsorship : <b>$jmldata</b> sponsorship</p>";
                            ?>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
