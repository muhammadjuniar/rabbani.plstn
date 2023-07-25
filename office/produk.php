<!DOCTYPE html>
<html>
<head lang="en">
	<?php include"rell_top.php";?>
	<link rel="stylesheet" href="css/lib/datatables-net/datatables.min.css">
	<link rel="stylesheet" href="css/separate/vendor/datatables-net.min.css">


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
							<h2>Customers</h2>
							<div class="subtitle">Welcome to Rabbani Order</div>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<?php 
					$sql="SELECT id,nama_paket,foto,foto_type,foto_size,kode_model,qty_total,harga_total,`start`,
                         `end`,is_send,is_batal,`repeat`,created_at,created_by,`status`
                          FROM paket_order";
                    $query=mysqli_query($link,$sql);     
					?>
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Kode model</th>
							<th>Qty produk</th>
							<th>Total  harga</th>
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
						while(list($id,$nama_paket,$foto,$foto_type,$foto_size,$kode_model,$qty_total,$harga_total,$start,
                         $end,$is_send,$is_batal,$repeat,$created_at,$created_by,$status)=mysqli_fetch_array($query)){
							$no++;
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $kode_model;?></td>
							<td><?php echo $qty_total;?></td>
							<td><?php echo $harga_total?></td>
							<td><?php echo $start;?></td>
							<td><?php echo $end;?></td>
							<td><?php echo $created_by;?></td>
							<td><?php echo $created_at;?></td>
							<td><?php echo $status;?></td>
							<td></td>
						</tr>
						<?php 
						}
						?>
						
						
						</tbody>
					</table>
				</div>
			</section>
		
	</div><!--.page-content-->
	<?php include"footer.php";?>


	</body>
</html>