<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_event = $_GET['id_event'];
//get data id event
$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, 
event_creator.nama_eo, kategori_event.id_kategori_event, 
kategori_event.kategori_event, event.tanggal, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, 
event.proposal, event.lokasi_event, event.status_terdanai, 
DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, 
event.status_terlaksana, event.dana_anggaran, event.dana_terkumpul, 
kategori_peserta.kategori_peserta, 
event.jumlah_peserta, kategori_peserta.id_kategori_peserta, event.deskripsi_event, event.jumlah_peserta,
DATE_FORMAT(event.tanggal_batas_pendanaan, '%d %M %Y')as terakhir_pendanaan, event.tanggal_batas_pendanaan, event.feedback
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
		<h1 style="text-align: center;">Ubah Event</h1>
			<table border="0">
				<form action="update_proses_edit_event.php" method="post"  enctype="multipart/form-data">
					<tr>
						<input type="hidden" class="form-control" name="id_event" value="<?php echo $row['id_event'] ?>" readonly/>
						<input type="hidden" class="form-control" name="id_event_creator" value="<?php echo $row['id_event_creator'] ?>" readonly/>
						<td style="font-weight: bold;">Nama Event</td>
						<td><input type="text" class="form-control" name="nama_event" value="<?php echo $row['nama_event'] ?>"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal Event</td>
						<td><input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo $row['tanggal'] ?>"/> 
						<label style="float: left;"><?php echo $row['tanggal_acara'] ?></label></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Lokasi Event</td>
						<td><textarea class="form-control" name="lokasi_event" ><?php echo $row['lokasi_event'] ?></textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Deskripsi Event</td>
						<td><textarea class="form-control" name="deskripsi_event" ><?php echo $row['deskripsi_event'] ?></textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Feedback Untuk Sponsorship</td>
						<td><textarea class="form-control" name="feedback" ><?php echo $row['feedback'] ?></textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">KATEGORI PESERTA</td>
						<td><select name="id_kategori_peserta" class="form-control">
   							<?php
   								$id_kategori_peserta = $row['id_kategori_peserta'];
							   while ($data_kategori_peserta = mysqli_fetch_array($query_kategori_peserta)){
							
								 if($id_kategori_peserta == $data_kategori_peserta['id_kategori_peserta']){?>
									<option value="<?php echo $data_kategori_peserta['id_kategori_peserta'];?>" selected><?php echo $data_kategori_peserta['kategori_peserta'];?></option>
								<?php }else { ?>
									<option value="<?php echo $data_kategori_peserta['id_kategori_peserta'];?>"><?php echo $data_kategori_peserta['kategori_peserta'];?></option>

							 <?php 	}
							  } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Jumlah Peserta Event</td>
						<td><input type="text" class="form-control" name="jumlah_peserta" value="<?php echo $row['jumlah_peserta'] ?>" id="jumlah_peserta" onkeyup="jumpeFunction()"/> 
						<label style="float: left;"><?php $jumlah_peserta_event = number_format($row['jumlah_peserta'],0,',','.'); echo $jumlah_peserta_event;?> Peserta</label>
						<label style="float: right;">Jadi <span id="jumpe"></span> Peserta</label></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">ANGGARAN DANA EVENT</td>
						<td><input type="text" class="form-control" name="dana_anggaran" id="dana" onkeyup="myFunction()" value="<?php echo $row['dana_anggaran'] ?>"/> 
						<label style="float: left;"><?php $dana_anggaran_rupiah = "Rp " . number_format($row['dana_anggaran'],0,',','.'); echo $dana_anggaran_rupiah;?></label>
						<label style="float: right;">Jadi Rp <span id="uang"></span></label>
					</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal Batas Pendanaan</td>
						<td><input type="text" class="form-control" name="tanggal_pendanaan" id="tanggal_pendanaan" value="<?php echo $row['tanggal_batas_pendanaan'] ?>"/> 
						<label><?php echo $row['terakhir_pendanaan'] ?></label></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Status dana Event</td>
						<td><select name="status_terdanai" class="form-control">
                                <?php
                                    if($row['status_terdanai'] == 'terdanai'){
                                        echo "<option value='SUDAH TERDANAI' selected>Sudah Terdanai</option>
                                        <option value='BELUM TERDANAI'>Belum Terdanai</option>";
                                    }else{
                                        echo "<option value='SUDAH TERDANAI' >Sudah Terdanai</option>
                                        <option value='BELUM TERDANAI' selected>Belum Terdanai</option>";
                                    }  
                                ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Kategori Event</td>
						<td><select name="id_kategori_event" class="form-control">
   							<?php
   								$id_kategori_event = $row['id_kategori_event'];
							   while ($data_kategori_event = mysqli_fetch_array($query_kategori_event)){
							?>
								<?php if($id_kategori_event == $data_kategori_event['id_kategori_event']){?>
									<option value="<?php echo $data_kategori_event['id_kategori_event'];?>" selected><?php echo $data_kategori_event['kategori_event'];?></option>
								<?php }else { ?>
									<option value="<?php echo $data_kategori_event['id_kategori_event'];?>"><?php echo $data_kategori_event['kategori_event'];?></option>

							 <?php 	}
							  } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Proposal</td>
						<td><input type="file" name="proposal" accept="application/pdf"/> 
							<label><?php echo $row['proposal'];?></label>
							<input type="hidden" name="proposal_lama" value="<?php echo $row['proposal'];?>"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;">
						<input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Ubah" /></td>
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
