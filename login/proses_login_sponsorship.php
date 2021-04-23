<?php
	session_start() ;
	include("koneksi.php") ;

	$email = $_POST['email'] ;
	$password = $_POST['password'] ;
	
	$sql = "SELECT user.id_user, sponsorship.id_sponsorship FROM `user` JOIN sponsorship ON user.id_user = sponsorship.id_user WHERE `email`='{$email}' AND `password`='{$password}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	$hasil = mysqli_fetch_assoc($eksekusi) ;
	
	$jumlah = count($hasil) ;
	
	if($jumlah <= 0){
		//echo "Email atau Password Salah";
		echo ' <script type="text/javascript">
				alert("Email atau Password Salah");
				window.location.replace("../login/login_sponsorship.php") </script>';
		//header("refresh:10; login_event_creator.php");
	}else{
		$_SESSION["id_user"] = $hasil["id_user"] ;
		$_SESSION["id_sponsorship"] = $hasil["id_sponsorship"] ;
		header("Location: ../sponsorship/read_user_umum.php");
	}
	
?>
