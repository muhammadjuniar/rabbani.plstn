<?php error_reporting(0); ?>

<!DOCTYPE html>
<html>
<head lang="en">
	<?php include"rell_top.php";?>
	<!-- <link rel="stylesheet" href="css/lib/datatables-net/datatables.min.css">
	<link rel="stylesheet" href="css/separate/vendor/datatables-net.min.css"> -->
	<link rel="stylesheet" href="css/lib/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="css/separate/vendor/flatpickr.min.css">

</head>
<body class="with-side-menu control-panel control-panel-compact">

	<?php include"header.php";?>

	<div class="mobile-menu-left-overlay"></div>
	
	<?php include"menu.php"; ?>
	<?php 
	$root="../";

	$id=mysqli_real_escape_string($link, $_GET['idproduk']);
	$kode=mysqli_real_escape_string($link, $_GET['kode']);
	$h="SELECT nama_produk FROM produk_dev WHERE id='$id'";
	$qh=mysqli_query($link,$h);  
	list($nama_produk)=mysqli_fetch_array($qh);
	
	$sql="SELECT id,kode_warna,gambar1,gambar2,gambar3
		FROM produk_warna
		WHERE id='$id' AND kode_warna='$kode'";
	$query=mysqli_query($link,$sql);  
	$numRows=mysqli_num_rows($query);   
	?>
	

	<div class="page-content">
		
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Gambar Per Warna Produk</h2>
							<div class="subtitle">Welcome to Rabbani Palestine</div>
						</div>
					</div>
				</div>
			</header>
			<?php 
			   include "produk_gambar_per_warna_entry.php";
			   include "produk_gambar_per_warna_edit.php"; 
			?>
			<section class="card">
				

				<div class="card-block">
					<div class="form-group row">

								<?php if($numRows < 1) { ?>
								<div class="col text-right">
									 <a href="#" data-toggle="modal" data-target="#produkGambarEntry"><button class="btn btn-success" onclick="reset_input()">+ Gambar</button></a>
								</div>
								<?php } ?>
						</div>
					<div class="table-responsive">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>ID</th>
							<th>Kode Warna</th>
							<th>Gambar 1</th>
							<th>Gambar 2</th>
							<th>Gambar 3</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php if($numRows > 0) { ?>
						<?php
						$no=0;
						while(list($id_produk,$kode_warna,$foto,$foto2,$foto3)=mysqli_fetch_array($query)){
						$no++;
						?>
						<tr>
							<!-- <td><?php echo $no;?></td> -->
							<td><a href="paket_detail.php?idproduk=<?php echo $id_produk?>"><?php echo $id_produk;?></a></td>
							<td><?php echo $kode_warna;?></td>
							<td>
								<?php if ($foto!='' && file_exists("$root$foto")){?>
									<img src="../<?php echo $foto?>" style="width: 200px;">
								<?php } ?>
							</td>
							<td>
								<?php if ($foto2!='' && file_exists("$root$foto2")){?>
									<img src="../<?php echo $foto2?>" style="width: 200px;">
								<?php } ?>
							</td>
							<td>
								<?php if ($foto3!='' && file_exists("$root$foto3")){?>
									<img src="../<?php echo $foto3?>" style="width: 200px;">
								<?php } ?>
							</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $id."-".$kode_warna;?>"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php } ?> 
						<?php } else { ?>
						<tr>
							<td class="text-center" colspan="10"><a href="paket_detail.php?idproduk=<?php echo $id?>">Gambar tidak ditemukan!</a></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</section>
		
	</div><!--.page-content-->
	<?php include"footer.php";?>
	<script type="text/javascript" src="js/lib/flatpickr/flatpickr.min.js"></script> 
	<script type="text/javascript">
        $(document).ready(function(){
	        $('#modalEdit').on('show.bs.modal', function (e) {
				$('#fetched-data').html("");
				var idx = $(e.relatedTarget).data('id');
				//alert(rowid);	
	            $.ajax({
	                type : 'POST',
	                url :  'produk_gambar_per_warna_edit_fletch.php',
					cache: false,
	                data :  'id='+ idx,
	                success : function(data){
					     $('#fetched-data').html(data);
	                }
	            });
	         });
	    });

		$(function() {
	   		$('.flatpickr').flatpickr();
	   });

		function reset_input(){
			//alert('beuh');
			$('.entry').val('');
		}


	</script>	

	</body>
</html>