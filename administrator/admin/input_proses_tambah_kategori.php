<?php

include("koneksi.php");

$id_kategori_event = $_POST['id_kategori_event'];
$kategori_event = $_POST['kategori_event'];


$sql = "INSERT INTO `kategori_event`(`id_kategori_event`, `kategori_event`) VALUES ('{$id_kategori_event}','{$kategori_event}')" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil disimpan";
}else{
	echo "Data Gagal Disimpan : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_event.php") ;



?>