<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$sql = "SELECT * FROM kategori_sponsorship";
$query_sql = mysqli_query($conn, $sql);

?>
<script>
   $(document).ready(function(){
    $("#tanggal_awal").datepicker({
        dateFormat: "yy-mm-dd"
    });
   });
   $(document).ready(function(){
    $("#tanggal_akhir").datepicker({
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
		<h1 style="text-align: center;">Masukkan Kategori Sponsorship yang Diinginkan</h1>
			<table border="0">
				<form action="read_sponsorship_by_kategori.php" method="post"  enctype="multipart/form-data">
                    <tr>
						<td style="font-weight: bold;">Pilih Kategori Sponsorship</td>
						<td><select name="id_kategori_sponsorship" class="form-control">
   							<?php
							   while ($data_sponsorship = mysqli_fetch_array($query_sql)){
							?>
								<option value="<?php echo $data_sponsorship['id_kategori_sponsorship'];?>"><?php echo $data_sponsorship['nama_kategori_sponsorship'];?></option>
							   <?php } ?>
							</select>
						</td>
					</tr>
                    <tr><td colspan="2" style="text-align: right; position: right;">						
						<input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Tampilkan" /></td>
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
