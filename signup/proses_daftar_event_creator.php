<?php

include_once('koneksi.php');

	// Membuat variabel
	$id_user="";
	$id_event_creator="";
	$nama_eo = "";
    $no_telp="";
	$alamat="";
	$password = "";
	$password_konfirm = "";
	$valid_panjang_password = true;
	$valid_password_konfirm = true;
	$email = "";
    $email_valid = true;
    $level = "event_creator";
	
	// Cek form sudah di klik submit/belum
	if(isset($_POST['submit'])){
        $id_user=$_POST['id_user'];
	    $id_event_creator=$_POST['id_event_creator'];
		$nama_eo = trim($_POST['nama_eo']);
		$no_telp = trim($_POST['no_telp']);
        $alamat=trim($_POST['alamat']);
		$password = trim($_POST['password']);
		$password_konfirm = trim($_POST['password_konfirm']);
		$email = trim($_POST['email']);
		
		// Cek input kosong
		if(empty($nama_eo)){
			echo ' <script type="text/javascript">
            	alert("Nama Event Creator Kosong");
                window.location.replace("signup_event_creator.php") </script>';
		}
		if(empty($no_telp)){
			echo ' <script type="text/javascript">
            	alert("Nomer Telpon Event Creator Kosong");
                window.location.replace("signup_event_creator.php") </script>';
		}
        if(empty($alamat)){
			echo ' <script type="text/javascript">
            	alert("Alamat Event Creator Kosong");
                window.location.replace("signup_event_creator.php") </script>';
		}
		if(empty($password)){
			echo ' <script type="text/javascript">
            	alert("Password Masih Kosong");
                window.location.replace("signup_event_creator.php") </script>';
		}
		if(empty($email)){
			echo ' <script type="text/javascript">
            	alert("Email Event Creator Kosong");
                window.location.replace("signup_event_creator.php") </script>';
		}
		
		// Kode cek username hanya boleh huruf a-z dan A-Z
/** 		if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
			$username_valid = false;
			$username_valid_msg = "Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi.<br>";
		}
		
		// Kode validasi nama hanya boleh huruf a-z, A-Z, dan spasi
		if(!preg_match("/^[a-zA-Z ]*$/",$nama)){
			$name_valid = false;
			$name_valid_msg = "Hanya huruf dan spasi yang diijinkan.<br>";
		}
**/
		// Cek minimal karakter password (minimal 8 digit)
		if(strlen($password) <= 8){
			$valid_panjang_password = false;
            echo ' <script type="text/javascript">
            	alert("Password minimal 8 digit");
                window.location.replace("signup_event_creator.php") </script>';
		}
		
		// cek konfirmasi password sama atau tidak
		if($password != $password_konfirm){
			$valid_password_konfirm = false;
            echo ' <script type="text/javascript">
            	alert("Password konfirmasi tidak sama");
                window.location.replace("signup_event_creator.php") </script>';
		}
        // email 
            $query_email = mysqli_query($conn, "SELECT COUNT(email) as jumlahEmail FROM user WHERE email = '{$email}' AND level = 'event_creator'");
            $data_email = mysqli_fetch_array($query_email);
            $jumlah_user = $data_email['jumlahEmail'];
        if ($jumlah_user > 0){
            $email_valid = false;
            echo ' <script type="text/javascript">
            	alert("Email anda sudah terdaftar");
                window.location.replace("signup_event_creator.php") </script>';
        }
/** 
		// cek input email, apakah sesuai atau tidak
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_valid = false;
			$valid_email_konfirm_msg = "Format email salah.<br>"; 
		}
    */
		// Cek semua input sudah diisi apa belum
		if( !empty($nama_eo) and !empty($no_telp) and !empty($alamat) and !empty($password) and !empty($email) and $valid_panjang_password and $valid_password_konfirm and $email_valid){
			// Disini tempat menulis kode (semua syarat sudah input terpenuhi).
			// Misalnya menulis kode query ke database
			// echo "Selamat semua input sudah diisi dengan benar.<br>";
            // echo "$id_user $id_event_creator $nama_eo $no_telp $alamat $password $password_komfrim $email";

            //sql tabel user
            $sql_user = "INSERT INTO `user`(`id_user`, `email`, `password`, `level`) VALUES ('{$id_user}','{$email}','{$password}','{$level}')" ;
            $eksekusi_user = mysqli_query($conn,$sql_user);

            //sql tabel event creator
            $sql_event_creator = "INSERT INTO `event_creator`(`id_event_creator`, `id_user`, `nama_eo`, `alamat`, `no_telp`) VALUES ('{$id_event_creator}', '{$id_user}', '{$nama_eo}', '{$alamat}', '{$no_telp}')";
            $eksekusi_event_creator = mysqli_query($conn,$sql_event_creator);

            if($eksekusi_user and $eksekusi_event_creator){
                echo ' <script type="text/javascript">
                alert("Anda Berhasil Mendaftar Sebagai Event Creator");
                window.location.replace("signup_event_creator.php") </script>';
            //	header("Location: read_user.php") ;
            }else{
                echo ' <script type="text/javascript">
                alert("Anda Gagal Mendaftar Sebagai Event Creator");
                window.location.replace("signup_event_creator.php") </script>';
                //echo "gagal menyimpan  ". mysqli_error($conn);
            /**    echo ' <script type="text/javascript">
                alert("Anda Gagal Mendaftar Sebagai Event Creator\nNo Error : '. mysqli_errno($conn). '\nPesan Error : '.mysqli_error($conn).'");
                window.location.replace("../kategori/read_user.php") </script>'; */ 
            }
		}
		
	}
?>