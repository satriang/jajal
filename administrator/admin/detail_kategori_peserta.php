<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_kategori_peserta = $_GET['id_kategori_peserta'] ;

$sql = "SELECT * FROM `kategori_peserta` WHERE `id_kategori_peserta`='{$id_kategori_peserta}'" ;

$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
      <div class="table-responsive">  
        <table class="w3-table-all w3-hoverable">
          <tbody>
            <tr>
              <th class="w3-center">Id Kategori Peserta</th>
              <td><?php echo $row['id_kategori_peserta'] ?></td>
            </tr>
            <tr>
                <th class="w3-center">Nama Kategori Peserta</th>
                <td><?php echo $row['kategori_peserta'] ?></td>
            </tr>
            <tr>
                <th class="w3-center">Deskripsi Kategori Peserta</th>
                <td><?php echo $row['deskripsi_kategori_peserta'] ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                <a href="read_kategori_peserta.php"  class="w3-button w3-border w3-small w3-purple"> Kembali </a>
                <a href="hapus_kategori_peserta.php?id_kategori_peserta=<?php echo $row['id_kategori_peserta'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
                <a href="form_edit_kategori_peserta.php?id_kategori_peserta=<?php echo $row['id_kategori_peserta'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a>
                </td>
            </tr>
          </tbody>
        </table>
       </div>       
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
