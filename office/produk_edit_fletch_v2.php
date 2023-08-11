<?php 
include"connect.php";
$id=$_POST['id'];
// echo "ID : ".$id;
$sql="SELECT id,nama_produk,kategori,foto,foto2,foto3,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,`start`,
                         `end`,is_send,is_batal,`repeat`,created_at,created_by,`status`
                          FROM produk_dev where id='$id'";
$query=mysqli_query($link,$sql);     
list($id,$nama_produk,$category,$foto,$foto2,$foto3,$foto_type,$foto_size,$kode_model,$deskripsi,$qty_total,$harga_total,$start,
                         $end,$is_send,$is_batal,$repeat,$created_at,$created_by,$status)=mysqli_fetch_array($query);

$array_status= array('1'=>'Aktif','0'=>'Tidak aktif');

$sqlKate = "SELECT id FROM produk_kategori ORDER BY nama_kategori ASC";
$queryKate = mysqli_query($link,$sqlKate);
?>
<!-- <form id="form1" name="form1" method="post" action="api_proses.php" enctype="multipart/form-data"> -->
<form id="form1" name="form1" method="post" action="api_proses_v2.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="produk_edit">	
									<input type="hidden" name="temp_id" value="<?php echo $id?>">	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Nama produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="enama_produk" name="nama_produk" 
												value="<?php echo $nama_produk;?>" required></p>
										</div>
									</div>
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Kategori</label>
										<div class="col-sm-10">
											<select name="category" class="form-control entry">
												<?php while(list($kategori) = mysqli_fetch_array($queryKate)) { ?>
													<option value="<?php echo $kategori;?>"
													<?php if ($category == $kategori) { echo 'selected="selected"';}?>>
													<?php echo ucfirst($kategori);?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Kode model</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="ekode_model" name="kode_model"
												value="<?php echo $kode_model;?>"  required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Deskripsi</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<textarea  class="form-control" id="edeskripsi" name="deskripsi" required><?php echo $deskripsi;?> 
												</textarea></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Qty Produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="eqty_total" name="qty_total" 
												value="<?php echo $qty_total;?>" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Harga produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="eharga_total" name="harga_total"
												value="<?php echo $harga_total;?>"  required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk *</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="../<?php echo $foto?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto" name="foto"></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 2</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="../<?php echo $foto2?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto2" name="foto2"></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 3</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<img src="../<?php echo $foto3?>" style="width: 100px;">
												<input type="file" class="form-control" id="efoto3" name="foto3"></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Start date</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control flatpickr" id="emulai" name="mulai" 
												value="<?php echo $start?>"  required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">End date</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control flatpickr" id="eakhir" name="akhir" 
												value="<?php echo $end?>"  required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Status</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<SELECT class="form-control" name="status" id="status">
													<?php 
												     foreach($array_status as $key => $value){
												       if($key==$status){
												       		echo  "<option value='$key' selected>$value</option>"; 
												       } else {	
												       		echo  "<option value='$key'>$value</option>"; 
												       }	
													   
																		
													}?>
												</SELECT>
											</p>
										</div>
									</div>

									
									
									
									
									<div class="form-group row">
										<div class="col-sm-10">
											<input type="submit" class="btn btn-success" id="btnform" value="Update">
											<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
										</div>
									</div>	
								</form>