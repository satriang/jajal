<?php

include_once('header_login.php');
//include_once('koneksi.php');

?>

<div class="col-5 col-s-12">
  <h1>LOGIN ADMIN</h1>
    <form action="proses_login_admin.php" method="POST">
        <div class="form-group">
            USER <br/>
            <input type="text" class="form-control" name="user" placeholder="Masukkan user admin"> <br/>
        </div>
        <div class="form-group">
            PASSWORD <br/>
            <input type="password" class="form-control" placeholder="Masukan password" name="password" id="password" />
            <label style="float: right;"><input type="checkbox" onclick="passwordFunction()"> Lihat Password</label><br/><br/><br/>
        </div>
            <input type="reset" class="btn btn-danger" value="Batal" name="reset">
            <input type="submit" name="submit" class="btn btn-success" style="float: right;" value="Masuk" >
     </form>
</div>

<?php

include_once('footer_login.php');

?>
