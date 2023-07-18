<?php 
include"template/connect_main.php";
$idp=$_GET['idp'];
$sql="SELECT
                  id,
                  nama_produk,
                  kategori,
                  foto,
                  foto2,
                  foto3,
                  harga_total,
                  `status`
                FROM produk where id='$idp'";
        $query=mysqli_query($link,$sql);
        list($id,$nama_produk,$kategori,$images,$images2,$images3,$harga,$status)=mysqli_fetch_array($query);	
include ("template/header_produk.php");?>
<?php include("template/navbar.php"); ?>
	<style>
		.container_login {
			display: flex;
			flex-direction: row;
			width: 100%;
		}
	
		.login-separator {
			display: flex;
			align-items: center;
			justify-content: center;
			background-image: #fff;
			padding: 30px 0;
			min-height: 110px;
			width: 100%;
		}
		h1.rp {
			padding-left: 5px !important;
			font-size: 20px !important;
		}
		.btn-warna{
			width:32px;
			height:32px;
			border: 1px solid #8d8d8d;
		}
		@media (max-width: 767px){
			
			.img-indikator{
				display:none;
			}
			.carousel-indicators{
				display:none;
			}
		}
	</style>

<section id="content" style="margin-bottom: 0px; ">

	<div class="content-wrap" style="background-image: url('assets/images/img_bg.jpg') !important">
		<div id="title-mob" class="container mb-2">
			<!-- <a href="#">Kerudung Sekolah /</a> -->
			<a href="#"><h5><?php echo $nama_produk;?></h5></a>
		</div>
		<div id="mobile" class="container clearfix" style="background-color:#fff; border-radius:8px;box-shadow: 0px 0px 2px 1px rgba(128, 0, 0, 0.25);">

			<!-- Post Content
			============================================= -->
			<div class="row">
				<div class="col-md-6" >
					<div id="indikator" class="carousel slide" data-ride="carousel" data-interval="false">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img id="img-preview" src="<?php echo $images;?>">
							</div>
							<!-- <?php if ($image1!=''){?>
								<div class="carousel-item active">
									<img id="img-preview" src="assets/foto_produk/<?php echo $image1; ?>">
								</div>
							<?php }

							if ($image2!=''){?>
								<div class="carousel-item">
									<img id="img-preview" src="assets/foto_produk/<?php echo $image2; ?>">
								</div>
							<?php }
							if ($image3!=''){?>
								<div class="carousel-item">
									<img id="img-preview" src="assets/foto_produk/<?php echo $image3; ?>">
								</div>
							<?php }
							if ($image4!=''){?>
								<div class="carousel-item">
									<img id="img-preview" src="assets/foto_produk/<?php echo $image4; ?>">
								</div>
							<?php }?> -->
						</div>
						<ol class="carousel-indicators ">
							<li data-target="#indikator" data-slide-to="0" class="active">
								<img class="img-indikator" src="<?php echo $images?>">
							</li>
							
							<?php if($images2!=''){?>
							<li data-target="#indikator" data-slide-to="0" class="active">
								<img class="img-indikator" src="<?php echo $images2?>">
							</li>
							<?php 
							}

							if($images3!=''){
							?>
							<li data-target="#indikator" data-slide-to="0" class="active">
								<img class="img-indikator" src="<?php echo $images3?>">
							</li>
							<?php } ?>
							<!-- <?php if ($image1!=''){?>
								<li data-target="#indikator" data-slide-to="0" class="active"><img class="img-indikator" src="assets/foto_produk/<?= $image1 ?>">-</li>
							<?php }

							if ($image2!=''){?>
								<li data-target="#indikator" data-slide-to="1" class="active"><img class="img-indikator" src="assets/foto_produk/<?= $image2 ?>">-</li>
							<?php }
							if ($image3!=''){?>
								<li data-target="#indikator" data-slide-to="2"><img class="img-indikator" src="assets/foto_produk/<?= $image3 ?>">-</li>
							<?php }
							if ($image4!=''){?>
								<li data-target="#indikator" data-slide-to="3"><img class="img-indikator" src="assets/foto_produk/<?= $image4 ?>">-</li>
							<?php }?> -->
							
							
							
						</ol>
					</div>
				</div>
			
				<div id="mob-produk" class="col detail-p">
					<h3 class="margin0" style="font-size: 20px; margin-top:16px"><?php echo $nama_produk;?></h3>
					<!-- <p class="margin0 hilang"><?php echo $persen_disc ;?></p> -->
					<h1 class="rp" id="show_price">IDR. <?php echo number_format($harga);?></h1>
					<input type="hidden" name="harga1" id="harga1">
					<!-- <p class="margin0">50% <del>Rp.100.000</del></p> -->

					<p class="pilih">Size Available</p>
					<div id="size_choise">
							<?php 
							$sql="SELECT
								    u.ukuran
								FROM
								    produk_detail AS pd
								    INNER JOIN ukuran AS u 
								        ON (pd.ukuran = u.kode_ukuran) WHERE pd.id_produk='$idp'
								        GROUP BY u.ukuran";
							 $query=mysqli_query($link,$sql);	
							 //echo $sql;        
							while(list($ukuran)=mysqli_fetch_array($query)){    	        
							?>
							<div class="button" >
								<input type="radio" id="<?php echo $ukuran;?>" name="size"  value="<?php echo $ukuran;?>"  />
								<label class="btn btn-outline-secondary size" for="<?php echo $ukuran;?>"><?php echo $ukuran; ?></label>
							</div>
							<?php } ?>

					</div>
					<div id="tampil_ukuran">
						
					</div>
					
					<p class="pilih">Color Available</p>
					<div>
					<?php 
					$sql="SELECT
						    pd.warna
						    , w.warna_english
						FROM
						    produk_detail AS pd
						    INNER JOIN warna AS w 
						        ON (pd.warna = w.kode_warna)WHERE pd.id_produk='$idp' group by pd.warna";
					 $query=mysqli_query($link,$sql);	
							 //echo $sql;        
							while(list($kode_warna,$warna)=mysqli_fetch_array($query)){    	      	        
					?>
							<div class="button" >
								<input type="radio" id="<?php echo $warna;?>" name="warna"  value="<?php echo $warna;?>"  />
								<label class="btn btn-outline-secondary size" for="<?php echo $warna;?>"><?php echo $warna; ?></label>
							</div>
							
					<?php } ?>		
							<p>&nbsp;</p>
							<!-- <div class="button btn-warna" style="background-color: #805859 !important;margin-right:5px!important;">
							
							</div>
							<div class="button btn-warna" style="background-color: #564a40 !important;margin-right:5px!important;">
								
							</div>
							<div class="button btn-warna" style="background-color: #424240 !important;margin-right:5px!important;">
							
							</div>
							<div class="button btn-warna" style="background-color: #2c2a40 !important;margin-right:5px!important;">
							
							</div>
							<div class="button btn-warna" style="background-color: #0c0a0d !important;margin-right:5px!important;">
								
							</div>
							<div class="button btn-warna" style="background-color: #eeecf7 !important;margin-right:5px!important;">
								
							</div> -->
						
						
					</div>

					
				</div>
			</div>
			<!-- .postcontent end -->
			<br>
		</div>

		<div id="mobile" class="container clearfix mt-2" style="background-color:#fff;box-shadow: 0px 0px 2px 1px rgba(128, 0, 0, 0.25); border-radius:8px ">

			<!-- Post Content
			============================================= -->
			<div class="row">
				<div id="mob-produk" class="col mt-3">
					<!-- <h4 style="margin-bottom: 0px !important;">Spesifikasi Produk</h4>
					<p style="margin-bottom: 0px !important;">Bahan: Katun</p> -->
					
					<p class="pilih">Product Description</p>
					<div class="row mt-2 mb-2">
					<!-- <div class="col-2">Fabric</div>
					<div class="col">: Camila</div> -->
					</div>
					<div class="row mt-2 mb-2">
					<div class="col-2">Category</div>
					<div class="col">: <?php echo $kategori;?></div>
					</div>
					<p style="margin-bottom: 0px !important;">
						<?php echo $nama_produk;?>
					</p>
				</div>
			</div>
			<!-- .postcontent end -->
			<br>
		</div>
	</div>

	<!-- Button trigger modal -->


<section id="separator" style="margin-bottom: 0; ">
    <div class="container_login">
        <div class="login-separator">
            <img class="img-brand" src="assets/images/img_family_brand.png" alt="">
        </div>
    </div>
</section>
<?php include ("template/footer.php");?>
<script type="text/javascript" src="assets/js/detailproduk.js"></script>
<script src="assets/js/format.number.min.js"></script>	
