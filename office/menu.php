<?php 
$c="SELECT count(no_transaksi) from pesan where `status`=0";
$qc=mysqli_query($link,$c);
list($tot_order_blm_approve)=mysqli_fetch_array($qc);     
?>
<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
	          	<a href="index.php">
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Dashboard</span>
	          	</a>
	           
	        </li>
	        <li class="blue with-sub">
	            <a href="user_account.php">
	                <i class="font-icon font-icon-user"></i>
	                <span class="lbl">User Accounts</span>
	            </a> 
	        </li>
	       <!--  <li class="red">
	            <a href="customers.php" class="label-right">
	                <i class="font-icon font-icon-contacts"></i>
	                <span class="lbl">Customers</span>
	                <!-- <span class="label label-custom label-pill label-danger">35</span> 
	            </a> 
	        </li>  -->
	        <li class="green with-sub">
	            <span>
	                <i class="font-icon font-icon-widget"></i>
	                <span class="lbl">Kelola Produk</span>
	            </span>
	            <ul>
	                <li><a href="paket.php"><span class="lbl">Produk</span></a></li>
	                <li><a href="paket_warna.php"><span class="lbl">Warna</span></a></li>
	                <li><a href="produk_v2.php"><span class="lbl">Produk V2</span></a></li>
	                
	            </ul>
	        </li>
	        <!-- <li class="gold">
	            <a href="orders.php">
	                <i class="font-icon font-icon-case-2"></i>
	                <span class="lbl">Orders</span>
	                 <span class="label label-custom label-pill label-danger"><?php echo $tot_order_blm_approve;?></span>
	            </a>
	        </li> -->
	        <!-- <li class="magenta with-sub">
	            <span>
	                <span class="glyphicon glyphicon-list-alt"></span>
	                <span class="lbl">Report</span>
	            </span>
	            <ul>
	                <a href="datatables-net.html"><span class="lbl">Datatables.net</span></a></li>
	                <a href="bootstrap-datatables.html"><span class="lbl">Bootstrap Table</span></a></li>
	
	               
	            </ul>
	        </li> -->
	        
	    </ul>
	
	  
	</nav>