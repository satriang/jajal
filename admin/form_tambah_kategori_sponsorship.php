<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');
//get data id event
$query_kategori_sponsorship = mysqli_query($conn, "SELECT max(id_kategori_sponsorship) as kodeMaksimal FROM kategori_sponsorship");
$data_kategori_sponsorship = mysqli_fetch_array($query_kategori_sponsorship);
$id_kategori_sponsorship = $data_kategori_sponsorship['kodeMaksimal'];

$urutan_kategori_sponsorship = (int) substr($id_kategori_sponsorship, 3, 3);

$urutan_kategori_sponsorship++;

$huruf_kategori_sponsorship = "IKS";
$id_kategori_sponsorship = $huruf_kategori_sponsorship . sprintf("%03s", $urutan_kategori_sponsorship);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan Kategori Sponsorship</h1>
			<table border="0">
				<form action="input_proses_tambah_kategori_sponsorship.php" method="post">
					<tr>
						<td style="font-weight: bold;">Id Kategori Sponsorship </td>
						<td><input type="text" class="form-control" name="id_kategori_sponsorship" value="<?php echo $id_kategori_sponsorship; ?>" readonly/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nama Kategori Sponsorship</td>
						<td><input type="text" class="form-control" name="nama_kategori_sponsorship" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">Deskripsi Kategori Sponsorship</td>
						<td><textarea class="form-control" name="deskripsi_kategori_sponsorship"></textarea> </td>
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
