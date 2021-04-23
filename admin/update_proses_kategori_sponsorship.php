<?php

include("koneksi.php");

$id_kategori_sponsorship = $_POST['id_kategori_sponsorship'];
$nama_kategori_sponsorship = $_POST['nama_kategori_sponsorship'];
$deskripsi_kategori_sponsorship = $_POST['deskripsi_kategori_sponsorship'];


$sql = "UPDATE `kategori_sponsorship` SET 
        `id_kategori_sponsorship`='{$id_kategori_sponsorship}',
        `nama_kategori_sponsorship`='{$nama_kategori_sponsorship}',
        `deskripsi_kategori_sponsorship`='{$deskripsi_kategori_sponsorship}'
        WHERE `id_kategori_sponsorship`='{$id_kategori_sponsorship}'" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil diubah";
}else{
	echo "Data Gagal diubah : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_sponsorship.php") ;


?>