<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_user = $_GET['id_user'] ;

$sql = "SELECT * FROM `user` WHERE `id_user`='{$id_user}'" ;

$ekseskusi_id = mysqli_query($conn, $sql);

$hasil = mysqli_fetch_assoc($ekseskusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Edit User</h1>
			<table border="0">
				<form action="update_proses_user.php" method="post">
                    <tr>
						<td style="font-weight: bold;">ID USER</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['id_user'] ?>" name="id_user" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">EMAIL</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['email'] ?>" name="username" /> </td>
					</tr>
                    <tr>
						<td style="font-weight: bold;">PASSWORD</td>
						<td><input type="text" class="form-control" value="<?php echo $hasil['password'] ?>" name="password" /> </td>
					</tr>
                    <tr>
                        <td style="font-weight: bold;">LEVEL</td>
                        <td>    
                            <select name="level" id="level" class="form-control">
                                <?php
                                    if($hasil['level'] == 'event_creator'){
                                        echo "<option value='event_creator' selected>EVENT CREATOR</option>
                                        <option value='sponsorship'>SPONSORSHIP</option>";
                                    }else{
                                        echo "<option value='event_creator'>EVENT CREATOR-Laki</option>
                                        <option value='sponsorship' selected>SPONSORSHIP</option>";
                                    }  
                                ?>
                            </select>
                        </td>
                    </tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Batal"/><input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Ubah" /></td>
					</tr>
						
				 </form>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
