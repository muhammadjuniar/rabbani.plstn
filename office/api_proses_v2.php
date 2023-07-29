<?php session_start();
include "connect.php";
include "RestData.php";

$RestData=new RestData();

$jenis=$_POST['jenis'];
$nama_paket=$_POST['nama_paket'];
$nama_produk=$_POST['nama_produk'];
$category=$_POST['category'];
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

$kode_warna=$_POST['kode_warna'];
$warna_indonesia=$_POST['warna'];
$warna_english=$_POST['warna_english'];
$images=$_POST['images'];

$date=date('YmdHis');
$utxt="IMGPRD";
$utxtwarna="IMGWRN";
$rand = rand(100000, 999999);
$rand2 = rand(100000, 999999);
$rand3 = rand(100000, 999999);

// images

$getextwarna = end(explode('.', $_FILES["images"]["name"])); // get upload file ext
$namafileWarna = $date . '' . $utxtwarna . '' . $rand . '.' . $getextwarna;
$fullpathWarna = "https://rabbani.co.id/warna/".$namafile;

$server_path="https://rabbani.co.id/product/";

// images

$is_develop = 1; // ubah menjadi 0 untuk production 

if($jenis=='produk_entry'){

    $local_dir = "temp/";

    $getext = end(explode('.', $_FILES["foto"]["name"])); // get upload file ext
    $namafile = $date . '' . $utxt . '' . $rand . '.' . $getext;
    $fullpath = "https://rabbani.co.id/product/".$namafile;

    $uploadfile = $local_dir . $namafile;
    $file_tmp = $_FILES['foto']['tmp_name'];
        
    $kirimToLocal=move_uploaded_file($file_tmp, $uploadfile);

    if($kirimToLocal){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile;
        $data = file_get_contents($uploadfile);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        {
          unlink($uploadfile);
          $media_url=$fullpath;
        }	
    } else {
      $media_url="";
    }
    
    $getext2 = end(explode('.', $_FILES["foto2"]["name"])); // get upload file ext
    $namafile2 = $date . '' . $utxt . '' . $rand2 . '.' . $getext2;
    $fullpath2 = "https://rabbani.co.id/product/".$namafile2;

    $uploadfile2 = $local_dir . $namafile2;
    $file_tmp2 = $_FILES['foto2']['tmp_name'];
        
    $kirimToLocal2=move_uploaded_file($file_tmp2, $uploadfile2);

    if($kirimToLocal2){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile2;
        $data = file_get_contents($uploadfile2);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile2 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        {
          unlink($uploadfile2);
          $media_url2=$fullpath2;
        }	
    } else {
      $media_url2="";
    }
    
    $getext3 = end(explode('.', $_FILES["foto3"]["name"])); // get upload file ext
    $namafile3 = $date . '' . $utxt . '' . $rand3 . '.' . $getext3;
    $fullpath3 = "https://rabbani.co.id/product/".$namafile3;

    $uploadfile3 = $local_dir . $namafile3;
    $file_tmp3 = $_FILES['foto3']['tmp_name'];
        
    $kirimToLocal3=move_uploaded_file($file_tmp3, $uploadfile3);

    if($kirimToLocal3){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile3;
        $data = file_get_contents($uploadfile3);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile3 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        { 
          unlink($uploadfile3);
          $media_url3=$fullpath3;
        }	
    } else {
      $media_url3="";
    }

    if($kirimToLocal || $kirimToLocal2 || $kirimToLocal3) {
    if($is_develop == 1){
   		//  $sql="INSERT INTO produk_dev(id,nama_produk,kategori,foto,foto2,foto3,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,
      //    `start`,`end`,is_send,is_batal,`repeat`,created_at,created_by,`status`)
      //    VALUES ('$kode_model','$nama_produk','$media_url','$media_url2','$media_url3','','','$kode_model','$deskripsi','$qty_total','$harga_total',
      //   '$mulai','$akhir','','','',now(),'admin','0')";
   		 $sql="INSERT INTO produk_dev(id,nama_produk,kategori,foto,foto2,foto3,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,
         `start`,`end`,is_send,is_batal,`repeat`,created_at,created_by,`status`)
         VALUES ('$kode_model','$nama_produk','$category','$fullpath','$fullpath2','$fullpath3','','','$kode_model','$deskripsi','$qty_total','$harga_total',
        '$mulai','$akhir','','','',now(),'admin','0')";
      }else{
   		 $sql="INSERT INTO produk(id,nama_produk,kategori,foto,foto2,foto3,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,
        `start`,`end`,is_send,is_batal,`repeat`,created_at,created_by,`status`)
        VALUES ('$kode_model','$nama_produk','$category','$media_url','$media_url2','$media_url3','','','$kode_model','$deskripsi','$qty_total','$harga_total',
       '$mulai','$akhir','','','',now(),'admin','0')";
      }
        $query=mysqli_query($link,$sql)  or die (mysqli_error($link));

        if($query){
        	echo"berhasil";
        	header("location:paket.php");	
        }
   //echo"$id_paket";
      }else {
    echo"gagal upload";
}
 

} else if($jenis=='produk_edit'){
  if($is_develop == 1) {
	$sql="UPDATE produk_dev
			SET 
        id = '$kode_model',
			  nama_produk = '$nama_produk',
			  kategori = '$category',
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
  }else{
	$sql="UPDATE produk
			SET 
        id = '$kode_model',
			  nama_produk = '$nama_produk',
			  kategori = '$category',
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
  }
	  $query=mysqli_query($link,$sql) or die ('error update data');

    $fileName = $_FILES['foto']['tmp_name'];
    $fileName2 = $_FILES['foto2']['tmp_name'];
    $fileName3 = $_FILES['foto3']['tmp_name'];
	  
  if ($fileName != '') {

    $local_dir = "temp/";

    $getext = end(explode('.', $_FILES["foto"]["name"])); // get upload file ext
    $namafile = $date . '' . $utxt . '' . $rand . '.' . $getext;
    $fullpath = "https://rabbani.co.id/product/".$namafile;

    $uploadfile = $local_dir . $namafile;
    $file_tmp = $_FILES['foto']['tmp_name'];
        
    $kirimToLocal=move_uploaded_file($file_tmp, $uploadfile);

    if($kirimToLocal){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile;
        $data = file_get_contents($uploadfile);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        {
          unlink($uploadfile);
          $media_url=$fullpath;
        }	
    } else {
      $media_url="";
    }
    
    if($is_develop == 1){

      $up="UPDATE produk_dev
          SET 
            foto = '$fullpath'
          WHERE id = '$temp_id'
          ";
      }else{
      $up="UPDATE produk
          SET 
            foto = '$media_url'
          WHERE id = '$temp_id'
          ";
        }  
    
		$qup=mysqli_query($link,$up) or die (mysqli_error($link));
  }
  
  if ($fileName2 != '') {
    $getext2 = end(explode('.', $_FILES["foto2"]["name"])); // get upload file ext
    $namafile2 = $date . '' . $utxt . '' . $rand2 . '.' . $getext2;
    $fullpath2 = "https://rabbani.co.id/product/".$namafile2;

    $uploadfile2 = $local_dir . $namafile2;
    $file_tmp2 = $_FILES['foto2']['tmp_name'];
        
    $kirimToLocal2=move_uploaded_file($file_tmp2, $uploadfile2);

    if($kirimToLocal2){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile2;
        $data = file_get_contents($uploadfile2);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile2 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        {
          unlink($uploadfile2);
          $media_url2=$fullpath2;
        }	
    } else {
      $media_url2="";
    }
    
    if($is_develop == 1){

      $up="UPDATE produk_dev
          SET 
            foto2 = '$fullpath2'
          WHERE id = '$temp_id'
          ";
      }else{
      $up="UPDATE produk
          SET 
            foto2 = '$media_url2'
          WHERE id = '$temp_id'
          ";
        }  
		$qup=mysqli_query($link,$up) or die (mysqli_error($link));
  }
  
  if ($fileName3 != '') {
    $getext3 = end(explode('.', $_FILES["foto3"]["name"])); // get upload file ext
    $namafile3 = $date . '' . $utxt . '' . $rand3 . '.' . $getext3;
    $fullpath3 = "https://rabbani.co.id/product/".$namafile3;

    $uploadfile3 = $local_dir . $namafile3;
    $file_tmp3 = $_FILES['foto3']['tmp_name'];
        
    $kirimToLocal3=move_uploaded_file($file_tmp3, $uploadfile3);

    if($kirimToLocal3){
      //ambil file image beserta path nya dari quantum    

        //echo"ok";
        $uploadfile3;
        $data = file_get_contents($uploadfile3);
        //encode ke base64
        $namafileb64    = base64_encode($data);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb64,
                        'namafile' => $namafile3 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
        //print_r($kirim_data); die();   
        if (trim($kirim_data)=='berhasil')
        {
          unlink($uploadfile3);
          $media_url3=$fullpath3;
        }	
    } else {
      $media_url3="";
    }
    
    if($is_develop == 1){

      $up="UPDATE produk_dev
          SET 
            foto3 = '$fullpath3'
          WHERE id = '$temp_id'
          ";
      }else{
      $up="UPDATE produk
          SET 
            foto3 = '$media_url3'
          WHERE id = '$temp_id'
          ";
        }  
		$qup=mysqli_query($link,$up) or die (mysqli_error($link));
  }
  
    // if($is_develop == 1){

		// $up="UPDATE produk_dev
		// 		SET 
		// 		  foto = '$uploadfile',
		// 		  foto2 = '$uploadfile2',
		// 		  foto3 = '$uploadfile3'
		// 		WHERE id = '$temp_id'
    //     ";
	  // }else{
		// $up="UPDATE produk
		// 		SET 
		// 		  foto = '$media_url',
		// 		  foto2 = '$media_url2',
		// 		  foto3 = '$media_url3'
		// 		WHERE id = '$temp_id'
    //     ";
    //   }  
		// $qup=mysqli_query($link,$up) or die (mysqli_error($link));
		//echo $up; die();		
	 	
	if($query){
        header("location:paket.php?message=sukses");	
    }else{
      echo "update gagal";
    }	

} else if($jenis=='paket_detail_entry'){

	$sql="INSERT INTO paket_detail (id_produk,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto)
          VALUES ('$temp_id_paket','$barcode','$nama_produk','$ukuran','$warna','$disc_conf','$qty','$harga','','$harga')";
    $query=mysqli_query($link,$sql) or die ('error entry produk detail');   

    if($query){
        echo"berhasil";
        header("location:paket_detail.php?idproduk=".$temp_id_paket);	
    }		   
} else if($jenis=='paket_detail_edit'){

	$sql="UPDATE paket_detail
			SET 
			  nama_produk = '$nama_produk',
			  ukuran = '$ukuran',
			  warna = '$warna',
			  disc_conf = '$disc_conf',
			  qty = '$qty',
			  harga = '$harga',
			  diskon = '$diskon',
			  netto = '$harga'
			WHERE id_produk = '$temp_id_paket'
			    AND barcode = '$temp_barcode'";
    $query=mysqli_query($link,$sql) or die ('error edit produk detail');   

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


} if($jenis=='produk_warna_entry'){

  $fileName = $_FILES['images']['name'];

  $uploaddir ="../assets/images/warna/";
  $uploadfile = $uploaddir.$fileName;
  $file_tmp = $_FILES['images']['tmp_name'];
  $uploadfoto=move_uploaded_file($file_tmp,$uploadfile);

  $url_file_db="../assets/images/warna/".$fileName;

  if($uploadfoto){
       $sql="INSERT INTO warna(kode_warna, warna, warna_english, images)
        VALUES ('$kode_warna','$warna_indonesia','$warna_english','$url_file_db')";

       $query=mysqli_query($link,$sql)  or die ('error entry data');

       if($query){
         header("location:paket_warna.php?alert=sukses");	
       }
  } else {
       echo"gagal upload";
  }
  //echo"$id_paket";


} else if($jenis=='produk_warna_edit'){

 $sql="UPDATE warna
     SET 
       kode_warna = '$kode_warna',
       warna = '$warna_indonesia',
       warna_english = '$warna_english'
     WHERE kode_warna = '$kode_warna'";
 $query=mysqli_query($link,$sql) or die ('error update data');

 $fileName  		= $_FILES['images']['name'];

 if($fileName!=''){
    
    $uploaddir ="../assets/images/warna/";
    $uploadfile = $uploaddir.$fileName;
    $file_tmp = $_FILES['images']['tmp_name'];
    $uploadfoto=move_uploaded_file($file_tmp,$uploadfile);

    $url_file_db="../assets/images/warna/".$fileName;

   $up="UPDATE warna
       SET 
         images = '$url_file_db'
       WHERE kode_warna = '$kode_warna'";
   $qup=mysqli_query($link,$up) or die ('error update foto');
   //echo $up; die();
 }  		
  
 if($query){
       echo"berhasil";
       header("location:paket_warna.php?alert=sukses");	
   }		

} else if($jenis=='produk_warna_edit_image'){

  $local_dir = "temp/";

  $uploadfileWarna = $local_dir . $namafileWarna;
	$file_tmp_warna = $_FILES['images']['tmp_name'];
			
	$kirimToLocalWarna=move_uploaded_file($file_tmp_warna, $uploadfileWarna);

  if($kirimToLocalWarna){
    //ambil file image beserta path nya dari quantum    

      //echo"ok";
      $uploadfileWarna;
      $data = file_get_contents($uploadfileWarna);
      //encode ke base64
      $namafileb64    = base64_encode($data);
      
      //echo $namafileb64;
      //tampung hasil encode file_get_content, beserta nama file nya ke array 
      $datakirim = array('j' => 'insert_b64_foto_produk',
                      'kirimfile' => $namafileb64,
                      'namafile' => $namafileWarna );
      //print_r($datakirim); die();    
      //kirim data array ke api
      $kirim_data=$RestData->insert_b64_foto_produk_rpos($datakirim);
      //print_r($kirim_data); die();   
      if (trim($kirim_data)=='berhasil')
      {
        $media_url=$fullpathWarna;
      }	
  } else {
    $media_url="";
  }

  $up="UPDATE warna
      SET 
        images = '$media_url'
      WHERE kode_warna = '$kode_warna'";
  $qup=mysqli_query($link,$up) or die (mysqli_error());
  //echo $up; die();
  
  //  hapus lokal image
  unlink($uploadfile);
  if($qup){
    header("location:paket_warna.php?alert=sukses");	
  }

}  	

?>