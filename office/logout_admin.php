<?php
  ob_start();
  session_start();
  session_destroy();
  
// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

 header('location:login_admin.php');
?>
