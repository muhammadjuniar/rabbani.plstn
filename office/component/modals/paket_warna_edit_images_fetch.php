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
									<input type="hidden" name="jenis" value="produk_warna_edit_image">	
									<input type="hidden" name="kode_warna" value="<?php echo $kode;?>">	
									
									<div class="form-group row">
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control" id="eimages" name="images">
											</p>
										</div>
										<div class="col-sm-2">
											<input type="submit" class="btn btn-warning" id="btnform" value="Add">
										</div>
									</div>
								</form>