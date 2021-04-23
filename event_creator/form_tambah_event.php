<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

//get data id event
$query_event = mysqli_query($conn, "SELECT max(id_event) as kodeMaksimal FROM event");
$data_event = mysqli_fetch_array($query_event);
$id_event = $data_event['kodeMaksimal'];

$urutan_event = (int) substr($id_event, 3, 3);

$urutan_event++;

$huruf_event = "EVT";
$id_event = $huruf_event . sprintf("%03s", $urutan_event);

//get data kategori event
$query_kategori_event = mysqli_query($conn, "SELECT * FROM `kategori_event`");

//get data kategori peserta
$query_kategori_peserta = mysqli_query($conn, "SELECT * FROM `kategori_peserta`");

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
		<h1 style="text-align: center;">Tambahkan Event</h1>
			<table border="0">
				<form action="input_proses_tambah_event.php" method="post"  enctype="multipart/form-data">
					<tr>
						<input type="hidden" class="form-control" name="id_event" value="<?php echo $id_event; ?>" />
						<input type="hidden" class="form-control" name="id_event_creator" value="<?php echo $hasil['id_event_creator'] ?>"/>
						<td style="font-weight: bold;">Nama Event</td>
						<td><input type="text" class="form-control" name="nama_event" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Deskripsi Event</td>
						<td><textarea class="form-control" name="deskripsi_event"> </textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal event</td>
						<td><input type="text" class="form-control" name="tanggal" id="tanggal"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal Pendanaan Terakhir</td>
						<td><input type="text" class="form-control" name="tanggal_batas_pendanaan" id="tanggal_pendanaan"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Lokasi Event</td>
						<td><textarea class="form-control" name="lokasi_event"> </textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Kategori Peserta Event</td>
						<td><select name="id_kategori_peserta" class="form-control">
   							<?php
							   while ($data_kategori_peserta = mysqli_fetch_array($query_kategori_peserta)){
							?>
								<option value="<?php echo $data_kategori_peserta['id_kategori_peserta'];?>"><?php echo $data_kategori_peserta['kategori_peserta'];?></option>
							   <?php } ?>
							</select>
							<label style="float:right;"><a href="detail_kategori_peserta.php">Lihat detail kategori peserta</a></label>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Jumlah Peserta</td>
						<td><input type="number" class="form-control" name="jumlah_peserta" id="jumlah_peserta" onkeyup="jumpeFunction()"/> 
							<label style="float:right;"><span id="jumpe"></span> Peserta</label></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Feedback Untuk Sponsorship</td>
						<td><textarea class="form-control" name="feedback"> </textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Anggaran Dana</td>
						<td><input type="number" class="form-control" name="dana_anggaran" id="dana" onkeyup="myFunction()"/> 
						<label style="float:right;">Rp <span id="uang"></span> </label></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Status dana Event</td>
						<td><select name="status_terdanai" class="form-control">
								<option value="BELUM TERDANAI">Belum Terdanai</option>
								<option value="SUDAH TERDANAI">Sudah Terdanai</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Kategori Event</td>
						<td><select name="id_kategori_event" class="form-control">
   							<?php
							   while ($data_kategori_event = mysqli_fetch_array($query_kategori_event)){
							?>
								<option value="<?php echo $data_kategori_event['id_kategori_event'];?>"><?php echo $data_kategori_event['kategori_event'];?></option>
							   <?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Proposal</td>
						<td><input type="file" name="proposal" accept="application/pdf" /> 
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Batal"/>
						<input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Tambah" /></td>
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
