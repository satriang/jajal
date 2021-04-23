<?php

include("koneksi.php");

$id_kategori_peserta = $_GET['id_kategori_peserta'] ;

$sql = "DELETE FROM `kategori_peserta` WHERE`id_kategori_peserta`='{$id_kategori_peserta}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

//var_dump($hasil);
if($ekseskusi_id){
	echo "Data berhasil Di Hapus";
}else{
	echo "Data Gagal Di Hapus : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_peserta.php") ;

?>