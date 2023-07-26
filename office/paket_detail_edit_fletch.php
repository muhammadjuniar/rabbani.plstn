<?php 
error_reporting(0);
include"connect.php";
$id=$_POST['id'];
//	echo "ID : ".$id;
$sub=explode("-",$id);
$id_paket=$sub[0];
$id_barcode=$sub[1];

$sql="SELECT id_paket,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto
                          FROM paket_order_detail where id_paket='$id_paket' and barcode='$id_barcode'";
$query=mysqli_query($link,$sql);     
list($id_paket,$barcode,$nama_produk,$ukuran,$warna,$disc_conf,$qty,$harga,$diskon,$netto)=mysqli_fetch_array($query);

$array_status= array('1'=>'Aktif','0'=>'Tidak aktif');
?>
<form id="form1" name="form1" method="post" action="api_proses.php" enctype="multipart/form-data">
									
									<input type="hidden" name="jenis" value="paket_detail_edit">	
									<input type="hidden" name="temp_id_paket" value="<?php echo $id_paket?>">	
									<input type="hidden" name="temp_barcode" value="<?php echo $id_barcode?>">	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Barcode</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="ebarcode" name="barcode" 
												value="<?php echo $barcode?>"  required></p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Nama produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="enama_produk" name="nama_produk" 
												value="<?php echo $nama_produk?>" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Disc config</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="edisc_conf" name="disc_conf" value="016:30;BBN:30;BWN:32;BSN:35;" readonly></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Qty</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="eqty" name="qty" 
												value="<?php echo $qty?>"  required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Harga</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="eharga" name="harga" 
												value="<?php echo $harga?>"  required></p>
											</p>
										</div>
									</div>		
									<div class="form-group row">
										<div class="col-sm-10">
											<input type="submit" class="btn btn-warning" id="btnform" value="Simpan">
											<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
										</div>
									</div>	
								</form>