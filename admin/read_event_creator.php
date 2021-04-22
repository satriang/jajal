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

$sql = "SELECT event_creator.id_event_creator, event_creator.id_user, user.email, user.password, event_creator.nama_eo,event_creator.alamat,event_creator.no_telp
FROM event_creator LEFT JOIN user
ON event_creator.id_user=user.id_user LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
//var_dump(array_values($eksekusi));
?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_event_creator.php">Tambah Event Creator</a></li>
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
              <th class="w3-center">ID_EVENT_CREATOR</th>
              <th class="w3-center">ID_USER</th>
              <th class="w3-center">EMAIL</th>
              <th class="w3-center">PASSWORD</th>
              <th class="w3-center">NAMA_EO</th>
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
              <td><?php echo $row['id_event_creator'] ?></td>
              <td><?php echo $row['id_user'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['password'] ?></td>
              <td><?php echo $row['nama_eo'] ?></td>
              <td><?php echo $row['alamat'] ?></td>
              <td><?php echo $row['no_telp'] ?></td>
              <td>
                <a href="form_edit_event_creator.php?id_event_creator=<?php echo $row['id_event_creator'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a> 
              </td>
              <td>
                <a href="hapus.php?id_event_creator=<?php echo $row['id_event_creator'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
              </td>
              <td>
                <a href="hapus.php?id_kategori_event=<?php echo $row['id_kategori_event'] ?>"  class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
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
                                $sql2 = "SELECT event_creator.id_event_creator, event_creator.id_user, user.email, user.password, event_creator.nama_eo,event_creator.alamat,event_creator.no_telp
                                FROM event_creator LEFT JOIN user
                                ON event_creator.id_user=user.id_user ";
                                $eksekusi2 = mysqli_query($conn, $sql2);
                                $jmldata    = mysqli_num_rows($eksekusi2);
                                $jmlhalaman = ceil($jmldata/$batas);
            ?>
                      <br/> Halaman :
                            <?php
                                for($i=1;$i<=$jmlhalaman;$i++)
                                if ($i != $halaman){
                                  echo " <a href=\"read_event_creator.php?halaman=$i\">$i</a> | ";
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
