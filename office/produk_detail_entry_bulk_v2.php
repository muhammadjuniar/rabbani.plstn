<?php 
 //$array_level= array('1'=>'Service Advisor','2'=>'Admin Gudang','3'=>'Supervisor','4'=>'Keuangan','5'=>'Management');
?>
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									<input type="hidden" name="jenis" value="produk_detail_entry_bulky">	
									<input type="hidden" name="temp_id_paket" value="<?php echo $id?>">	
								    <div class="form-group row">
										<label class="col-sm-3 form-control-label">Download Template</label>
										<div class="col">
											<a href="template/template_import_produk.xls" download="template_import_produk.xls">
												<button class="btn btn-success" type="button">Download</button>
											</a>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 form-control-label">Upload File</label>
										<div class="col">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="file_upload" name="file_upload" required></p>
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