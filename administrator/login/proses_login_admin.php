<?php
	session_start() ;
	include("koneksi.php") ;

	$user = $_POST['user'] ;
	$password = $_POST['password'] ;
	
	$sql = "SELECT * FROM `user` WHERE `email`='{$user}' AND `password`='{$password}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	$hasil = mysqli_fetch_assoc($eksekusi) ;
	
	$jumlah = count($hasil) ;
	
	if($jumlah <= 0){
		echo ' <script type="text/javascript">
				alert("User atau Password Salah");
				window.location.replace("../login/login_admin.php") </script>';
		//echo "Email atau Password Salah";
		//header("refresh:10; login_event_creator.php");
	}else{
		$_SESSION["id_user"] = $hasil["id_user"] ;
		$_SESSION["email"] = $hasil["email"] ;
		header("Location: ../admin/read_user.php");
	}
	
?>
