<?php

include_once('layout_atas.php');
include_once('koneksi.php');

$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{
	  $posisi  = ($halaman-1) * $batas;
	}

//sql event Terlaksana
$sql_event_terlaksana = "SELECT * from event WHERE event.status_terlaksana = 'SUDAH TERLAKSANA' LIMIT $posisi,$batas";
$eksekusi_event_terlaksana = mysqli_query($conn, $sql_event_terlaksana);
?>
  <div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
  <div class="col-10 col-s-9">
					<div style="overflow-x:auto;">
					<div class="table-responsive">
						<table class="w3-table-all w3-hoverable">
							<tbody>
								<tr>
									<th class="w3-center">No</th>
									<th class="w3-center">Nama Event</th>
									<th class="w3-center">Status</th>
                                    <th class="w3-center">Aksi</th>
								</tr>

										<?php
											$no = $posisi+1;
												while ($row4=mysqli_fetch_array($eksekusi_event_terlaksana)) {
										?>

								<tr>
									<td class="w3-center"><?php echo $no ?></td>
									<td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row4['id_event'] ?>"><?php echo $row4['nama_event'] ?></a></td>
									<td class="w3-center"><?php echo $row4['status_terlaksana'] ?></td>
									<td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row4['id_event'] ?>" class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
              </td>   
								</tr>

									<?php
										 $no++;
										}
									?>
							</tbody>
						</table>

							<?php
							// Langkah 3: Hitung total data dan halaman serta link 1,2,3
							$sql2_event_terlaksana = "SELECT * from event WHERE event.status_terlaksana = 'SUDAH TERLAKSANA'";
							$eksekusi2_event_terlaksana = mysqli_query($conn, $sql2_event_terlaksana);
							$jmldata_event_terlaksana   = mysqli_num_rows($eksekusi2_event_terlaksana);
							$jmlhalaman_event_terlaksana = ceil($jmldata_event_terlaksana/$batas);
							?>
									<br/> Halaman :
										 <?php
												for($i=1;$i<=$jmlhalaman_event_terlaksana;$i++)
													if ($i != $halaman){
														echo " <a href=\"read_event_terlaksana.php?halaman=$i\">$i</a> | ";
														}else{
														echo " <b>$i</b> | ";
													}
												echo "<p>Total event Terlaksana : <b>$jmldata_event_terlaksana</b> event</p>";
											?>
					</div>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
