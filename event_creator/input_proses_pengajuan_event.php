<?php

include("koneksi.php");

$id_pengajuan_event = $_POST['id_pengajuan_event'];
$id_sponsorship= $_POST['id_sponsorship'];
$status = $_POST['status'];
$id_event = $_POST['id_event'];


$sql = "INSERT INTO `pengajuan_event`(`id_pengajuan_event`, `id_event`, `id_sponsorship`, `status`) VALUES ('{$id_pengajuan_event}','{$id_event}','{$id_sponsorship}','{$status}')" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	//echo "Data berhasil disimpan";
    echo ' <script type="text/javascript">
            	alert("Event Berhasil Diajukan");
                window.location.replace("read_sponsorship.php") </script>';
}else{
	//echo "Data Gagal Disimpan : ". $sql . "<br>" . mysqli_error($koneksi);
    echo ' <script type="text/javascript">
            	alert("Gagal Mengajukan Event");
                window.location.replace("read_sponsorship.php") </script>';
}
//header("Location: read_kategori_event.php") ;
?>