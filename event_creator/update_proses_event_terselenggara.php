<?php
	include_once('koneksi.php');

	$id_event = $_POST['id_event'] ;
	$tanggal_terlaksana = $_POST['tanggal_event_terlaksana'];
    $status_terlaksana = "SUDAH TERLAKSANA";

	$sql = "UPDATE event
			SET tanggal_terlaksana = '{$tanggal_terlaksana}',
				status_terlaksana = '{$status_terlaksana}'
			WHERE `id_event`='{$id_event}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	if($eksekusi){
			/*echo ' <script type="text/javascript">
				alert("Profil Login Berhasil Diubah");
				window.location.replace("read_user_login.php") </script>';*/
		//echo "Profil Umum Berhasil Diubah";
		//header("refresh:10; login_event_creator.php");
        $jumlah = count($_FILES['gambar']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];	
                $tanggal_sekarang = date("Y-m-d_h-i-s");
                $nama_foto_baru = $id_event ."_$tanggal_sekarang". "_".$file_name;			
				move_uploaded_file($tmp_name, "img/".$nama_foto_baru);
				mysqli_query($conn,"INSERT INTO foto_event VALUES('','$id_event','$nama_foto_baru')");				
			}
			echo "Berhasil Upload";
		}else{
			echo "Gambar tidak ada";
		}
		
	}else{
		echo ' <script type="text/javascript">
				alert("Profil Login Gagal Diubah");
				window.location.replace("read_user_login.php") </script>'; 
		//echo "Profil Umum Gagal Diubah";
	}
	
?>