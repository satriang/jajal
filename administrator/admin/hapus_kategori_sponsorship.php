<?php

include("koneksi.php");

$id_kategori_sponsorship = $_GET['id_kategori_sponsorship'] ;

$sql = "DELETE FROM `kategori_sponsorship` WHERE`id_kategori_sponsorship`='{$id_kategori_sponsorship}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

//var_dump($hasil);
if($ekseskusi_id){
	echo "Data berhasil Di Hapus";
}else{
	echo "Data Gagal Di Hapus : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_sponsorship.php") ;

?>