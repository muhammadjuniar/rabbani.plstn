<?php 
include"../../connect.php";
$kode=$_POST['id'];
// echo "ID : ".$id;
$sql="SELECT kode_warna, warna, warna_english, images
                          FROM warna where kode_warna='$kode'";
$query=mysqli_query($link,$sql);     
list($kode,$warna,$warnaEnglish,$images)=mysqli_fetch_array($query);

?>
<form id="form1" name="form1" method="post" action="api_proses.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="produk_warna_edit">	
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Kode Warna</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="ekode_warna" name="kode_warna" 
												value="<?php echo $kode;?>" required>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Warna</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="ewarna" name="warna" 
												value="<?php echo $warna;?>" required>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Warna English</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="ewarna_english" name="warna_english"  
												value="<?php echo $warnaEnglish;?>" required>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Images</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="<?php echo $images?>" style="width: 100px;">
												<input type="file" class="form-control" id="eimages" name="images">
											</p>
										</div>
									</div>

									<div class="form-group row">
										<div class="col text-center">
											<input type="submit" class="btn btn-success" id="btnform" value="Update">
											<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
										</div>
									</div>	
								</form>