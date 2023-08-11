<?php 
 //$array_level= array('1'=>'Service Advisor','2'=>'Admin Gudang','3'=>'Supervisor','4'=>'Keuangan','5'=>'Management');
?>
<div class="modal fade" id="produkGambarEntry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalLabel">Entry Gambar</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form1" name="form1" method="post" action="api_proses_v2.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="produk_gambar_entry">	
									<input type="hidden" name="temp_id_paket" value="<?php echo $id?>">	
									<input type="hidden" name="temp_kode_warna" value="<?php echo $kode?>">	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 1*</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto" name="foto" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 2</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto2" name="foto2"></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 3</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto3" name="foto3"></p>
											</p>
										</div>
									</div>
									
									<div class="form-group row">
										<div class="col-sm-12 text-center">
											<input type="submit" class="btn btn-success" id="btnform" value="Simpan">
											<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
										</div>
									</div>	
								</form>
							</div>
						</div>
					</div>
			</div>