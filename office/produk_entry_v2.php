<?php 
 //$array_level= array('1'=>'Service Advisor','2'=>'Admin Gudang','3'=>'Supervisor','4'=>'Keuangan','5'=>'Management');
?>
<div class="modal fade" id="modalEntry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalLabel">Entry produk</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!-- <form id="form1" name="form1" method="post" action="api_proses.php" enctype="multipart/form-data"> -->
							<form id="form1" name="form1" method="post" action="api_proses_v2.php" enctype="multipart/form-data">
									<input type="hidden" name="jenis" value="produk_entry">	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Nama produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="nama_produk" name="nama_produk" required></p>
										</div>
									</div>	
								    <div class="form-group row">
										<label class="col-sm-2 form-control-label">Kategori</label>
										<div class="col-sm-10">
											<select name="category" class="form-control entry">
												<option value="" selected disabled>Pilih Kategori</option>
												<option value="praying">Praying</option>
												<option value="shirt">Shirt</option>
												<option value="tees">Tees</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Kode model</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="kode_model" name="kode_model" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Deskripsi</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<textarea  class="form-control entry" id="deskripsi" name="deskripsi" required></textarea></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Qty Produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="qty_total" name="qty_total" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Harga produk</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control entry" id="harga_total" name="harga_total" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Foto produk 1*</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto" name="foto" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row" id="inputGambar2">
										<label class="col-sm-2 form-control-label">Foto produk 2</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto2" name="foto2"></p>
											</p>
										</div>
									</div>
									<div class="form-group row" id="inputGambar3">
										<label class="col-sm-2 form-control-label">Foto produk 3</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="file" class="form-control entry" id="foto3" name="foto3"></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">Start date</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control flatpickr" id="mulai" name="mulai" required></p>
											</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 form-control-label">End date</label>
										<div class="col-sm-10">
											<p class="form-control-static">
												<input type="text" class="form-control flatpickr entry" id="akhir" name="akhir" required></p>
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