<?php session_start();
error_reporting(0);
include "connect.php";
include "excel_reader2.php";
include "RestData.php";

$RestData=new RestData();

$jenis=$_POST['jenis'];
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
$fullpathWarna = "https://rabbani.co.id/warna/".$namafileWarna;

$server_path="https://rabbani.co.id/product/";

$local_dir = "../temp/";

// images

$is_develop = 1; // ubah menjadi 0 untuk production 

// tambah produk

if($jenis=='produk_entry'){

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
        
        // unlink($uploadfile);
        if (trim($kirim_data)=='berhasil')
        {
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
        
        // unlink($uploadfile2);
        if (trim($kirim_data)=='berhasil')
        {
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
        
        // unlink($uploadfile3); 
        if (trim($kirim_data)=='berhasil')
        { 
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
      }
        else
      {
   		  $sql="INSERT INTO produk(id,nama_produk,kategori,foto,foto2,foto3,foto_type,foto_size,kode_model,deskripsi,qty_total,harga_total,
          `start`,`end`,is_send,is_batal,`repeat`,created_at,created_by,`status`)
          VALUES ('$kode_model','$nama_produk','$category','$media_url','$media_url2','$media_url3','','','$kode_model','$deskripsi','$qty_total','$harga_total',
          '$mulai','$akhir','','','',now(),'admin','0')";
      }
        $query=mysqli_query($link,$sql);

        if($query){
        	echo"berhasil";
        	header("location:produk_v2.php");	
        }
   //echo"$id_paket";
      }else {
    echo"gagal upload";
}
 
// edit produk

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
	  $query=mysqli_query($link,$sql);

    $fileName = $_FILES['foto']['tmp_name'];
    $fileName2 = $_FILES['foto2']['tmp_name'];
    $fileName3 = $_FILES['foto3']['tmp_name'];
	  
  if ($fileName != '') {

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
        
        // unlink($uploadfile);
        if (trim($kirim_data)=='berhasil')
        {
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
        $data2 = file_get_contents($uploadfile2);
        //encode ke base64
        $namafileb642    = base64_encode($data2);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim2 = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb642,
                        'namafile' => $namafile2 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data2=$RestData->insert_b64_foto_produk_rpos($datakirim2);
        //print_r($kirim_data); die();  
        
        // unlink($uploadfile2); 
        if (trim($kirim_data2)=='berhasil')
        {
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
        $data3 = file_get_contents($uploadfile3);
        //encode ke base64
        $namafileb643    = base64_encode($data3);
        
        //echo $namafileb64;
        //tampung hasil encode file_get_content, beserta nama file nya ke array 
        $datakirim3 = array('j' => 'insert_b64_foto_produk',
                        'kirimfile' => $namafileb643,
                        'namafile' => $namafile3 );
        //print_r($datakirim); die();    
        //kirim data array ke api
        $kirim_data3=$RestData->insert_b64_foto_produk_rpos($datakirim3);
        //print_r($kirim_data); die();  

        // unlink($uploadfile3);
        if (trim($kirim_data3)=='berhasil')
        {
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
    
	  if($query){
        header("location:produk_v2.php");	
    }else{
      echo "update gagal";
    }	

} else if($jenis=='produk_detail_entry'){

	$sql="INSERT INTO produk_detail (id_produk,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto)
          VALUES ('$temp_id_paket','$barcode','$nama_produk','$ukuran','$warna','$disc_conf','$qty','$harga','','$harga')";
    $query=mysqli_query($link,$sql) or die ('error entry produk detail');   

    if($query){
        echo"berhasil";
        header("location:paket_detail.php?idproduk=".$temp_id_paket);	
    }		   

} 

else if($jenis=='produk_detail_edit'){

	$sql="UPDATE produk_detail
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
        echo"berhasil";
        header("location:produk_detail_v2.php?idproduk=".$temp_id_paket);	
    }		   
} 

 else if($jenis=='produk_detail_entry_bulky'){

  $target = basename($_FILES['file_upload']['name']) ;
	move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
	
	// beri permisi agar file xls dapat di baca
	chmod($_FILES['file_upload']['name'],0777);
	
	// mengambil isi file xls
	$data = new Spreadsheet_Excel_Reader($_FILES['file_upload']['name'],false);
	// menghitung jumlah baris data yang ada
	$jumlah_baris = $data->rowcount($sheet_index=0);
	
	// jumlah default data yang berhasil di import
	$berhasil = 0;
	for ($i=2; $i<=$jumlah_baris; $i++){
	
		// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
		$produk_barcode   = $data->val($i, 1);
		$produk_name      = $data->val($i, 2);
		$produk_qty       = $data->val($i, 3);
		$produk_harga     = $data->val($i, 4);
    $produk_ukuran=substr($produk_barcode,7,2);
    $produk_warna=substr($produk_barcode,12,3);
	
		if($produk_barcode != "" && $produk_name != "" && $produk_qty != "" && $produk_harga != ""){
			// input data ke database (table wha_group_lokasi_detail)
			$sql = ("INSERT INTO produk_detail (id_produk,barcode,nama_produk,ukuran,warna,disc_conf,qty,harga,diskon,netto) 
			VALUES
			('$temp_id_paket', '$produk_barcode', '$produk_name', '$produk_ukuran', '$produk_warna', '$disc_conf', '$produk_qty','$produk_harga','','$produk_harga')");

			$query=mysqli_query($link,$sql) or die ('Insert data gagal');
			$berhasil++;
		}
	}
	
	// hapus kembali file .xls yang di upload tadi
	// unlink($_FILES['file_upload']['name']);
     
   
  if($query){
        echo"berhasil";
        header("location:produk_detail_v2.php?idproduk=".$temp_id_paket);
  }   


}  else if($jenis=='produk_gambar_entry'){

  $fileName = $_FILES['foto']['tmp_name'];
  $fileName2 = $_FILES['foto2']['tmp_name'];
  $fileName3 = $_FILES['foto3']['tmp_name'];
  $temp_kode_warna = $_POST['temp_kode_warna'];

if ($fileName != '') {

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
      
      // unlink($uploadfile);
      if (trim($kirim_data)=='berhasil')
      {
        $media_url=$fullpath;
      }	
  } else {
    $media_url="";
  }
  
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
      
      // unlink($uploadfile2);
      if (trim($kirim_data)=='berhasil')
      {
        $media_url2=$fullpath2;
      }	
  } else {
    $media_url2="";
  }
  
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
      
      // unlink($uploadfile3); 
      if (trim($kirim_data)=='berhasil')
      { 
        $media_url3=$fullpath3;
      }	
  } else {
    $media_url3="";
  }

}

  if($kirimToLocal || $kirimToLocal2 || $kirimToLocal3) {
  if($is_develop == 1){
        $sql="INSERT INTO produk_warna_dev(id,kode_warna,gambar1,gambar2,gambar3)
        VALUES ('$temp_id_paket','$temp_kode_warna','$fullpath','$fullpath2','$fullpath3')";
    }
      else
    {
        $sql="INSERT INTO produk_warna(id,kode_warna,gambar1,gambar2,gambar3)
        VALUES ('$temp_id_paket','$temp_kode_warna','$media_url','$media_url2','$media_url3')";
    }
      $query=mysqli_query($link,$sql);

      if($query){
        echo"berhasil";
        header("location:produk_gambar_per_warna.php?idproduk=$temp_id_paket&kode=$temp_kode_warna");	
      }
 //echo"$id_paket";
    }else {
  echo "gagal upload";
}

// edit produk

} else if($jenis=='produk_gambar_per_warna_edit'){

  $fileName = $_FILES['foto']['tmp_name'];
  $fileName2 = $_FILES['foto2']['tmp_name'];
  $fileName3 = $_FILES['foto3']['tmp_name'];
  $temp_kode_warna = $_POST['temp_kode_warna'];
  
if ($fileName != '') {

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
      
      // unlink($uploadfile);
      if (trim($kirim_data)=='berhasil')
      {
        $media_url=$fullpath;
      }	
  } else {
    $media_url="";
  }
  
  if($is_develop == 1){

    $up="UPDATE produk_warna_dev
        SET 
          gambar1 = '$fullpath'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
        ";
    }else{
    $up="UPDATE produk
        SET 
          gambar1 = '$media_url'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
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
      $data2 = file_get_contents($uploadfile2);
      //encode ke base64
      $namafileb642    = base64_encode($data2);
      
      //echo $namafileb64;
      //tampung hasil encode file_get_content, beserta nama file nya ke array 
      $datakirim2 = array('j' => 'insert_b64_foto_produk',
                      'kirimfile' => $namafileb642,
                      'namafile' => $namafile2 );
      //print_r($datakirim); die();    
      //kirim data array ke api
      $kirim_data2=$RestData->insert_b64_foto_produk_rpos($datakirim2);
      //print_r($kirim_data); die();  
      
      // unlink($uploadfile2); 
      if (trim($kirim_data2)=='berhasil')
      {
        $media_url2=$fullpath2;
      }	
  } else {
    $media_url2="";
  }
  
  if($is_develop == 1){

    $up="UPDATE produk_warna_dev
        SET 
          gambar2 = '$fullpath2'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
        ";
    }else{
    $up="UPDATE produk
        SET 
          gambar2 = '$media_url2'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
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
      $data3 = file_get_contents($uploadfile3);
      //encode ke base64
      $namafileb643    = base64_encode($data3);
      
      //echo $namafileb64;
      //tampung hasil encode file_get_content, beserta nama file nya ke array 
      $datakirim3 = array('j' => 'insert_b64_foto_produk',
                      'kirimfile' => $namafileb643,
                      'namafile' => $namafile3 );
      //print_r($datakirim); die();    
      //kirim data array ke api
      $kirim_data3=$RestData->insert_b64_foto_produk_rpos($datakirim3);
      //print_r($kirim_data); die();  

      // unlink($uploadfile3);
      if (trim($kirim_data3)=='berhasil')
      {
        $media_url3=$fullpath3;
      }	
  } else {
    $media_url3="";
  }
  
  if($is_develop == 1){

    $up="UPDATE produk_warna_dev
        SET 
          gambar3 = '$fullpath3'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
        ";
    }else{
    $up="UPDATE produk
        SET 
          gambar3 = '$media_url3'
        WHERE id = '$temp_id_paket' AND kode_warna = '$temp_kode_warna'
        ";
      }  
  $qup=mysqli_query($link,$up) or die (mysqli_error($link));
}
  
  header("location:produk_gambar_per_warna.php?idproduk=$temp_id_paket&kode=$temp_kode_warna");		

}else if($jenis=='produk_warna_entry'){

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


} else if($jenis == 'produk_warna_entry_bulk'){

  require_once 'component/PHPExcel/PHPExcel/Reader/Excel5.php';

  $fileUpload = $_FILES['file_upload']['name'];
  $objReader = new PHPExcel_Reader_Excel5($fileUpload);
  $data = $objReader->load($_FILES['file_upload']['tmp_name']);
  $objData = $data->getActiveSheet();
  $dataArray =$objData->toArray();

  for ($i=1; $i < count($dataArray); $i++) {
    $count = count($dataArray);
    $objData = $data->getActiveSheet();
    $gambar = array();
    foreach ($objData->getDrawingCollection() as $gmbr) {
      $string = $gmbr->getCoordinates();
      $coord = PHPExcel_Cell::coordinateFromString($string);
      $image = $gmbr->getImageResource();
      $img = $gmbr->getIndexedFilename();
      $fullpath = "../assets/images/warna/$img";
      imagejpeg($image, '../assets/images/warna/'. $img);
      $gambar[] = $fullpath;
    }
    
  }
  for ($j=0; $j < count($dataArray)-1; $j++){
    
    $kode = $dataArray[$j + 1]['0'];
    $warna = $dataArray[$j + 1]['1'];
    $warna_english = $dataArray[$j + 1]['2'];
    $sql = $link->query("INSERT INTO warna (kode_warna,warna,warna_english,images) VALUES('$kode','$warna','$warna_english','$gambar[$j]')");

  }
  if($sql) {
    header("location:paket_warna.php?alert=sukses");	
  }

}  else if($jenis == 'produk_warna_edit_bulk'){

  require_once 'component/PHPExcel/PHPExcel/Reader/Excel5.php';
  
  $fileUpload = $_FILES['file_upload']['name'];
  $objReader = new PHPExcel_Reader_Excel5($fileUpload);
  $data = $objReader->load($_FILES['file_upload']['tmp_name']);
  $objData = $data->getActiveSheet();
  $dataArray =$objData->toArray();

  for ($i=1; $i < count($dataArray); $i++) {
    $count = count($dataArray);
    $objData = $data->getActiveSheet();
    $gambar = array();
    foreach ($objData->getDrawingCollection() as $gmbr) {
      $string = $gmbr->getCoordinates();
      $coord = PHPExcel_Cell::coordinateFromString($string);
      $image = $gmbr->getImageResource();
      $img = $gmbr->getIndexedFilename();
      $fullpath = "../assets/images/warna/$img";
      // imagejpeg($image, '../assets/images/warna/'. $img);
      $gambar[] = $fullpath;
    }
    // $kode = $dataArray[$i]['0'];
    // $sql = $link->query("UPDATE warna SET images = '$fullpath' WHERE kode_warna = '$kode'");
  }
  
  for ($j=0; $j < count($dataArray)-1; $j++){
    $kode = $dataArray[$j + 1]['0'];
    echo $kode;
    // echo "UPDATE warna SET images = $gambar[$j] WHERE kode_warna = $kode <br />";
    // $sql = $link->query("UPDATE warna SET images = '$gambar[$j]' WHERE kode_warna = '$kode'");
  }
  if($sql) {
    header("location:paket_warna.php?alert=sukses");	
  }

} else if($jenis=='produk_warna_edit'){

 $sql="UPDATE warna
     SET 
       kode_warna = '$kode_warna',
       warna = '$warna_indonesia',
       warna_english = '$warna_english'
     WHERE kode_warna = '$kode_warna'";
 $query=mysqli_query($link,$sql);

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

} else if($jenis=='produk_warna_edit_image') {
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
  
    header("location:paket_warna.php?alert=sukses");	

} else if($jenis=='produk_warna_edit_image_v2'){

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

  if($is_develop == 1) {
    $up="UPDATE warna
      SET 
        images = '$fullpathWarna'
      WHERE kode_warna = '$kode_warna'";
  }else{
    $up="UPDATE warna
      SET 
        images = '$media_url'
      WHERE kode_warna = '$kode_warna'";
  }
  $qup=mysqli_query($link,$up) or die (mysqli_error());
  //echo $up; die();
  
  //  hapus lokal image
  // unlink($uploadfile);
  if($qup){
    header("location:paket_warna.php?alert=sukses");	
  }

}  	

?>