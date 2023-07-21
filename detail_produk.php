<?php 
include"template/connect_main.php";
// $root="/var/www/rabbani.plstn/";
$root="";

$idp=$_GET['idp'];

$sanitized_prodid = mysqli_real_escape_string($link, $idp);

$queryCekId = sprintf("SELECT id FROM produk WHERE id='". $sanitized_prodid . "'",
mysqli_real_escape_string($link, $idp));
$result = mysqli_query($link, $queryCekId);
if(mysqli_num_rows($result) < 1) {
	header('Location: index.php');
}

	$sql="SELECT
                  id,
                  nama_produk,
                  kategori,
                  foto,
                  foto2,
                  foto3,
                  deskripsi,
                  harga_total,
                  `status`
                FROM produk where id='$idp'";
        $query=mysqli_query($link,$sql);
        list($id,$nama_produk,$kategori,$images,$images2,$images3,$deskripsi,$harga,$status)=mysqli_fetch_array($query);

include ("template/header_produk.php");?>
<?php include("template/navbar.php"); ?>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
		*{
			font-family: Roboto, "sans-serif";
		}
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
			margin-top: 8px;
			padding-left: 5px !important;
			font-size: 20px !important;
			color: #e93636 !important;
		}
		.btn-warna{
			width:32px;
			height:32px;
			border: 1px solid #8d8d8d;
		}
		.btn {
			border-radius: 6px;
		}
		.btn:hover {
			border: 1px solid #8d8d8d;
		}
		.button-color {
			width:40px;
			height:40px;
			border:1px solid #ccc !important;
			/* margin-top: 5px !important; */
		}
		.img-preview{
			border-radius: 8px !important;
		}
		.img-indikator{
			border-radius: 8px !important;
		}
		.judul-produk{
			font-size: 20px;
		}
		
		@media (min-width: 767px){
			.carousel-indicators-inside{
				display:none;
			}
		}
		@media (max-width: 767px){
			
			.img-indikator{
				display:none;
			}
			.carousel-indicators{
				display:none;
			}
			.button-color {
				width:35px;
				height:35px;
			}
			.judul-produk{
				margin-top:16px !important;
			}
		}

		@media (max-width: 411px) {
			.carousel-indicators-inside{
				position: absolute !important;
				margin-bottom:-10% !important;
			}
			.carousel-indicators-inside li {
				max-width: 12px !important;
				max-height: 12px !important;

			}
			.judul-produk{
				margin-top:16px !important;
			}
		}
	</style>

<?php require_once "color_convert.php"; ?>
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
					<div id="showImage">
						<div id="indikator" class="carousel slide" data-ride="carousel" data-interval="false">
							
							<ol class="carousel-indicators-inside">
								<?php if ($images!='' && file_exists("$root$images")){?>
								<li data-target="#indikator" style="background:#FFF" data-slide-to="0" class="active"></li>
								<?php }
								if ($images2!='' && file_exists("$root$images2")){?>
									<li data-target="#indikator" style="background:#FFF" data-slide-to="1"></li>
								<?php }
								if ($images3!='' && file_exists("$root$images3")){?>
									<li data-target="#indikator" style="background:#FFF" data-slide-to="2"></li>
								<?php }?>
							</ol>
							<div class="carousel-inner">
								<?php if ($images!='' && file_exists("$root$images")){?>
									<div class="carousel-item active">
										<img id="img-preview" class="img-preview" src="<?php echo $images;?>">
									</div>
								<?php }

								if ($images2!='' && file_exists("$root$images2")){
									?>
									<div class="carousel-item">
										<img id="img-preview" class="img-preview" src="<?php echo $images2;?>">
									</div>
								<?php }
								if ($images3!='' && file_exists("$root$images3")){?>
									<div class="carousel-item">
										<img id="img-preview" class="img-preview" src="<?php echo $images3;?>">
									</div>
								<?php }?>
							</div>
							<a class="carousel-control-prev" href="#indikator" data-slide="prev">
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#indikator" data-slide="next">
								<span class="sr-only">Next</span>
							</a>
							<ol class="carousel-indicators">
								<?php if ($images!='' && file_exists("$root$images")){?>
									<li data-target="#indikator" data-slide-to="0" class="active"><img class="img-indikator" src="<?= $images ?>"></li>
								<?php }
								if ($images2!='' && file_exists("$root$images2")){?>
									<li data-target="#indikator" data-slide-to="1" class="active"><img class="img-indikator" src="<?= $images2 ?>"></li>
								<?php }
								if ($images3!='' && file_exists("$root$images3")){?>
									<li data-target="#indikator" data-slide-to="2" class="active"><img class="img-indikator" src="<?= $images3 ?>"></li>
								<?php }?>
								
							</ol>
						</div>
					</div>
				</div>
				
				<div id="mob-produk" class="col detail-p">
					<h3 class="margin0 judul-produk" ><?php echo $nama_produk;?></h3>
					<!-- <p class="margin0 hilang"><?php echo $persen_disc ;?></p> -->
					<h1 class="rp" id="show_price">IDR. <?php echo number_format($harga);?></h1>
					<input type="hidden" name="harga1" id="harga1">
					<!-- <p class="margin0">50% <del>Rp.100.000</del></p> -->

					<!-- <p class="pilih">Size Available</p>
					<div id="size_choise" class="mb-3">
							<?php 
							$sql="SELECT
								    u.ukuran
								FROM
								    produk_detail AS pd
								    INNER JOIN ukuran AS u 
								        ON (pd.ukuran = u.kode_ukuran) WHERE pd.id_produk='$idp'
								        GROUP BY u.ukuran ORDER BY u.kode_ukuran ASC";
							 $query=mysqli_query($link,$sql);	
							 //echo $sql;        
							while(list($ukuran)=mysqli_fetch_array($query)){    	        
							?>
							<div class="button" >
								<label class="btn" style="margin-top:5px;"><?php echo $ukuran; ?></label>
							</div>
							<?php } ?>

					</div>
					<div id="tampil_ukuran">
						
					</div> -->
					
					<p class="pilih">Color Available</p>
					<div class="mb-1">
					<?php 
					$sql="SELECT
						pw.kode_warna
						, w.warna_english
					FROM
						produk_warna AS pw
					INNER JOIN produk AS p 
						ON (pw.id = p.id)
					INNER JOIN warna AS w
						ON (pw.kode_warna = w.kode_warna) WHERE p.id='$idp' ORDER BY w.warna_english ASC";
					 $query=mysqli_query($link,$sql);	
							//  echo $sql;        
							while(list($kode_warna,$warna)=mysqli_fetch_array($query)){    	      	        
					?>
							<div class="button">
								<input style="margin-top:10px !important" type="radio" id="<?php echo $warna;?>" name="warna"  value="<?php echo $warna;?>"  />
								<label class="btn button-color" for="<?php echo $warna;?>" style="background-color:<?php echo colorconvert(preg_replace("/[^a-zA-Z]/", "", $warna));?>" onclick="changeColor('<?php echo $_GET['idp']; ?>','<?php echo $kode_warna; ?>','<?php echo $root; ?>')"></label>
							</div>
					<?php } ?>	
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
						<?php echo $deskripsi;?>
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


<script>
	function changeColor(id,kw,root) {
		var id_prod = id;
		var kw 		= kw;
		var root 	= root;
		$.ajax({
		url: 'change_produk_per_warna.php',
		data: {
			"id_prod"	: id_prod,
			"kw"     	: kw,
			"root"   	: root,
			},
			success: function(data) {

			$('#showImage').html(data);

			}
		});
  	}
</script>
<?php include ("template/footer.php");?>
<script type="text/javascript" src="assets/js/detailproduk.js"></script>
<script src="assets/js/format.number.min.js"></script>	
