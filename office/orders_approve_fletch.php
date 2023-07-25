<?php 
include"connect.php";
$id=$_POST['id'];
 //$array_level= array('1'=>'Service Advisor','2'=>'Admin Gudang','3'=>'Supervisor','4'=>'Keuangan','5'=>'Management');
$sql="SELECT id_pembayaran,bukti_transfer,total_transfer,tanggal_transfer from pembayaran where no_transaksi='$id' 
      ORDER BY tanggal_transfer DESC LIMIT 1";    
$query=mysqli_query($link,$sql);     
list($id_pembayaran,$bukti_transfer,$total_transfer,$tanggal_transfer)=mysqli_fetch_array($query);      

$pesan="SELECT status from pesan where no_transaksi='$id'";  

//echo $pesan;
$query_pesan=mysqli_query($link,$pesan);     
list($status_pesan)=mysqli_fetch_array($query_pesan);
?>

							<form id="form1" name="form1" method="post" action="api_proses.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="approve_order">	
									<input type="hidden" name="no_transaksi" value="<?php echo $id;?>">	
								    <div class="form-group row">
										<label class="col-sm-3 form-control-label">Bukti bayar</label>
										<div class="col-sm-9">
											<?php 
											if($bukti_transfer!=''){
											?>
												<img src="../<?php echo $bukti_transfer?>" style="width: 200px;">
											<?php }  else {?>
												 <label class="col-sm-3 form-control-label">Belum Upload</label>
												 <p></p>
												 <div class="form-group row">
													
													<div class="col-sm-10">
														
															
															<input type="file" class="form-control" id="efoto" name="foto"></p>
														
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
									<?php 
									if($status_pesan=='3'){?>

									<div class="form-group row">
										<label class="col-sm-3 form-control-label">Status Order</label>
										<div class="col-sm-9">
											<label><b>Sudah dibayar</b></label>
											
										</div>
									</div>

									<?php } else {?>

									<div class="form-group row">
										<label class="col-sm-3 form-control-label">Ubah Status</label>
										<div class="col-sm-9">
											<p class="form-control-static">
												<?php 
												$sql="SELECT id,nama FROM pesan_status WHERE id IN (2,3)";
												$query=mysqli_query($link,$sql);
												?>
												<SELECT class="form-control" name="status" id="status" required>
													<option value="">- Pilih -</option>
													<?php 
												     while(list($idstatus,$status_order)=mysqli_fetch_array($query)){
												     	echo"<option value='$idstatus'>$status_order</option>";
												     }				
													?>
												</SELECT>
											</p>
										</div>
									</div>

									<?php }
									?>
									
									

									
									
									
									
									<div class="form-group row">
										<label class="col-sm-3 form-control-label"></label>
										<div class="col-sm-9">
											<input type="submit" class="btn btn-warning" id="btnform" value="Simpan">
											<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
										</div>
									</div>	
							</form>
							