<?php

include("koneksi.php");

$id_kategori_event = $_POST['id_kategori_event'];
$kategori_event = $_POST['kategori_event'];


$sql = "UPDATE `kategori_event` SET `id_kategori_event`='{$id_kategori_event}',`kategori_event`='{$kategori_event}' WHERE `id_kategori_event`='{$id_kategori_event}'" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil diubah";
}else{
	echo "Data Gagal diubah : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_kategori_event.php") ;
?>

?>