<?php

include_once('header_signup.php');
include_once('koneksi.php');

$query_user = mysqli_query($conn, "SELECT max(id_user) as kodeMaksimal FROM user");
$data_user = mysqli_fetch_array($query_user);
$id_user = $data_user['kodeMaksimal'];

$query_event_creator = mysqli_query($conn, "SELECT max(id_event_creator) as kodeMaksimal FROM event_creator");
$data_event_creator = mysqli_fetch_array($query_event_creator);
$id_event_creator = $data_event_creator['kodeMaksimal'];

$urutan_user = (int) substr($id_user, 3, 3);
$urutan_event_creator = (int) substr($id_event_creator, 3, 3);

$urutan_user++;
$urutan_event_creator++;

$huruf_user = "USR";
$id_user = $huruf_user . sprintf("%03s", $urutan_user);
$huruf_event_creator = "ECT";
$id_event_creator = $huruf_event_creator . sprintf("%03s", $urutan_event_creator);
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
  <h1>Silahkan Daftar Sebagai Event Creator</h1>
  <form action="proses_daftar_event_creator.php" method="POST">
      <div class="form-group">
          <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>" >
          <input type="hidden" class="form-control" name="id_event_creator" value="<?php echo $id_event_creator; ?>">
          NAMA EVENT CREATOR <br/>
          <input type="text" class="form-control" name="nama_eo" placeholder="Masukkan nama EVENT CREATOR anda"> <br/>
      </div>
      <div class="form-group">
          EMAIL <br/>
          <input type="email" class="form-control" name="email" placeholder="Masukkan email anda"> <br/>
      </div>
      <div class="form-group">
          NO TELP <br/>
          <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" name="no_telp" placeholder="Masukkan nomer telpon anda"> <br/>
      </div>
      <div class="form-group">
          ALAMAT <br/>
          <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda"></textarea> <br/>
      </div>
      <div class="form-group">
          PASSWORD <br/>
          <input type="password" name="password" class="form-control" placeholder="Masukan password" id="password" />
          <br/>
      </div>
      <div class="form-group">
          KETIK ULANG PASSWORD <br/>
          <input type="password" name="password_konfirm" class="form-control" placeholder="Masukan Kembali password" id="repassword" />
          <label style="float: right;"><input type="checkbox" onclick="passwordFunction()"> Lihat Password</label><br/><br/>
      </div>
        <input type="reset"  class="btn btn-danger"   value="Batal" >
        <input type="submit"  class="btn btn-success" name="submit" style="float: right;" value="Daftar" >
</form>
</div>

<?php

include_once('footer_signup.php');

?>
