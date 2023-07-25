<?php session_start();

include("connect.php");

$username=$_POST['username'];
$password=$_POST['pass'];

// echo"OK $username  $password"; die();
$date=date('Y-m-d');
$sql="SELECT
    `ur`.`username`
    , `ur`.`password`
    , `ur`.`nama`
    , `ur`.`level`
FROM
    `user` AS `ur` 
        WHERE ur.username='$username' AND ur.password='$password' and ur.status=1"; 

//echo $sql; die();
// $sql="SELECT username,password,level_id,nama,id_outlet FROM user WHERE username='$username' AND password='$password' AND status=1";
// $query=mysqli_query($connect,$sql) ;//or die ($sql);
// list($usercek,$password,$levelcek,$namauser,$otl)=mysqli_fetch_array($query);
$query=mysqli_query($link,$sql) ;//or die ($sql);
// list($usercek,$password,$levelcek,$namauser,$namatoko,$id_alias, $end_date)=mysqli_fetch_array($query);
list($usercek,$password,$uname,$level)=mysqli_fetch_array($query);
if (($usercek<>'') and ($password<>'')) {
    //echo"$usercek-$password-$uname-$level";
    $_SESSION['namauseradmin']     = $usercek;
    $_SESSION['passuseradmin']     = $password;
    $_SESSION['namamember']  = $uname;
    $_SESSION['leveluser']   =$level;
    // setcookie('usbn', $usercek, strtotime('+5 year'), '/');
    // setcookie('unmm', $uname, strtotime('+5 year'), '/');
    //echo"index.php";
    echo"berhasil";
} else {
// echo'Email Atau Password yang anda masukan belum terdaftar';
echo 'gagal';
}

//echo"$email-$pwd";
?>

