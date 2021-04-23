<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_kategori_sponsorship = $_GET['id_kategori_sponsorship'] ;

$sql = "SELECT * FROM `kategori_sponsorship` WHERE `id_kategori_sponsorship`='{$id_kategori_sponsorship}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

$hasil = mysqli_fetch_assoc($ekseskusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Ubah Kategori Sponsorship</h1>
			<table border="0">
				<form action="update_proses_kategori_sponsorship.php" method="post">
					<tr>
						<td style="font-weight: bold;">Id Kategori Sponsorship</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_kategori_sponsorship'] ?>" name="id_kategori_sponsorship" readonly="readonly"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nama Kategori Peserta</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['nama_kategori_sponsorship'] ?>" name="nama_kategori_sponsorship" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">Deskripsi Kategori Sponsorship</td>
						<td><textarea class="form-control" name="deskripsi_kategori_sponsorship"><?php echo $hasil['deskripsi_kategori_sponsorship'] ?></textarea> </td>
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
