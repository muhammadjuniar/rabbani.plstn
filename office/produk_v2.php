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
	
	<?php include"menu.php";?>
	

	<div class="page-content">
		
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Produk</h2>
							<div class="subtitle">Welcome to Rabbani Palestine</div>
						</div>
					</div>
				</div>
			</header>
			<?php 
			   include "produk_entry_v2.php";
			   include "paket_edit.php"; 
			?>
			<section class="card">
				

				<div class="card-block">
					<div class="form-group row">

							    <div class="col-sm-1">
									<b class="pull-right">Filter By</b>
								</div>	
								<div class="col-sm-2">
									<p class="form-control-static">
										<select name="filterby" id="filterby" class="form-control">
										
										</select>
									</p>							
								</div>	
								<div class="col-sm-3">
									 <a href="#" data-toggle="modal" data-target="#modalEntry"><button class="btn btn-success" onclick="reset_input()">+ produk</button></a>
								</div>
								<input type="submit" id="submit" style="display: none;">
						</div>
					<?php 
					$sql="SELECT id,nama_produk,foto,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,`start`,
                         `end`,is_send,is_batal,`repeat`,created_at,created_by,`status`
						FROM produk_dev";
                    $query=mysqli_query($link,$sql);     
					?>
					<div class="table-responsive">
						<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Pic.</th>
								<th>Nama</th>
								<th>Kode model</th>
								<th>Deskripsi</th>
								<th>Qty produk</th>
								<th>Tot.harga</th>
								<th>start</th>
								<th>end</th>
								<th>created_by</th>
								<th>created_at</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no=0;
							$grand_qty_total=0;
							$grand_harga_total=0;
							while(list($id,$nama_produk,$foto,$foto_type,$foto_size,$kode_model,$deskripsi,$qty_total,$harga_total,$start,
							$end,$is_send,$is_batal,$repeat,$created_at,$created_by,$status)=mysqli_fetch_array($query)){
								$no++;
								if($status==1) {
									$text_status="aktif";
								} else {
									$text_status="tidak aktif";
								}
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><a href="produk_detail_v2.php?idproduk=<?php echo $id?>"><?php echo $id;?></a></td>
								<td><img src="<?php echo $foto?>" style="width: 50px;"></td>
								<td><?php echo $nama_produk;?></td>
								<td><?php echo $kode_model;?></td>
								<td><?php echo $deskripsi;?></td>
								<td><?php echo $qty_total;?></td>
								<td><?php echo number_format($harga_total);?></td>
								<td><?php echo $start;?></td>
								<td><?php echo $end;?></td>
								<td><?php echo $created_by;?></td>
								<td><?php echo $created_at;?></td>
								<td><?php echo $text_status;?></td>
								<td>
									<a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $id;?>"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
							<?php 
							$grand_qty_total+=$qty_total;
							$grand_harga_total+=$harga_total;
							}
							?>
							</tbody>
							<tfoot>
							<tr>
								<th colspan="6"></th>
								<th><?php echo number_format($grand_qty_total);?></th>
								<th><?php echo number_format($grand_harga_total);?></th>
								<th colspan="6"></th>
							</tr>
							</tfoot>
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
	                url :  'produk_edit_fletch_v2.php',
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
			$('#inputGambar2').css({display: 'none'});
			$('#inputGambar3').css({display: 'none'});
		}
		
		$('#foto').on('change', function() {
		if(this.value != "") {
			$('#inputGambar2').css({display: 'flex'});
		} 
		});

		$('#foto2').on('change', function() {
		if(this.value != "") {
			$('#inputGambar3').css({display: 'flex'});
		} 
		});


	</script>	

	</body>
</html>