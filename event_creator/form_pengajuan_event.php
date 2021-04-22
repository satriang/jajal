<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');


//get data event
$id_sponsorship = $_GET["id_sponsorship"];
$query_sponsorship = mysqli_query($conn, "SELECT * FROM sponsorship WHERE 
id_sponsorship = '{$id_sponsorship}'");
$data_sponsorship = mysqli_fetch_array($query_sponsorship);
$nama_sponsorship = $data_sponsorship['nama_sponsorship'];

//get id pengajuan event
$query_pengajuan_event = mysqli_query($conn, "SELECT max(id_pengajuan_event) as kodeMaksimal FROM pengajuan_event");
$data_pengajuan_event = mysqli_fetch_array($query_pengajuan_event);
$id_pengajuan_event = $data_pengajuan_event['kodeMaksimal'];

$urutan_pengajuan_event = (int) substr($id_pengajuan_event, 3, 3);
$urutan_pengajuan_event++;

$huruf_pengajuan_event = "PJE";
$id_pengajuan_event = $huruf_pengajuan_event . sprintf("%03s", $urutan_pengajuan_event);
//get data id event
$query_event = mysqli_query($conn, "SELECT * FROM event WHERE 
id_event_creator = '{$id_event_creator}' AND status_terlaksana = 'BELUM TERLAKSANA'");


?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Ajukan Event</h1>
			<table>
				<form action="input_proses_pengajuan_event.php" method="post"  enctype="multipart/form-data">
					<tr>
						<td><input type="text" class="form-control" name="id_pengajuan_event" value="<?php echo $id_pengajuan_event; ?>" hidden/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">SPONSORSHIP</td>
						<td><input type="text" class="form-control" name="id_sponsorship" value="<?php echo $id_sponsorship."||". $nama_sponsorship; ?>" readonly />
							<input type="hidden" class="form-control" name="status" value="DI AJUKAN" />
						</td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">Event</td>
						<td><select name="id_event" class="form-control">
   							<?php
							   while ($data_event = mysqli_fetch_array($query_event)){
							?>
								<option value="<?php echo $data_event['id_event'];?>"><?php echo $data_event['id_event'];?> || <?php echo $data_event['nama_event'];?></option>
							   <?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Ajukan" /></td>
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
