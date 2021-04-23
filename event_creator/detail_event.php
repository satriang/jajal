<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_event = $_GET['id_event'] ;

$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.no_telp,
user.email, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, 
DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, 
event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, 
event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
JOIN user ON event_creator.id_user = user.id_user WHERE `id_event`='{$id_event}'" ;

$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);
?>
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
      <div class="table-responsive">  
        <table class="w3-table-all w3-hoverable">
          <tbody>
            <tr>
              <th class="w3-center">ID EVENT</th>
              <td><?php echo $row['id_event'] ?></td>
            </tr>
            <tr>
                <th class="w3-center">NAMA EVENT</th>
                <td><?php echo $row['nama_event'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">ID EVENT CREATOR</th>
              <td><?php echo $row['id_event_creator'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">NAMA EVENT CREATOR</th>
              <td><?php echo $row['nama_eo'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">No Telp</th>
              <td><?php echo $row['no_telp'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">Email</th>
              <td><?php echo $row['email'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">ID KATEGORI EVENT</th>
              <td><?php echo $row['id_kategori_event'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">KATEGORI EVENT </th>
              <td><?php echo $row['kategori_event'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">TANGGAL EVENT</th>
              <td><?php echo $row['tanggal_acara'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">PROPOSAL</th>
              <td><?php echo $row['proposal'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">LOKASI EVENT </th>
              <td><?php echo $row['lokasi_event'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">STATUS TERDANAI EVENT</th>
              <td><?php echo $row['status_terdanai'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">TANGGAL TEREALISASI EVENT</th>
              <td><?php echo $row['tanggal_berakhir'] ?></td>
            </tr>
            <tr>
              <th class="w3-center">STATUS TERLAKSANA EVENT</th>
              <td><?php echo $row['status_terlaksana'] ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                <a href="read_event.php"  class="w3-button w3-border w3-small w3-purple"> Kembali </a>
                </td>
            </tr>
          </tbody>
        </table>
       </div>       
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
