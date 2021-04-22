<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_kategori_event = $_GET['id_kategori_event'] ;

$sql = "SELECT * FROM `kategori_event` WHERE `id_kategori_event`='{$id_kategori_event}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

$hasil = mysqli_fetch_assoc($ekseskusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan Kategori Event</h1>
			<table border="0">
				<form action="update_proses_kategori_event.php" method="post">
					<tr>
						<td style="font-weight: bold;">ID KATEGORI EVENT</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_kategori_event'] ?>" name="id_kategori_event" readonly="readonly"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">NAMA KATEGORI EVENT</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['kategori_event'] ?>" name="kategori_event" /> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" value="Batal"/><input type="submit" value="UBAH" /></td>
					</tr>
						
				 </form>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
