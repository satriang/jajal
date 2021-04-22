<?php

include("koneksi.php");

$id_user = $_POST['id_user'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "INSERT INTO `user`(`id_user`, `email`, `password`, `level`) VALUES ('{$id_user}','{$email}','{$password}','{$level}')" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo ' <script type="text/javascript">
	alert("Data Berhasil Di Simpan");
	window.location.replace("read_user.php") </script>';
//	header("Location: read_user.php") ;
}else{
	echo ' <script type="text/javascript">
	alert("Data Gagal Disimpan\nNo Error : '. mysqli_errno($conn). '\nPesan Error : '.mysqli_error($conn).'");
	window.location.replace("read_user.php") </script>';
}



?>