<?php

include_once('layout_atas_form.php');

$id_user = $_SESSION['id_user'];

$sql_user ="SELECT * FROM user WHERE id_user = '{$id_user}'";
$query_sql_user =mysqli_query($conn, $sql_user);
$row = mysqli_fetch_array($query_sql_user);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="read_user_umum.php">Profil Umum</a></li>
      <li><a href="read_user_login.php">Profil Login</a></li>
    </ul>
  </div>
  <div class="col-9 col-s-9">
      <table border="0">
        <form action="update_proses_profil_login.php" method="post"  enctype="multipart/form-data">
          <tr>
            <td style="font-weight: bold;">ID USER</td>
            <td><input type="text" class="form-control" name="id_user" value="<?php echo $row['id_user'] ?>" readonly/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">EMAIL</td>
            <td><input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>"/> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">PASSWORD</td>
            <td><input type="password" class="form-control" name="password" id="password" value="<?php echo $row['password'] ?>"/> 
            <label style="float: right;"><input type="checkbox" onclick="passwordFunction()"> Lihat Password</label>
          </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right; position: right;">
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
