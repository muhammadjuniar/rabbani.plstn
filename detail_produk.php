<?php 
include"template/connect_main.php";
// $root="/var/www/rabbani.plstn/";
$root="";

$name=$_GET['name'];

$sqlID="SELECT id FROM produk WHERE nama_produk LIKE '%$name%'";
$queryID=mysqli_query($link,$sqlID);
list($idp)=mysqli_fetch_array($queryID);

$sanitized_prodid = mysqli_real_escape_string($link, $idp);

$queryCekId = sprintf("SELECT id FROM produk WHERE id='". $sanitized_prodid . "'",
mysqli_real_escape_string($link, $idp));
$result = mysqli_query($link, $queryCekId);
// if(mysqli_num_rows($result) < 1) {
// 	header('Location: /');
// }

	$sql="	SELECT
                id,
                nama_produk,
                kategori,
                foto,
                foto2,
                foto3,
                deskripsi,
                harga_total,
                `status`
        	FROM produk 
			WHERE id='$idp'
		";
        $query=mysqli_query($link,$sql);
        list($id,$nama_produk,$kategori,$images,$images2,$images3,$deskripsi,$harga,$status)=mysqli_fetch_array($query);

include ("template/header_produk.php");?>
<?php include("template/navbar.php"); ?>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

		* {
			font-family: Roboto, "sans-serif";
		}

		.container_login {
			display: flex;
			flex-direction: row;
			width: 100%;
		}

		.easeload {
			animation: fadeIn 2s; 
		}

		img.lazy-load {
			background: #ececec;
			width: 600px;
			height: 565px;
		}

		@keyframes fadeIn {
			0% { opacity: 0; }
			100% { opacity: 1; }
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

		.btn-warna {
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

		.img-preview {
			border-radius: 8px !important;
		}

		.img-indikator {
			border-radius: 8px !important;
		}

		.judul-produk{
			font-size: 20px;
		}
		
		@media (min-width: 767px) {
			.carousel-indicators-inside {
				display:none !important;
			}
			.navigation-height {
				margin-bottom:100px !important;
			}
		}

		@media (min-width: 992px) and (max-width: 1199px) {
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 465px;
			}
		}

		@media (min-width: 767px) and (max-width: 991px) {
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 355px;
			}
		}

		@media (min-width: 601px) and (max-width: 767px) {
			h5 {
				margin-top: 15px;
			}
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.button-color {
				width:35px;
				height:35px;
			}
			.judul-produk {
				margin-top:16px !important;
			}
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 530px;
			}
		}

		@media (min-width: 412px) and (max-width: 600px) {
			h5 {
				margin-top: 15px;
			}
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.button-color {
				width:35px;
				height:35px;
			}
			.judul-produk {
				margin-top:16px !important;
			}
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 410px;
			}
		}

		@media (max-width: 411px) {
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.carousel-indicators-inside {
				position: absolute !important;
				margin-bottom:-10% !important;
			}
			.carousel-indicators-inside li {
				max-width: 12px !important;
				max-height: 12px !important;

			}
			.judul-produk {
				margin-top:16px !important;
			}
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 410px;
			}
		}

		@media (max-width: 375px) {
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.carousel-indicators-inside {
				position: absolute !important;
				margin-bottom:-10% !important;
			}
			.carousel-indicators-inside li {
				max-width: 12px !important;
				max-height: 12px !important;

			}
			.judul-produk {
				margin-top:16px !important;
			}
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 373px;
			}
		}

		@media (max-width: 360px) {
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.carousel-indicators-inside {
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
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 360px;
			}
		}

		@media (max-width: 280px) {
			.img-indikator {
				display:none;
			}
			.carousel-indicators {
				display:none;
			}
			.carousel-indicators-inside {
				position: absolute !important;
				margin-bottom:-15% !important;
			}
			.carousel-indicators-inside li {
				max-width: 10px !important;
				max-height: 10px !important;

			}
			.judul-produk {
				margin-top:16px !important;
				font-size:16px !important;
			}
			img.lazy-load {
				background: #ececec;
				width: 600px;
				height: 280px;
			}
		}
	</style>
<?php require_once "color_convert.php"; ?>
<section id="content" style="margin-bottom: 0px; ">

	<div class="content-wrap" style="background-image: url('assets/images/img_bg.jpg') !important">
		<div id="title-mob" class="container mb-2">
			<!-- <a href="#">Kerudung Sekolah /</a> -->
			<a href="#"><h5><?php echo $nama_produk;?></h5></a>
			<?php echo $name ?>
		</div>
		<div id="mobile" class="container clearfix" style="background-color:#fff; border-radius:8px;box-shadow: 0px 0px 2px 1px rgba(128, 0, 0, 0.25);">

			<!-- Post Content
			============================================= -->
			<div class="row" id="showImage">
				<div class="col-md-6" >
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
										<img id="img-preview" class="img-preview lazy-load easeload" data-src="<?php echo $images;?>">
									</div>
								<?php }

								if ($images2!='' && file_exists("$root$images2")){
									?>
									<div class="carousel-item">
										<img id="img-preview" class="img-preview lazy-load easeload" data-src="<?php echo $images2;?>">
									</div>
								<?php }
								if ($images3!='' && file_exists("$root$images3")){?>
									<div class="carousel-item">
										<img id="img-preview" class="img-preview lazy-load easeload" data-src="<?php echo $images3;?>">
									</div>
								<?php }?>
							</div>
							<a class="carousel-control-prev navigation-height" href="#indikator" data-slide="prev">
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next navigation-height" href="#indikator" data-slide="next">
								<span class="sr-only">Next</span>
							</a>
							<ol class="carousel-indicators">
								<?php if ($images!='' && file_exists("$root$images")){?>
									<li data-target="#indikator" data-slide-to="0" class="active"><img class="img-indikator easeload" src="<?= $images ?>"></li>
								<?php }
								if ($images2!='' && file_exists("$root$images2")){?>
									<li data-target="#indikator" data-slide-to="1" class="active"><img class="img-indikator easeload" src="<?= $images2 ?>"></li>
								<?php }
								if ($images3!='' && file_exists("$root$images3")){?>
									<li data-target="#indikator" data-slide-to="2" class="active"><img class="img-indikator easeload" src="<?= $images3 ?>"></li>
								<?php }?>
								
							</ol>
						</div>
				</div>
				
				<div id="mob-produk" class="col detail-p">
					<h3 class="margin0 judul-produk" ><?php echo $nama_produk;?></h3>
					<h1 class="rp" id="show_price">IDR. <?php echo number_format($harga);?></h1>
					
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
								<label class="btn button-color" for="<?php echo $warna;?>" style="background-color:<?php echo colorconvert(preg_replace("/[^a-zA-Z]/", "", $warna));?>" onclick="changeColor('<?php echo $idp; ?>','<?php echo $kode_warna; ?>','<?php echo $root; ?>')"></label>
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
	
	function preload_image(img) {
		img.src = img.dataset.src;
		console.log(`Loading ${img.src}`);
	}

	let observer = new IntersectionObserver(function(entries, self) {
	for(entry of entries) { 
		if(entry.isIntersecting) {
		let elem = entry.target;
		preload_image(elem);   
		self.unobserve(elem);
		}
	}
	});

	let images = document.querySelectorAll('img.lazy-load');

	for(image of images) {
	observer.observe(image);
	}

</script>
<?php include ("template/footer.php");?>
<script type="text/javascript" src="assets/js/detailproduk.js"></script>
<script src="assets/js/format.number.min.js"></script>	
