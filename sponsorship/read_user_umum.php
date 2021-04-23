<?php

include_once('layout_atas_form.php');

$id_sponsorship = $hasil['id_sponsorship'];

$sql_sponsor ="SELECT sponsorship.id_sponsorship, sponsorship.judul_sponsorship, sponsorship.nama_sponsorship,
                kategori_sponsorship.nama_kategori_sponsorship, sponsorship.nama_sponsorship,
                sponsorship.alamat, sponsorship.no_telp, sponsorship.deskripsi_sponsorship, kategori_sponsorship.id_kategori_sponsorship
                FROM sponsorship 
                JOIN kategori_sponsorship ON sponsorship.id_kategori_sponsorship = kategori_sponsorship.id_kategori_sponsorship 
                WHERE id_sponsorship = '{$id_sponsorship}'";
$query_sql_sponsor =mysqli_query($conn, $sql_sponsor);
$row = mysqli_fetch_array($query_sql_sponsor);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="read_user_umum.php">Profil Umum</a></li>
      <li><a href="read_user_login.php">Profil Login</a></li>
    </ul>
  </div>
  <div class="col-9 col-s-9">
      <table border="0">
        <form action="update_proses_profil_umum_sponsorship.php" method="post"  enctype="multipart/form-data">
          <tr>
            <td style="font-weight: bold;">ID SPONSORSHIP</td>
            <td><input type="text" class="form-control" name="id_sponsorship" value="<?php echo $row['id_sponsorship'] ?>" readonly/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">JUDUL SPONSORSHIP</td>
            <td><input type="text" class="form-control" name="judul_sponsorship" value="<?php echo $row['judul_sponsorship'] ?>"/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">KATEGORI SPONSORSHIP</td>
            <td><input type="text" class="form-control" name="id_kategori_sponsorship" value="<?php echo $row['nama_kategori_sponsorship'] ?>"/>
                <input type="hidden" name="id_kategori_sponsorship" value="<?php echo $row['id_kategori_sponsorship']; ?>"/></td>
          </tr>
          <tr>
            <td style="font-weight: bold;">NAMA SPONSORSHIP</td>
            <td><input type="text" class="form-control" name="nama_sponsorship" value="<?php echo $row['nama_sponsorship'] ?>"/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">ALAMAT</td>
            <td><textarea name="alamat" class="form-control"> <?php echo $row['alamat'] ?></textarea> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">No TELP</td>
            <td><input type="text" class="form-control" name="no_telp" value="<?php echo $row['no_telp'] ?>"/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">DESKRPSI SPONSORSHIP</td>
            <td><textarea name="deskripsi_sponsorship" class="form-control"><?php echo $row['deskripsi_sponsorship'] ?></textarea> </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right;">
              <input type="reset" class="w3-button w3-border w3-medium w3-red" style="float: left;" value="Kembali"/>
            <input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Ubah" /></td>
          </tr>
         </form>
         <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
          </iframe>
      </table>
  </div>

<?php
 include_once('layout_bawah.php');
?>
