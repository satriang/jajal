<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

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
		<h1 style="text-align: center;">Masukkan Periode Tanggal yang Diinginkan</h1>
			<table border="0">
				<form action="read_event_perperiode.php" method="post"  enctype="multipart/form-data">
					<tr>
						<td style="font-weight: bold;">Dari Tanggal</td>
						<td><input type="text" class="form-control" name="tanggal_awal" id="tanggal_awal"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Sampai Tanggal</td>
						<td><input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir"/> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;">
                        <a href="read_event.php" class="w3-button w3-border w3-medium w3-red">Kembali</a>
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
