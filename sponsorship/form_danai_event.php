<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_pengajuan_event = $_GET['id_pengajuan_event'];

$sql_pengajuan ="SELECT pengajuan_event.id_pengajuan_event, event.id_event, event.nama_event
  FROM pengajuan_event
JOIN event ON event.id_event = pengajuan_event.id_event
WHERE pengajuan_event.id_pengajuan_event = '{$id_pengajuan_event}'";

$query_sql =mysqli_query($conn, $sql_pengajuan);
$row_pengajuan = mysqli_fetch_assoc($query_sql);

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">

  </div>
  <div class="col-9 col-s-9">
	<h1 style="text-align: center;">Konfirmasi Pendanaan Event</h1>
      <table border="0">
        <form action="update_proses_danai_event.php" method="post"  enctype="multipart/form-data">
          <tr>
            <td><input type="hidden" class="form-control" name="id_pengajuan_event" value="<?php echo $row_pengajuan['id_pengajuan_event'] ?>"  /> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">Event</td>
            <td><input type="text" class="form-control" name="event" value="<?php echo $row_pengajuan['id_event']. ' || '. $row_pengajuan['nama_event'];  ?>" readonly /> </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">Konfirmasi</td>
            <td><select name="status" class="form-control">
                    <option value="DI TERIMA">DI TERIMA</option>
                    <option value="DI TOLAK">DI TOLAK</option>
                </select>
          </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">Dana</td>
            <td><input type="text" class="form-control" name="dana" id="dana" onkeyup="myFunction()"/>
                <label style="float: right;">Rp <span id="uang"></span></label>
            </td>
          </tr>

          <tr>
            <td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Kembali"/>
            <input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Konfirmasi" /></td>
          </tr>
         </form>
         <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
          </iframe>
      </table>
  </div>

<?php
 include_once('layout_bawah.php');
?>
