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
	
	<?php include"menu.php";
	$id=mysqli_real_escape_string($link, $_GET['idproduk']);
	$h="SELECT nama_produk from produk_dev where id='$id'";
	$qh=mysqli_query($link,$h);  
	list($nama_produk)=mysqli_fetch_array($qh);   

	?>
	

	<div class="page-content">
		
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Detail produk <?php echo $nama_produk;?></h2>
							<div class="subtitle">Welcome to Rabbani Order</div>
						</div>
					</div>
				</div>
			</header>
			<?php 
			   include "produk_detail_entry_v2.php";
			   include "produk_detail_entry_bulk_v2.php";
			   include "produk_detail_edit_v2.php"; 
			?>
			<section class="card">
				

				<div class="card-block">
					<div class="form-group row">
					    <!-- <div class="col-sm-1">
							<b class="pull-right">Filter By</b>
						</div>	
						<div class="col-sm-2">
							<p class="form-control-static">
								<select name="filterby" id="filterby" class="form-control">
										
								</select>
							</p>							
						</div>	 -->
						<div class="col">
							 <a href="#" class="float-right" data-toggle="modal" data-target="#modalUpload"><button class="btn btn-success" onclick="reset_input()">Upload Bulk</button></a>
							 <a href="#" class="float-right mr-2" data-toggle="modal" data-target="#modalEntry"><button class="btn btn-success" onclick="reset_input()">+ Produk</button></a>
						</div>
						<input type="submit" id="submit" style="display: none;">
					</div>

					<?php 
					
					$sql="SELECT id_produk,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto
                          FROM produk_detail where id_produk='$id'";
                    //echo $sql;      
                    $query=mysqli_query($link,$sql);     
					?>
					<div class="table-responsive">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>ID Produk</th>
							<th>Barcode</th>
							<th>Nama produk</th>
							<th>Ukuran</th>
							<th>Warna</th>
							<th>Disc Conf</th>
							<th>Qty</th>
							<th>Harga satuan</th>
							<th>Diskon</th>
							<th>Netto</th>
							<th>Subtotal</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no=0;
						$grand_qty=0;
						$grand_subtotal=0;
						while(list($id_produk,$barcode,$nama_produk,$ukuran,$warna,$disc_conf,$qty,$harga,$diskon,$netto)=mysqli_fetch_array($query)){
							$no++;
							// if($status==1) {
							// 	$text_status="aktif";
							// } else {
							// 	$text_status="tidak aktif";
							// }

							$subtotal=$qty*$harga-$diskon;
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $id_produk;?></td>
							<td><?php echo $barcode;?></td>
							<td><?php echo $nama_produk;?></td>
							<td><?php echo $ukuran;?></td>
							<td>
								<a href="produk_gambar_per_warna.php?idproduk=<?php echo $id_produk?>&kode=<?php echo $warna;?>"><?php echo $warna;?></a>
							</td>
							<td><?php echo $disc_conf?></td>
							<td><?php echo $qty;?></td>
							<td><?php echo number_format($harga);?></td>
							<td><?php echo $diskon;?></td>
							<td><?php echo $netto;?></td>
							<td><?php echo number_format($subtotal);?></td>
							<td>
								<a href="#" data-toggle="modal" data-target="#modalEdit" 
								data-id="<?php echo $id_produk."-".$barcode;?>"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php 
						   $grand_qty+=$qty;
						   $grand_subtotal+=$subtotal;
						}
						?>
						<thead>
						<tr>
							<th colspan="7"></th>
							<th><?php echo number_format($grand_qty);?></th>
							<th></th>
							<th></th>
							<th></th>
							<th><?php echo number_format($grand_subtotal);?></th>
							<th></th>
						</tr>
						</thead>
						
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
				var idx = $(e.relatedTarget).data('id');
				//alert(rowid);	
	            $.ajax({
	                type : 'POST',
	                url :  'produk_detail_edit_fletch_v2.php',
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