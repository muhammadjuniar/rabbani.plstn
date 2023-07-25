<?php   session_start();
include"connect.php";

$tgl1=$_POST['tgl1'];
$tgl2=$_POST['tgl2'];	
$statusorder=$_POST['statusorder'];


$sql = "SELECT
    p.no_transaksi
    , p.id_customer
    , m.nama
    , pd.qty
    , po.nama_paket
    , pd.amount
    , pd.disc
    , p.tanggal
    , ps.nama
    , p.approve_by
    , p.approve_date
FROM
    pesan AS p
    INNER JOIN pesan_detail AS pd 
        ON (p.no_transaksi = pd.no_transaksi)
    INNER JOIN paket_order as po on (po.id=pd.id_paket)    
    INNER JOIN member AS m
        ON (p.id_customer = m.username)
    INNER JOIN pesan_status AS ps
        ON (p.status = ps.id) 
     WHERE p.tanggal BETWEEN '$tgl1 00:00:00' and  '$tgl2 23:59:59'  $filter_status ORDER BY p.tanggal DESC";
$query = mysqli_query($link,$sql) or die('Data Tidak di Temukan');


//echo "testing : ".$kode_sub."-".$nama_sub."-".$tgl1."-".$tgl2; 
$datetime=date('YmdHis');
$data="No,No transaksi,Tanggal,Id Customer,Nama,Jumlah paket,Nama Paket,Total harga,diskon,status order,approveby,approve date\r"; 

$no=0;
while (list($no_transaksi,$id_customer,$nama,$qty,$nama_paket,$amount,$disc,$tanggal,$statusorder,$approveby,$approvedate)
   =mysqli_fetch_array($query)) {
   $no++;										

  
   $data.="$no,$no_transaksi,$tanggal,$id_customer,$nama,$qty,$nama_paket,$amount,$disc,$statusorder,$approveby,$approvedate \r";
   
 }		
 


 					
$judul="report_jurnal";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=rekap_order_".$datetime.".csv"); 
header("Pragma: no-cache");
header("Expires: 0");
//echo $nama_sub;
print "$data";  
?>