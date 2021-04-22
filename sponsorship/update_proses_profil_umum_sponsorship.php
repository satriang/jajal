<?php
	include_once('koneksi.php');

	$id_sponsorship = $_POST['id_sponsorship'] ;
	$judul_sponsorship = $_POST['judul_sponsorship'];
	$id_kategori_sponsorship = $_POST['id_kategori_sponsorship'];
	$nama_sponsorship = $_POST['nama_sponsorship'];
	$alamat = $_POST['alamat'] ;
	$no_telp = $_POST['no_telp'];
	$dana_maksimal = $_POST['dana_maksimal'] ;
	$deskripsi_sponsorship = $_POST['deskripsi_sponsorship'];
	
	$sql = "UPDATE sponsorship
			SET id_kategori_sponsorship = '{$id_kategori_sponsorship}',
				judul_sponsorship = '{$judul_sponsorship}',
				nama_sponsorship = '{$nama_sponsorship}',
				alamat = '{$alamat}',
				no_telp = '{$no_telp}',
				deskripsi_sponsorship = '{$deskripsi_sponsorship}' 
			WHERE `id_sponsorship`='{$id_sponsorship}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	
	
	if($eksekusi){
			echo ' <script type="text/javascript">
				alert("Profil Umum Berhasil Diubah");
				window.location.replace("read_user_umum.php") </script>';
		//echo "Profil Umum Berhasil Diubah";
		//header("refresh:10; login_event_creator.php");
		
	}else{
		echo ' <script type="text/javascript">
				alert("Profil Umum Gagal Diubah");
				window.location.replace("read_user_umum.php") </script>'; 
		//echo "Profil Umum Gagal Diubah";
	}
	
?>