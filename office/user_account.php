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
							<h2>User Account</h2>
							<div class="subtitle">Welcome to Rabbani Order</div>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<?php 
					$sql="SELECT username,`password`,`level`,nama,email,id_outlet,`status` FROM  `user`";
                    $query=mysqli_query($link,$sql);     
					?>
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th>Email</th>
							<th>Lokasi</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no=0;
						while(list($username,$password,$level,$nama,$email,$id_outlet,$status)=mysqli_fetch_array($query)){
							$no++;
						?>	
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $username;?></td>
							<td><?php echo $password;?></td>
							<td><?php echo $level;?></td>
							<td><?php echo $email;?></td>
							<td><?php echo $id_outlet;?></td>
							<td><?php echo $status;?></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
		
	</div><!--.page-content-->

	<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/lib/popper/popper.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/lib/datatables-net/datatables.min.js"></script>
	<script>
		$(function() {
			$('#example').DataTable();
		});
	</script>

<script src="js/app.js"></script>
</body>
</html>