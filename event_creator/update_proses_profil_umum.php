<?php
	include_once('koneksi.php');

	$id_event_creator = $_POST['id_event_creator'] ;
	$nama_eo = $_POST['nama_eo'];
	$alamat = $_POST['alamat'] ;
	$no_telp = $_POST['no_telp'];
	
	$sql = "UPDATE event_creator
			SET nama_eo = '{$nama_eo}',
				alamat = '{$alamat}',
				no_telp = '{$no_telp}'
			WHERE `id_event_creator`='{$id_event_creator}'" ;
	
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