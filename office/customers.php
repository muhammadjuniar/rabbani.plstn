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
					$sql="SELECT username,`password`,nama,akhiran,kode_kota,kodepos,alamat,tlp,hp,verifikasi,psw,
                         kode_provinsi,kode_kecamatan,tgl_daftar,id_member,`status`,pin_bb,id_level,id_customer,
                         token,dropshipper,kelamin,tempat_lahir,tgl_lahir,pekerjaan,foto,update_date,update_user
                         FROM member";
                    $query=mysqli_query($link,$sql);     
					?>
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Nama</th>
							<th>Type</th>
							<th>alamat</th>
							<th>Tanggal daftar</th>
							<th>Update date</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Nama</th>
							<th>Type</th>
							<th>alamat</th>
							<th>Tanggal daftar</th>
							<th>Update date</th>
						</tr>
						</tfoot>
						<tbody>
						<?php
						$no=0;
						while(list($username,$password,$nama,$akhiran,$kode_kota,$kodepos,$alamat,$tlp,$hp,$verifikasi,$psw,
                         $kode_provinsi,$kode_kecamatan,$tgl_daftar,$id_member,$status,$pin_bb,$id_level,$id_customer,
                         $token,$dropshipper,$kelamin,$tempat_lahir,$tgl_lahir,$pekerjaan,$foto,$update_date,$update_user)=mysqli_fetch_array($query)){
							$no++;
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $username;?></td>
							<td><?php echo $password;?></td>
							<td><?php echo $nama;?></td>
							<td><?php echo $id_level;?></td>
							<td><?php echo $alamat;?></td>
							<td><?php echo $tgl_daftar;?></td>
							<td><?php echo $update_date;?></td>
						</tr>
						<?php 
						}
						?>
						
						
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