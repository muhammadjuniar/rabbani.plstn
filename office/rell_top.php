<?php session_start();
if ($_SESSION['namauseradmin']=='') {
    	echo "<script>window.location.href='login_admin.php'</script>";
}  

?>    

    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Halaman Admin pengelolaan Order</title>


<!-- <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon"> -->

	
	<link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
	<link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
	<link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" href="css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">