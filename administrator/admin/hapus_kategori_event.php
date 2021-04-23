<?php

include("koneksi.php");

$id_kategori_event = $_GET['id_kategori_event'] ;

$sql = "DELETE FROM `kategori_event` WHERE`id_kategori_event`='{$id_kategori_event}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

//var_dump($hasil);
if($ekseskusi_id){
	echo "Data berhasil Di Hapus";
}else{
	echo "Data Gagal Di Hapus : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_event.php") ;

?>