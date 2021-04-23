<?php
include_once('layout_atas.php');
include_once('koneksi.php');

$id_sponsorship = $_GET['id_sponsorship'] ;

$sql ="SELECT sponsorship.id_sponsorship, user.id_user, user.email, 
       sponsorship.nama_sponsorship, sponsorship.alamat, sponsorship.no_telp, sponsorship.deskripsi_sponsorship, kategori_sponsorship.nama_kategori_sponsorship
       FROM `sponsorship` 
       JOIN user on sponsorship.id_user = user.id_user 
       JOIN kategori_sponsorship ON sponsorship.id_kategori_sponsorship = kategori_sponsorship.id_kategori_sponsorship
       WHERE id_sponsorship = '{$id_sponsorship}' ";
$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);
?>
<div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">

</div>
 <div class="col-9 col-s-9">
   <h3 style="text-align: center;"><?php echo $row['nama_sponsorship'] ?></h3><br>
   <div class="row">
     <div class="col-sm-8">
     <!--<div class="well">
       <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
       <p>Current Project</p>
     </div> -->
      <div class="well">
       <div style="overflow-x:auto;">
             <div class="table-responsive">
                     <table class="table">
                      <tbody>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $row['alamat'] ?></td>

                        </tr>
                        <tr>
                            <th>Kategori Sponsorship</th>
                            <td><?php echo $row['nama_kategori_sponsorship'] ?></td>

                        </tr>
                        <tr>
                            <th>No Telephone</th>
                            <td><?php echo $row['no_telp'] ?></td>

                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email'] ?></td>

                        </tr>
                          </tbody>



                      </table>
             </div>

      </div>
      </div>
      <div class="well">
       <h4 style="text-align: center;"><?php echo $row['nama_sponsorship'] ?></h4><hr/>
       <p style="text-align:left"><?php echo $row['deskripsi_sponsorship'] ?></p>
      </div>
     </div>

     <div class="col-sm-2">

     </div>
   </div>
  </div>

  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <div class="well">
     <p>Ajukan Proposal</p><br/>
     <a href="form_pengajuan_event.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>"  class="w3-button w3-border w3-small w3-purple">Ajukan</a>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
