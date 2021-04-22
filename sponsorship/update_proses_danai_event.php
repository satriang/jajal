<?php
	include_once('koneksi.php');

	$id_pengajuan_event = $_POST['id_pengajuan_event'] ;
	$dana = $_POST['dana'];
	$status = $_POST['status'] ;
	
	$sql = "UPDATE pengajuan_event
			SET dana_event = '{$dana}',
				status = '{$status}' 
			WHERE `id_pengajuan_event`='{$id_pengajuan_event}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	
	
	if($eksekusi){
		if($status == "DI TERIMA"){
			echo ' <script type="text/javascript">
				alert("Terima Kasih Event Terdanai");
				window.location.replace("read_event.php") </script>'; 
		//echo "Event Berhasil Di Danai";
		//header("refresh:10; login_event_creator.php");
			}else{
				echo ' <script type="text/javascript">
				alert("Terima kasih Untuk Waktunya");
				window.location.replace("read_event.php") </script>'; 
			}
		
	}else{
		echo ' <script type="text/javascript">
				alert("Gagal Mendanai dan Menolak Event");
				window.location.replace("read_event.php") </script>'; 
	}
	
?>