<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');
//get data id event
$query_kategori_event = mysqli_query($conn, "SELECT max(id_kategori_event) as kodeMaksimal FROM kategori_event");
$data_kategori_event = mysqli_fetch_array($query_kategori_event);
$id_kategori_event = $data_kategori_event['kodeMaksimal'];

$urutan_kategori_event = (int) substr($id_kategori_event, 3, 3);

$urutan_kategori_event++;

$huruf_kategori_event = "KTE";
$id_kategori_event = $huruf_kategori_event . sprintf("%03s", $urutan_kategori_event);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan Kategori Event</h1>
			<table border="0">
				<form action="input_proses_tambah_kategori.php" method="post">
					<tr>
						<td style="font-weight: bold;">ID KATEGORI EVENT</td>
						<td><input type="text" class="form-control" name="id_kategori_event" value="<?php echo $id_kategori_event; ?>" readonly/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">NAMA KATEGORI EVENT</td>
						<td><input type="text" class="form-control" name="kategori_event" /> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Batal"/><input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Tambah" /></td>
					</tr>
						
				 </form>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
