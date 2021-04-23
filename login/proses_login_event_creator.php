<?php
	session_start() ;
	include("koneksi.php") ;

	$email = $_POST['email'] ;
	$password = $_POST['password'] ;
	
	$sql = "SELECT user.id_user, event_creator.id_event_creator FROM `user` JOIN event_creator ON user.id_user = event_creator.id_user WHERE `email`='{$email}' AND `password`='{$password}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	$hasil = mysqli_fetch_assoc($eksekusi) ;
	
	$jumlah = count($hasil) ;
	
	if($jumlah <= 0){
		echo ' <script type="text/javascript">
				alert("Email atau Password Salah");
				window.location.replace("../login/login_event_creator.php") </script>';
		//echo "Email atau Password Salah";
		//header("refresh:10; login_event_creator.php");
	}else{
		$_SESSION["id_user"] = $hasil["id_user"] ;
		$_SESSION["id_event_creator"] = $hasil["id_event_creator"] ;
		header("Location: ../event_creator/read_user_umum.php");
	}
	
?>
