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

    if (isset($_GET['hal'])) { 		      
		$tgl1=$_SESSION['tgl1'];
		$tgl2=$_SESSION['tgl2'];
		$statusorder=$_SESSION['statusorder'];
		  
			       
	} else if ($_GET['action']=='search') { 
		
		$tgl1=$_POST['tgl1'];
	    $tgl2=$_POST['tgl2'];	
	    $statusorder=$_POST['statusorder'];

        $_SESSION['tgl1']=$_POST['tgl1'];
        $_SESSION['tgl2']=$_POST['tgl2'];
        $_SESSION['statusorder']=$_POST['statusorder'];
	    

	} else {
		$tgl1=date("Y-m-01");
		$tgl2=date("Y-m-d");
	}

	if($statusorder!=''){
		$filter_status="AND p.status='$statusorder'";
	} else {
		$filter_status="";
	}


 
	?>
	

	<div class="page-content">
		
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Order Paket</h2>
							<div class="subtitle">Welcome to Rabbani Order</div>
						</div>
					</div>
				</div>
			</header>
			<?php 
			  // include "paket_entry.php";
			   include "orders_approve.php"; 
			?>
			<section class="card">
				

				<div class="card-block">
					<form method="post" action="orders.php?action=search" id="form1">
					<div class="form-group row">

							    <div class="col-sm-1">
									<b class="pull-right">Status Order</b>
								</div>	
								<div class="col-sm-2">
									<p class="form-control-static">
										<?php 
										$sql="SELECT
												  id,
												  nama
												FROM pesan_status
												WHERE `status`=1";
										 $query=mysqli_query($link,$sql);  
											
										?>
										<select name="statusorder" id="statusorder" class="form-control">
											<option value="">-  All -</option>
											<?php 
											 while(list($id,$nama_status)=mysqli_fetch_array($query)){  
											    if($statusorder==$id){
											    	echo"<option value='$id' selected>$nama_status</option>";	
											    } else {
											    	echo"<option value='$id'>$nama_status</option>";
											    } 	 
											 	
											 }
											?>
										</select>
									</p>							
								</div>	
								<!-- <div class="col-sm-3">
									 <a href="#" data-toggle="modal" data-target="#modalEntry"><button class="btn btn-success" onclick="reset_input()">Show</button></a>
								</div> -->
								<!-- <input type="submit" id="submit" style="display: none;"> -->
								<div class="col-sm-2">
									<p class="form-control-static">
									<input type="text" name="tgl1" id="tgl1" class="form-control tanggal flatpickr" value="<?php echo $tgl1?>"> 
									</p>
								</div>
								<div class="col-sm-1 text-center">
									 <b>sampai</b>
								</div>
								<div class="col-sm-2 pull-left">
									<p class="form-control-static">
									<input type="text" name="tgl2" id="tgl2" class="form-control tanggal flatpickr" value="<?php echo $tgl2?>">
									</p>
								</div>	
								<div class="col-sm-2">
										<p class="pull-left"><input type="submit" id="submit" value="Lihat" 
										 class="btn btn-danger col-12"></p>
								</div>	
								<div class="col-sm-success">
										<p class="pull-right"><input type="button"  value="Export Excel" 
										 class="btn btn-success col-12" onclick="export_exel()"></p>
								</div>	
						</div>
					</form>	
					<p>&nbsp;	</p>	
					<?php 
					$sql="SELECT
						    p.no_transaksi
						    , p.id_customer
						    , m.nama
						    , p.tanggal
						    , p.jmlproduk
						    , p.biaya_seluruh
						    , p.kode_unik
						    , p.amount
						    , ps.nama
						    , ps.keterangan
						    , p.approve_date
						    , p.approve_by
						FROM
						    pesan AS p
						    INNER JOIN member AS m 
						        ON (p.id_customer = m.username)
						    INNER JOIN pesan_status AS ps
						        ON (p.status = ps.id)  
						    WHERE p.tanggal BETWEEN '$tgl1 00:00:00' and  '$tgl2 23:59:59'  $filter_status ORDER BY p.tanggal DESC";
                    $query=mysqli_query($link,$sql);     
					?>
					<table id="example" class="display table table-striped table-bordered text-nowrap" cellspacing="0" width="100%" style="font-size:16px !important;">
						<thead>
						<tr>
							<th>No</th>
							<th >No order</th>
							<th>Customer</th>
							
							<th>Jml paket</th>
							<th>Tot.harga</th>
							<th>Tot.Transfer</th>
							<th style="width:400px;">Detail Paket</th>
							
							
							<th>Status</th>
							<th>Approve</th>
							<th>Tgl approve</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no=0;
						while(list($no_transaksi,$id_customer,$nama_customer,$tanggal,$jmlproduk,$biaya_seluruh,$kode_unik,$amount,
							 $status_order,$keterangan,$approve_date,$approve_by)=mysqli_fetch_array($query)){

							$total_transfer=$biaya_seluruh+$kode_unik;

							if($approve_date=='0000-00-00 00:00:00'){
								$approve_date_fix="-";
							} else {
								$approve_date_fix=$approve_date;
							}
							$no++;
							
							$detail="SELECT
							            pd.id_paket
									    , po.nama_paket
									    , pd.qty
									    , pd.harga
									    , pd.amount
									    , pd.disc
									    , po.kode_model
									FROM
									    pesan_detail AS pd
									    INNER JOIN paket_order AS po 
									        ON (pd.id_paket = po.id) where no_transaksi='$no_transaksi'";
							 $qdetail=mysqli_query($link,$detail);     		        
						?>
						<tr>
							<td class="align-top"><?php echo $no;?></td>
							<td class="align-top"><span class="label label-info"><b><?php echo $no_transaksi;?></b></span><br>
							    <i style="font-size: 14px;"><?php echo $tanggal;?></i></td>
							<td>
								<b>ID : </b>&nbsp;<?php echo $id_customer;?><br>
								<b>Nama :</b>&nbsp;<?php echo $nama_customer;?><br>
								<b>No hp :</b>&nbsp;<br>
								<b>Type :</b>&nbsp; Biro
							</td>
							
							<td class="align-top"><?php echo $jmlproduk;?></td>
							<td class="align-top"><?php echo number_format($biaya_seluruh);?></td>
							<td class="align-top"><?php echo number_format($total_transfer);?></td>
							<td class="align-top">
								<?php 
								while(list($id_paket,$nama_paket,$qty_paket,$harga_paket,$amount,$disc,$kode_model)=mysqli_fetch_array($qdetail)){
									$disc_value=($disc/100)*$harga_paket;
									$amount_nett=$harga_paket-$disc_value;
									//echo $disc;
									?>
									<p><a href="paket_detail.php?idpaket=<?php echo $id_paket?>" target="_blank"><span class="label label-primary"><?php echo $nama_paket?></span></a>&nbsp;
									<span class="label label-success"><?php echo $qty_paket?></span>&nbsp;
									<span class="label label-warning"><?php echo number_format($amount_nett);?></span></p>
								<?php }
								?>
							</td>
							
							
							<td class="align-top"><?php echo $status_order;?></td>
							<td class="align-top"><?php echo $approve_by;?></td>
							<td class="align-top"><?php echo $approve_date_fix;?></td>
							
							<td class="align-top">
								<!--  data-id="<?php echo $id;?>" -->
								<a href="#" data-toggle="modal" data-target="#modalApprove"  data-id="<?php echo $no_transaksi;?>"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php 
						   $grand_qty_total+=$jmlproduk;
						   $grand_harga_total+=$biaya_seluruh;
						   $grand_transfer_total+=$total_transfer;
						}
						?>
						</tbody>
						<tfoot>
						<tr>
							<th colspan="3"></th>
							<th><?php echo number_format($grand_qty_total);?></th>
							<th><?php echo number_format($grand_harga_total);?></th>
							<th><?php echo number_format($grand_transfer_total);?></th>
							<th colspan="6"></th>
						</tr>
						</tfoot>
					</table>
				</div>
			</section>
		
	</div><!--.page-content-->
	<?php include"footer.php";?>
	<script type="text/javascript" src="js/lib/flatpickr/flatpickr.min.js"></script> 
	<script type="text/javascript">
        $(document).ready(function(){
	        $('#modalApprove').on('show.bs.modal', function (e) {
				var idx = $(e.relatedTarget).data('id');
				//alert(idx);	
	            $.ajax({
	                type : 'POST',
	                url :  'orders_approve_fletch.php',
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

		function export_exel(){
						//alert('oks');
								$('#form1').attr('action','orders_export.php');
							    // $('#form1').attr('target','_blank');
							    $('#submit').click();
							    $('#form1').attr('action','orders.php?action=search');
								
					}


	</script>	

	</body>
</html>