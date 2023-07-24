<?php
include 'template/connect_main.php';
$id_prod=$_GET['id_prod'];
$kw=$_GET['kw'];
$root=$_GET['root'];

$sql="SELECT
        p.id,
        p.nama_produk,
        p.kategori,
        pw.gambar1,
        pw.gambar2,
        pw.gambar3,
        p.deskripsi,
        p.harga_total,
        p.`status`
FROM produk p LEFT JOIN produk_warna pw ON p.id=pw.id where p.id='$id_prod' AND pw.kode_warna='$kw'";
$query=mysqli_query($link,$sql);
list($id,$nama_produk,$kategori,$images,$images2,$images3,$deskripsi,$harga,$status)=mysqli_fetch_array($query);
?>
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
					<img id="img-preview" class="img-preview lazy-load easeload" src="<?php echo $images;?>">
				</div>
			<?php }

			if ($images2!='' && file_exists("$root$images2")){
				?>
				<div class="carousel-item">
					<img id="img-preview" class="img-preview lazy-load easeload" src="<?php echo $images2;?>">
				</div>
			<?php }
			if ($images3!='' && file_exists("$root$images3")){?>
				<div class="carousel-item">
					<img id="img-preview" class="img-preview lazy-load easeload" src="<?php echo $images3;?>">
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
