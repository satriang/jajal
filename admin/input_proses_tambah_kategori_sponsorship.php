<?php

include("koneksi.php");

$id_kategori_sponsorship = $_POST['id_kategori_sponsorship'];
$nama_kategori_sponsorship = $_POST['nama_kategori_sponsorship'];
$deskripsi_kategori_sponsorship = $_POST['deskripsi_kategori_sponsorship'];


$sql = "INSERT INTO `kategori_sponsorship`(`id_kategori_sponsorship`, `nama_kategori_sponsorship`, `deskripsi_kategori_sponsorship`) VALUES ('{$id_kategori_sponsorship}','{$nama_kategori_sponsorship}','{$deskripsi_kategori_sponsorship}')" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil disimpan";
}else{
	echo "Data Gagal Disimpan : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_sponsorship.php") ;



?>