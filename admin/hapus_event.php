<?php

include("koneksi.php");

$id_event = $_GET['id_event'] ;

$sql = "DELETE FROM `event` WHERE`id_event`='{$id_event}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

//var_dump($hasil);
if($ekseskusi_id){
	echo "Data berhasil Di Hapus";
}else{
	echo "Data Gagal Di Hapus : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_user.php") ;

?>