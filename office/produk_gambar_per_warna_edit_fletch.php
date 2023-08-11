<?php 
// error_reporting(0);
include "connect.php";
$id=$_POST['id'];
//	echo "ID : ".$id;
$sub=explode("-",$id);
$id_produk=$sub[0];
$kode_produk=$sub[1];

$sql="SELECT id,kode_warna,gambar1,gambar2,gambar3
		FROM produk_warna_dev WHERE id='$id_produk' AND kode_warna='$kode_produk'";
$query=mysqli_query($link,$sql);     
list($id_warna,$kode_warna,$gambar1,$gambar2,$gambar3)=mysqli_fetch_array($query);

?>
<form id="form1" name="form1" method="post" action="api_proses_v2.php" enctype="multipart/form-data">
									
									<input type="hidden" name="jenis" value="produk_gambar_per_warna_edit">	
									<input type="hidden" name="temp_id_paket" value="<?php echo $id_warna?>">	
									<input type="hidden" name="temp_kode_warna" value="<?php echo $kode_warna?>">	
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto Produk 1*</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="<?php echo $gambar1?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto" name="foto">
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto Produk 2</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="<?php echo $gambar2?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto2" name="foto2">
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto Produk 3</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="<?php echo $gambar3?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto3" name="foto3">
											</p>
										</div>
									</div>

									<div class="form-group row">
										<div class="col text-center">
											<input type="submit" class="btn btn-success" id="btnform" value="Simpan">
											<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
										</div>
									</div>	
								</form>