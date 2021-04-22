<?php
	include_once('koneksi.php');

	$id_event = $_POST['id_event'];
	$id_event_creator = $_POST['id_event_creator'] ;
	$nama_event = $_POST['nama_event'];
	$tanggal_event = $_POST['tanggal'] ;
	$lokasi_event = $_POST['lokasi_event'];
	$feedback = $_POST['feedback'] ;
	$deskripsi_event = $_POST['deskripsi_event'];
	$jumlah_peserta = $_POST['jumlah_peserta'] ;
	$id_kategori_peserta = $_POST['id_kategori_peserta'];
	$dana_anggaran = $_POST['dana_anggaran'] ;
	$tanggal_pendanaan = $_POST['tanggal_pendanaan'];
	$status_terdanai = $_POST['status_terdanai'] ;
	$id_kategori_event = $_POST['id_kategori_event'];
	$proposal_nama = $_FILES['proposal']['name'];
	$proposal_sementara = $_FILES['proposal']['tmp_name'];
	$tipe_file = pathinfo($proposal_nama, PATHINFO_EXTENSION); 
	$tanggal_sekarang = date("Y-m-d_h-i-s");
	$nama_proposal_baru = $id_event ."_$tanggal_sekarang". "_".$proposal_nama;
	$file_tujuan = "proposal/".$nama_proposal_baru;
	$proposal_lama = $_POST['proposal_lama'];
	
	if ($proposal_nama == ""){
		$sql = "UPDATE event
							SET id_event_creator = '{$id_event_creator}',
								id_kategori_event = '{$id_kategori_event}',
								id_kategori_peserta = '{$id_kategori_peserta}',
								nama_event = '{$nama_event}',
								tanggal = '{$tanggal_event}',
								proposal = '{$proposal_lama}',
								lokasi_event = '{$lokasi_event}',
								deskripsi_event = '{$deskripsi_event}',
								jumlah_peserta = '{$jumlah_peserta}',
								dana_anggaran = '{$dana_anggaran}',
								tanggal_batas_pendanaan = '{$tanggal_pendanaan}',
								status_terdanai = '{$status_terdanai}',
								feedback = '{$feedback}'
							WHERE `id_event`='{$id_event}'" ;
					
					$eksekusi = mysqli_query($conn,$sql) ;
						if($eksekusi){
									echo ' <script type="text/javascript">
										alert("Edit event Berhasil Diubah");
										window.location.replace("read_event.php") </script>'; 
								//echo "Event Berhasil Diubah";
								//header("refresh:10; login_event_creator.php");
				
						}else{
							 echo ' <script type="text/javascript">
									alert("Edit Event Gagal Diubah");
									window.location.replace("read_user_umum.php") </script>'; 
							//echo "Event Gagal Diubah";
						}
	}else{
			if ($tipe_file == "pdf"){
				$upload = move_uploaded_file($proposal_sementara, $file_tujuan);
				if ($upload){
					$sql = "UPDATE event
							SET id_event_creator = '{$id_event_creator}',
								id_kategori_event = '{$id_kategori_event}',
								id_kategori_peserta = '{$id_kategori_peserta}',
								nama_event = '{$nama_event}',
								tanggal = '{$tanggal_event}',
								proposal = '{$nama_proposal_baru}',
								lokasi_event = '{$lokasi_event}',
								deskripsi_event = '{$deskripsi_event}',
								jumlah_peserta = '{$jumlah_peserta}',
								dana_anggaran = '{$dana_anggaran}',
								tanggal_batas_pendanaan = '{$tanggal_pendanaan}',
								status_terdanai = '{$status_terdanai}',
								feedback = '{$feedback}'
							WHERE `id_event`='{$id_event}'" ;
					
					$eksekusi = mysqli_query($conn,$sql) ;
						if($eksekusi){
									echo ' <script type="text/javascript">
										alert("Edit event Berhasil Diubah");
										window.location.replace("read_event.php") </script>';
								//echo "Event Berhasil Diubah";
								//header("refresh:10; login_event_creator.php");
				
						}else{
							echo ' <script type="text/javascript">
									alert("Edit event Gagal Diubah");
									window.location.replace("read_event.php") </script>';
							//echo "Event Gagal Diubah";
						}
				}else{ 
					// else upload gagal
					//echo "Gagal mengupload data";
					echo ' <script type="text/javascript">
						alert("Gagal Mengubah Proposal Event Baru");
						window.location.replace("read_event.php") </script>';
				}
			}else{
				// echo "format file harus PDF";
				echo ' <script type="text/javascript">
						alert("Format File Proposal Harus PDF");
						window.location.replace("read_event.php") </script>';
			}
	}
?>