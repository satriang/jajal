<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_event = $_GET['id_event'];
//get data id event
$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, 
event_creator.nama_eo, kategori_event.id_kategori_event, 
kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, 
event.proposal, event.lokasi_event, event.status_terdanai, 
DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, 
event.status_terlaksana, event.dana_anggaran, event.dana_terkumpul, 
kategori_peserta.kategori_peserta, 
event.jumlah_peserta, kategori_peserta.id_kategori_peserta, event.deskripsi_event, event.jumlah_peserta,
DATE_FORMAT(event.tanggal_batas_pendanaan, '%d %M %Y')as terakhir_pendanaan, event.feedback
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
JOIN kategori_peserta ON event.id_kategori_peserta = kategori_peserta.id_kategori_peserta
WHERE `id_event`='{$id_event}'" ;

$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);

//get data kategori peserta
$query_kategori_peserta = mysqli_query($conn, "SELECT * FROM `kategori_peserta`");

//get data kategori event
$query_kategori_event = mysqli_query($conn, "SELECT * FROM `kategori_event`");
?>
<script type="text/javascript">
   $(document).ready(function(){
    $("#tanggal").datepicker({
        dateFormat: "yy-mm-dd"
    });
   });
   $(document).ready(function(){
    $("#tanggal_pendanaan").datepicker({
        dateFormat: "yy-mm-dd"
    });
   });
  </script>
  <div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
<div class="col-10 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Konfirmasi Event Terselenggara</h1>
			<table border="0">
				<form action="update_proses_event_terselenggara.php" method="post"  enctype="multipart/form-data">
					<tr>
						<td style="font-weight: bold;">ID EVENT</td>
						<td><input type="text" class="form-control" name="id_event" value="<?php echo $row['id_event'] ?>" readonly/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal Event Terlaksana</td>
						<td><input type="text" class="form-control" name="tanggal_event_terlaksana" id="tanggal"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Foto Event Terlaksana</td>
						<td><input type="file" name="gambar[]" accept="image/x-png,image/jpeg" multiple/> 
							<label>File yang di upload harus .png atau .jpg</label>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;">
                        <a href="read_event.php" class="w3-button w3-border w3-medium w3-red">Kembali</a>
						<input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Konfirmasi" /></td>
					</tr>
				 </form>
				 <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
					</iframe>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
