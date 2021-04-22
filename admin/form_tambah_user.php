<?php

include_once('layout_atas_form.php');

?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan User</h1>
			<table border="0">
				<form action="input_proses_tambah_user.php" method="post">
					<tr>
						<td style="font-weight: bold;">ID USER</td>
						<td><input type="text" class="form-control" name="id_user" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">EMAIL</td>
						<td><input type="text" class="form-control" name="email" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">PASSWORD</td>
						<td><input type="text" class="form-control" name="password" /> </td>
					</tr>
                    <tr>
                        <td style="font-weight: bold;">LEVEL</td>
                        <td>    
                            <select name="level" id="level" class="form-control">
                                <option value="event_creator">EVENT CREATOR</option>
                                <option value="sponsorship">SPONSORSHIP</option>
                            </select>
                        </td>
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
