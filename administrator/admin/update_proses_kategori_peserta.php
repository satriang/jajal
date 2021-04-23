<?php

include("koneksi.php");

$id_kategori_peserta = $_POST['id_kategori_peserta'];
$kategori_peserta = $_POST['kategori_peserta'];
$deskripsi_kategori_peserta = $_POST['deskripsi_kategori_peserta'];


$sql = "UPDATE `kategori_peserta` SET 
        `id_kategori_peserta`='{$id_kategori_peserta}',
        `kategori_peserta`='{$kategori_peserta}',
        `deskripsi_kategori_peserta`='{$deskripsi_kategori_peserta}'
        WHERE `id_kategori_peserta`='{$id_kategori_peserta}'" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil diubah";
}else{
	echo "Data Gagal diubah : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_peserta.php") ;


?>