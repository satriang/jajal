<?php
include_once('layout_atas.php');
include_once('koneksi.php');

$id_sponsorship = $_GET['id_sponsorship'] ;

$sql ="SELECT sponsorship.id_sponsorship, user.id_user, user.email, 
       sponsorship.nama_sponsorship, sponsorship.alamat, sponsorship.no_telp, 
       sponsorship.dana_maksimal, sponsorship.deskripsi_sponsorship 
       FROM `sponsorship` JOIN user on sponsorship.id_user = user.id_user 
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
                            <th>Dana </th>
                            <td><?php echo $hasil = 'Rp ' . number_format($row['dana_maksimal'], 2, ",", "."); ?></td>

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
     <p>No Telpon</p><br/>
     <p><?php echo $row['no_telp'] ?></p>
    </div>
    <div class="well">
     <p>Email</p><br/>
     <p><?php echo $row['email'] ?></p>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
