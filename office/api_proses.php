<?php session_start();
include"connect.php";

$jenis=$_POST['jenis'];
$nama_paket=$_POST['nama_paket'];
$kode_model=$_POST['kode_model'];
$deskripsi=$_POST['deskripsi'];
$qty_total=$_POST['qty_total'];
$harga_total=$_POST['harga_total'];
$mulai=$_POST['mulai'];
$akhir=$_POST['akhir'];
$temp_id=$_POST['temp_id'];
$status=$_POST['status'];

$barcode=$_POST['barcode'];

$ukuran=substr($barcode,7,2);
$warna=substr($barcode,12,3);
$nama_produk=$_POST['nama_produk'];
$disc_conf=$_POST['disc_conf'];
$qty=$_POST['qty'];
$diskon=$_POST['diskon'];
$harga=$_POST['harga'];
$harga=str_replace(",","",$harga);
$temp_id_paket=$_POST['temp_id_paket'];
$temp_barcode=$_POST['temp_barcode'];

$username= $_SESSION['namauseradmin']  ;

if($jenis=='paket_entry'){

   $depan="P";
   $tanggalnow=date('ymd');

   $format_tgl=str_replace("-","",$tanggalnow);
   $subtrans=$depan.$format_tgl;

   $sql="SELECT COUNT(id)+1 as kode from paket_order where id like '%$subtrans%' limit 1";
   $query=mysqli_query($link,$sql);  
   list($kode)=mysqli_fetch_array($query);

   $no_counter=$kode;
   if($no_counter<10){
			$nol="00";
   } else if($no_counter<100){
			$nol="0";
   } else if($no_counter<1000) {
			$nol="";
   }

   $id_paket=$depan.$format_tgl.$nol.$no_counter;

   $time=date('YmdHis');

   $fileName  		= $_FILES['foto']['name'];
   $ext       		= pathinfo($fileName, PATHINFO_EXTENSION); // new
   $fileName  		= preg_replace("/[^0-9]/", "", $fileName); // new
   $format    		= strstr($fileName,"."); // new
   $namafile  		= "paket_".$id_paket."_".$time.".".$ext; //new

   $uploaddir_banner ="../product/";
   $uploadfile = $uploaddir_banner . $namafile;
   $file_tmp = $_FILES['foto']['tmp_name'];
   $uploadfoto=move_uploaded_file($file_tmp,$uploadfile);

   $url_file_db="product/".$namafile;

   if($uploadfoto){
   		 $sql="INSERT INTO paket_order(id,nama_paket,foto,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,
         `start`,`end`,is_send,is_batal,`repeat`,created_at,created_by,`status`)
         VALUES ('$id_paket','$nama_paket','$url_file_db','','','$kode_model','$deskripsi','$qty_total','$harga_total',
        '$mulai','$akhir','','','',now(),'admin','0')";

        $query=mysqli_query($link,$sql)  or die ('error entry data');

        if($query){
        	echo"berhasil";
        	header("location:paket.php");	
        }
   } else {
   	   echo"gagal upload foto paket";
   }
   //echo"$id_paket";
 

} else if($jenis=='paket_edit'){

	$sql="UPDATE paket_order
			SET 
			  nama_paket = '$nama_paket',
			  kode_model = '$kode_model',
			  deskripsi = '$deskripsi',
			  qty_total = '$qty_total',
			  harga_total = '$harga_total',
			  `start` = '$mulai',
			  `end` = '$akhir',
			  updateby = 'admin',
			  updatedate = NOW(),
			  `status` = '$status'
			WHERE id = '$temp_id'";
	$query=mysqli_query($link,$sql) or die ('error update data');

	$fileName  		= $_FILES['foto']['name'];

	if($fileName!=''){
	   //echo $fileName; die();	
	   $time=date('YmdHis');
	   $ext       		= pathinfo($fileName, PATHINFO_EXTENSION); // new
	   $fileName  		= preg_replace("/[^0-9]/", "", $fileName); // new
	   $format    		= strstr($fileName,"."); // new
	   $namafile  		= "paket_".$temp_id."_".$time.".".$ext; //new

	   $uploaddir_banner ="../product/";
	   $uploadfile = $uploaddir_banner . $namafile;
	   $file_tmp = $_FILES['foto']['tmp_name'];
	   $uploadfoto=move_uploaded_file($file_tmp,$uploadfile);

	   $url_file_db="product/".$namafile;


		$up="UPDATE paket_order
				SET 
				  foto = '$url_file_db',
				  foto_type = '',
				  foto_size = ''
				WHERE id = '$temp_id'";
		$qup=mysqli_query($link,$up) or die ('error update foto');
		//echo $up; die();
	}  		
	 
	if($query){
        echo"berhasil";
        header("location:paket.php");	
    }		


} else if($jenis=='paket_detail_entry'){

	$sql="INSERT INTO paket_order_detail (id_paket,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto)
          VALUES ('$temp_id_paket','$barcode','$nama_produk','$ukuran','$warna','$disc_conf','$qty','$harga','','$harga')";
    $query=mysqli_query($link,$sql) or die ('error entry paket detail');   

    if($query){
        echo"berhasil";
        header("location:paket_detail.php?idpaket=".$temp_id_paket);	
    }		   
} else if($jenis=='paket_detail_edit'){

	$sql="UPDATE paket_order_detail
			SET 
			  nama_produk = '$nama_produk',
			  ukuran = '$ukuran',
			  warna = '$warna',
			  disc_conf = '$disc_conf',
			  qty = '$qty',
			  harga = '$harga',
			  diskon = '$diskon',
			  netto = '$harga'
			WHERE id_paket = '$temp_id_paket'
			    AND barcode = '$temp_barcode'";
    $query=mysqli_query($link,$sql) or die ('error edit paket detail');   

    if($query){

    	$all="SELECT SUM(qty) as tot_qty, SUM(qty*harga-diskon) as tot_harga from paket_order_detail
    	      where id_paket='$temp_id_paket' ";

    	//echo $all; die();      
    	$query_all=mysqli_query($link,$all) or die ('error query total'); 
    	list($tot_qty,$tot_harga)=mysqli_fetch_array($query_all);

    	$up="UPDATE paket_order SET qty_total='$tot_qty', harga_total='$tot_harga' where id='$temp_id_paket'";
    	$query_up=mysqli_query($link,$up) or die ('error update query total');         

        echo"berhasil";
        header("location:paket_detail.php?idpaket=".$temp_id_paket);	
    }		   
} 

 else if($jenis=='approve_order'){

  $no_transaksi=$_POST['no_transaksi'];

  if($status=='3'){
     $sql="UPDATE pesan
      SET 
        `status` = '$status',approve_by='$username',approve_date=NOW()
      WHERE no_transaksi = '$no_transaksi'";

  } else {
      $sql="UPDATE pesan
      SET 
        `status` = '$status',approve_by='',approve_date=''
      WHERE no_transaksi = '$no_transaksi'";
  }

 
  $query=mysqli_query($link,$sql) or die ('error update data');

  $fileName     = $_FILES['foto']['name'];

  if($fileName!=''){
     //echo $fileName; die(); 
     $time=date('YmdHis');
     $ext           = pathinfo($fileName, PATHINFO_EXTENSION); // new
     $fileName      = preg_replace("/[^0-9]/", "", $fileName); // new
     $format        = strstr($fileName,"."); // new
     //$namafile      = "paket_".$temp_id."_".$time.".".$ext; //new
     $namafile      = $no_transaksi.".".$ext; //new

     $uploaddir_banner ="../assets/bukti_pembayaran/";
     $uploadfile = $uploaddir_banner . $namafile;
     $file_tmp = $_FILES['foto']['tmp_name'];
     $uploadfoto=move_uploaded_file($file_tmp,$uploadfile);

     $url_file_db="assets/bukti_pembayaran/".$namafile;
    
    $cek="SELECT id_pesan_bayar,biaya_seluruh,kode_unik FROM pesan where no_transaksi='$no_transaksi'";
    $qcek=mysqli_query($link,$cek);
    list($id_pesan_bayar,$biaya_seluruh,$kode_unik)=mysqli_fetch_array($qcek);
    $total_transfer=$biaya_seluruh+$kode_unik;

    $up="INSERT INTO pembayaran (id_pembayaran,no_transaksi,keterangan,bukti_transfer,kode_bank,total_transfer,tanggal_transfer)
         VALUES ('$id_pesan_bayar','$no_transaksi','','$url_file_db','','$total_transfer',NOW())";
    $qup=mysqli_query($link,$up) or die ('error update foto');
    //echo $up; die();
  }     
   
  if($query){
        echo"berhasil";
        header("location:orders.php"); 
  }   


} 

?>