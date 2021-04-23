<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_event_creator = $_GET['id_event_creator'] ;

$sql = "SELECT event_creator.id_event_creator, event_creator.id_user, user.email, user.password, event_creator.nama_eo,event_creator.alamat,event_creator.no_telp
FROM event_creator LEFT JOIN user
ON event_creator.id_user=user.id_user WHERE `id_event_creator`='{$id_event_creator}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

$hasil = mysqli_fetch_assoc($ekseskusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Ubah Event Creator</h1>
			<table border="0">
				<form action="update_proses_event_creator.php" method="post">
					<tr>
						<td style="font-weight: bold;">ID EVENT CREATOR</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_event_creator'] ?>" name="id_event_creator" readonly="readonly"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">ID USER</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_user'] ?>" name="id_user" readonly="readonly"/> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">EMAIL</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['email'] ?>" name="email" readonly="readonly"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">PASSWORD</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['password'] ?>" name="password" readonly="readonly"/> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">NAMA EO</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['nama_eo'] ?>" name="nama_eo"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">ALAMAT</td>
						<td><textarea class="form-control" name="alamat"><?php echo $hasil['alamat'] ?></textarea> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">NOMOR TELPON</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['no_telp'] ?>" name="no_telp" /> </td>
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
