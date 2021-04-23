<?php

include_once('header_signup.php');
include_once('koneksi.php');

$query_user = mysqli_query($conn, "SELECT max(id_user) as kodeMaksimal FROM user");
$data_user = mysqli_fetch_array($query_user);
$id_user = $data_user['kodeMaksimal'];

$query_sponsorship = mysqli_query($conn, "SELECT max(id_sponsorship) as kodeMaksimal FROM sponsorship");
$data_sponsorship = mysqli_fetch_array($query_sponsorship);
$id_sponsorship = $data_sponsorship['kodeMaksimal'];

$urutan_user = (int) substr($id_user, 3, 3);
$urutan_sponsorship = (int) substr($id_sponsorship, 3, 3);

$urutan_user++;
$urutan_sponsorship++;

$huruf_user = "USR";
$id_user = $huruf_user . sprintf("%03s", $urutan_user);
$huruf_sponsorship = "SPR";
$id_sponsorship = $huruf_sponsorship . sprintf("%03s", $urutan_sponsorship);

$query_kategori_sponsorship = mysqli_query($conn, "SELECT * from kategori_sponsorship");

?>
<div class="container-fluid">
<div class="row" style="margin-top:1em; margin-bottom:10em;">
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="signup_sponsorship.php" style="color:#000000; font-weight: bold;">SPONSORSHIP</a></li>
      <li><a href="signup_event_creator.php" style="color:#000000; font-weight: bold;">EVENT CREATOR</a></li>
    </ul>
  </div>

  <div class="col-3 col-s-9">

  </div>
<div class="col-5 col-s-12">
  <h1>Silahkan Daftar Sebagai Sponsorship</h1>
  <form action="proses_daftar_sponsorship.php" method="POST">
  	 <div class="form-group">
        <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>"> 
        <input type="hidden" class="form-control" name="id_sponsor" value="<?php echo $id_sponsorship; ?>">
          NAMA SPONSOR <br/>
          <input type="text" class="form-control" name="nama_sponsor" placeholder="Masukkan nama SPONSOR"> <br/>
      </div>
      <div class="form-group">
          EMAIL <br/>
          <input type="email" class="form-control" name="email" placeholder="Masukkan email"> <br/>
      </div>
      <div class="form-group">
          NO TELP <br/>
          <input type="text" class="form-control" name="no_telp" placeholder="Masukkan nomer telpon"> <br/>
      </div>
      <div class="form-group">
          ALAMAT <br/>
          <textarea name="alamat" class="form-control" placeholder="Masukkan alamat"></textarea> <br/>
      </div>
      <div class="form-group">
          JUDUL SPONSOR <br/>
          <input type="text" class="form-control" name="judul" placeholder="Sebutkan bidang usaha sponsorship"> <br/>
      </div>
      <div class="form-group">
          DESKRIPSI SPONSOR <br/>
          <textarea name="deskripsi_sponsor" class="form-control" placeholder="Masukkan deskripsi sponsor"></textarea> <br/>
      </div>
      <div class="form-group">
            Kategori Sponsorship <br>
            <select name="id_kategori_sponsorship" class="form-control">
                <?php
                 while ($data_kategori_sponsorship = mysqli_fetch_array($query_kategori_sponsorship)){
              ?>
                <option value="<?php echo $data_kategori_sponsorship['id_kategori_sponsorship'];?>"><?php echo $data_kategori_sponsorship['nama_kategori_sponsorship'];?></option>
                 <?php } ?>
              </select>
              <label style="float:right;"><a href="read_kategori_sponsorship.php">Lihat detail kategori sponsorship</a></label>
      </div>
      <div class="form-group">
          PASSWORD <br/>
          <input type="password" class="form-control" placeholder="Masukan password" name="password" id="password" /> <br/>
      </div>
      <div class="form-group">
          KETIK ULANG PASSWORD <br/>
          <input type="password" class="form-control" placeholder="Masukan Kembali password" name="password_konfirm" id="repassword" />
          <label style="float: right;"><input type="checkbox" onclick="passwordFunction()"> Lihat Password</label><br/>
      </div>
        <input type="reset"  class="btn btn-danger"   value="Batal" >
        <input type="submit"  class="btn btn-success" name="submit" style="float: right;" value="Daftar" >
</form>
</div>

<?php

include_once('footer_signup.php');

?>
