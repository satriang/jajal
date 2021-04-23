<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_kategori_peserta = $_GET['id_kategori_peserta'] ;

$sql = "SELECT * FROM `kategori_peserta` WHERE `id_kategori_peserta`='{$id_kategori_peserta}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

$hasil = mysqli_fetch_assoc($ekseskusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Ubah Kategori Peserta Event</h1>
			<table border="0">
				<form action="update_proses_kategori_peserta.php" method="post">
					<tr>
						<td style="font-weight: bold;">Id Kategori Peserta</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_kategori_peserta'] ?>" name="id_kategori_peserta" readonly="readonly"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nama Kategori Peserta</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['kategori_peserta'] ?>" name="kategori_peserta" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">Deskripsi Kategori Peserta</td>
						<td><textarea class="form-control" name="deskripsi_kategori_peserta"><?php echo $hasil['deskripsi_kategori_peserta'] ?></textarea> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;">
						<a href="read_kategori_peserta.php"  class="w3-button w3-border w3-small w3-red"> Kembali </a>
						<input type="submit" value="UBAH" class="w3-button w3-border w3-small w3-green"/></td>
					</tr>
						
				 </form>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
