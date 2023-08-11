<?php 
 //$array_level= array('1'=>'Service Advisor','2'=>'Admin Gudang','3'=>'Supervisor','4'=>'Keuangan','5'=>'Management');
?>
<div class="modal fade" id="modalEntry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalLabel">Entry Produk di dalam Paket</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form1" name="form1" method="post" action="api_proses_v2.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="produk_detail_entry">	
									<input type="hidden" name="temp_id_paket" value="<?php echo $id?>">	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Barcode</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="barcode" name="barcode" required></p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Nama produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="nama_produk" name="nama_produk" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Disc config</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control" id="disc_conf" name="disc_conf" value="016:30;BBN:30;BWN:32;BSN:35;" readonly></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Qty</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="qty" name="qty" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Harga</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="harga" name="harga" required></p>
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
							</div>
						</div>
					</div>
			</div>