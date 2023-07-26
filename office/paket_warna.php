<?php error_reporting(0);
$thisPage=$_SERVER['PHP_SELF']; ?>

<!DOCTYPE html>
<html>
<head lang="en">
	<?php include"rell_top.php";?>
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
							<h2>Warna</h2>
							<div class="subtitle">Welcome to Rabbani Palestine</div>
						</div>
					</div>
				</div>
			</header>
			<?php 
			   include "component/modals/paket_warna_entry.php";
			   include "component/modals/paket_warna_edit.php"; 
			?>
			<section class="card">
				

				<div class="card-block">
					<form action="<?php echo $thisPage; ?>">
					<div class="form-group row">
							    <div class="col-sm-1">
									<b class="pull-right">Cari warna</b>
								</div>	
								<div class="col-sm-2">
									<p class="form-control-static">
										<input name="search" id="cari" class="form-control" autocomplete="off"
										<?php if(isset($_GET['search']) && $_GET['search'] != ""){ ?>
											value="<?php echo $_GET['search']; ?>"
										<?php } ?>
										placeholder="Kode/Warna"
										/>
									</p>						
								</div>	
								<div class="col-sm-2">
									<p class="form-control-static">
										<input name="limit" id="limit" class="form-control" autocomplete="off"
										<?php if(isset($_GET['limit']) && $_GET['limit'] != ""){ ?>
											value="<?php echo $_GET['limit']; ?>"
										<?php } ?>
										placeholder="Limit data"
										/>
									</p>						
								</div>	
								<div class="col">
									<input class="btn btn-info" type="submit" id="submit" value="Cari">
									<a href="paket_warna.php"><input type="button" value="Reset" class="btn btn-secondary"></a>
									<a href="#" data-toggle="modal" data-target="#produkWarnaEntry"><button class="btn btn-success" onclick="reset_input()">+ Warna</button></a>
									<!-- <a href="#" data-toggle="modal" data-target="#produkWarnaBulk"><button class="btn btn-success" onclick="reset_input()">Upload Bulk Warna</button></a> -->
								</div>
						</div>
						</form>
					<?php 
					if(isset($_GET['search']) && $_GET['search'] != ""){
						$cari=$_GET['search'];
						$search="AND kode_warna LIKE '%$cari%' OR warna LIKE '%$cari%' OR warna_english LIKE '%$cari%'";
					}else{
						$search="";
					}
					if(isset($_GET['limit']) && $_GET['limit'] != ""){
						$limit=$_GET['limit'];
					}elseif(isset($_GET['limit']) && $_GET['limit'] == ""){
						$limit=100;
					}else{
						$limit=50;
					}
					$sql="SELECT kode_warna, warna, warna_english, images
                          FROM warna
						  WHERE (warna NOT LIKE '%unidefined%' AND warna NOT LIKE '%unidentified%') AND (warna_english NOT LIKE '%unidefined%' AND warna_english NOT LIKE '%unidentified%') $search
						  ORDER BY warna ASC
						  LIMIT $limit";
                    $query=mysqli_query($link,$sql);     
					$rowCount=mysqli_num_rows($query);
					?>
					<table id="example" class="display table table-striped table-bordered responsive" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Warna</th>
							<th>Warna English</th>
							<th>Images</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php
							if($rowCount > 0){
							$no=0;
							while(list($kode,$warna,$warnaEnglish,$images)=mysqli_fetch_array($query)){
							$no++;
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $kode;?></td>
							<td><?php echo $warna;?></td>
							<td><?php echo $warnaEnglish;?></td>
							<td>
								<?php if($images != "") { ?>
									<img src="<?php echo $images?>" style="width: 50px;height: 50px;"></td>
								<?php } else { ?>
									<!-- <a href="#" data-toggle="modal" data-target="#imageEdit" data-id="<?php echo $kode;?>">Add Color Image</a> -->
									<p class="btn btn-sm btn-secondary" id="addImage<?php echo $kode;?>" onclick="showFunction('<?php echo $kode;?>')">Add Color Image</p>
									<form id="form-image<?php echo $kode;?>" method="post" action="api_proses.php" enctype="multipart/form-data" style="display:none">
										<input type="hidden" name="jenis" value="produk_warna_edit_image">	
										<input type="hidden" name="kode_warna" value="<?php echo $kode;?>">	
										
										<div class="form-group row">
											<div class="col-sm-8">
												<input type="file" id="eimages<?php echo $kode;?>" name="images">
											</div>
											<div class="col-sm-4">
												<input type="submit" class="btn btn-sm btn-warning" id="btnform" value="Add">
												<input type="button" class="btn btn-sm btn-info" id="btnform" value="Batal" onclick="hideFunction('<?php echo $kode;?>')">
											</div>
										</div>
									</form>
								<?php } ?>
							<td>
								<a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $kode;?>"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php 
						}}else{
						?>
						<tr>
							<td class="text-center" colspan='6'>Data not Found!</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
		
	</div><!--.page-content-->
	<?php include"footer.php";?>
	<script type="text/javascript">
        $(document).ready(function(){
	        $('#modalEdit').on('show.bs.modal', function (e) {
				$('#fetched-data').html("");
				var idx = $(e.relatedTarget).data('id');
				//alert(rowid);	
	            $.ajax({
	                type : 'POST',
	                url :  'component/modals/paket_warna_edit_fletch.php',
					cache: false,
	                data :  'id='+ idx,
	                success : function(data){
					     $('#fetched-data').html(data);
	                }
	            });
	         });
	    });

		// jika ingin menggunakan popup add color image
		$(document).ready(function(){
	        $('#imageEdit').on('show.bs.modal', function (e) {
				$('#fetch-data').html("");
				var idx = $(e.relatedTarget).data('id');
				//alert(rowid);	
	            $.ajax({
	                type : 'POST',
	                url :  'component/modals/paket_warna_edit_images_fetch.php',
					cache: false,
	                data :  'id='+ idx,
	                success : function(data){
					     $('#fetch-data').html(data);
	                }
	            });
	         });
	    });

		function reset_input(){
			//alert('beuh');
			$('.entry').val('');
		}

		
	function showFunction(id) {
		var kode = id;
		document.getElementById("form-image"+kode).style.display = "block";
		document.getElementById("addImage"+kode).style.display = "none";
	}

	function hideFunction(id) {
		var kode = id;
		document.getElementById("form-image"+kode).style.display = "none";
		document.getElementById("addImage"+kode).style.display = "inline-block";
		document.getElementById("eimages"+kode).value = "";
	}

	</script>	

	</body>
</html>