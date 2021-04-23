<?php

include("koneksi.php");

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "UPDATE `user` SET `id_user`='{$id_user}',`username`='{$username}',`password`='{$password}',`level`='{$level}' WHERE `id_user`='{$id_user}'" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil diubah";
}else{
	echo "Data Gagal diubah : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_user.php") ;
?>

?>