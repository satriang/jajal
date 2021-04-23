<?php
	include_once('koneksi.php');

	$id_user = $_POST['id_user'] ;
	$email = $_POST['email'];
	$password = $_POST['password'] ;
	
	$sql = "UPDATE user
			SET email = '{$email}',
				password = '{$password}'
			WHERE `id_user`='{$id_user}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	
	
	if($eksekusi){
			echo ' <script type="text/javascript">
				alert("Profil Login Berhasil Diubah");
				window.location.replace("read_user_login.php") </script>';
		//echo "Profil Umum Berhasil Diubah";
		//header("refresh:10; login_event_creator.php");
		
	}else{
		echo ' <script type="text/javascript">
				alert("Profil Login Gagal Diubah");
				window.location.replace("read_user_login.php") </script>'; 
		//echo "Profil Umum Gagal Diubah";
	}
	
?>