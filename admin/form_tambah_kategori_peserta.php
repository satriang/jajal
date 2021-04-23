<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');
//get data id event
$query_kategori_peserta = mysqli_query($conn, "SELECT max(id_kategori_peserta) as kodeMaksimal FROM kategori_peserta");
$data_kategori_peserta = mysqli_fetch_array($query_kategori_peserta);
$id_kategori_peserta = $data_kategori_peserta['kodeMaksimal'];

$urutan_kategori_peserta = (int) substr($id_kategori_peserta, 3, 3);

$urutan_kategori_peserta++;

$huruf_kategori_peserta = "IKT";
$id_kategori_peserta = $huruf_kategori_peserta . sprintf("%03s", $urutan_kategori_peserta);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan Kategori Peserta Event</h1>
			<table border="0">
				<form action="input_proses_tambah_kategori_peserta.php" method="post">
					<tr>
						<td style="font-weight: bold;">Id Kategori Pesrta </td>
						<td><input type="text" class="form-control" name="id_kategori_peserta" value="<?php echo $id_kategori_peserta; ?>" readonly/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nama Kategori Peserta</td>
						<td><input type="text" class="form-control" name="kategori_peserta" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">Deskripsi Kategori Peserta</td>
						<td><textarea class="form-control" name="deskripsi_kategori_peserta"></textarea> </td>
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
