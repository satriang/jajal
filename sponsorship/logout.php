<?php
	session_start();
	session_destroy();
	
	echo ' <script type="text/javascript">
	alert("Anda Sudah Keluar");
	window.location.replace("../login/login_sponsorship.php") </script>';
	//header("refresh:5;../login/login_event_creator.php");
?>