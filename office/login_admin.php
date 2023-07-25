<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Staff Only</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/separate/pages/login.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="post">
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password"/>
                    </div>
                   <!--  <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div> -->
                    <input type="button" class="btn btn-rounded" onclick="ex_proses()" value="Login">
                    <!-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p> -->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
<script src="js/lib/popper/popper.min.js"></script>
<script src="js/lib/tether/tether.min.js"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript">
    function ex_proses(){
        //alert('test');
        var username=$("#username").val();
        var pass=$("#pass").val();
        
        $(".error").remove();

        if (username==''){
            alert('Silahkan isi username');
            // $('#username').after('<span class="error">Silahkan isi username</span>');
        } else if (pass==''){
            alert('Silahkan isi password');
            // $('#pass').after('<span class="error">Silahkan isi password</span>');
        } else {

            $.ajax({
                  type: 'POST',
                  url: 'login_confirm.php',
                  data: {username:username,pass:pass},
                  dataType: 'text',
                  success: function(data){
                       //alert(data);
                       if (data.trim()=='gagal'){
                        //alert('login berhasil');
                            // alert ('Email Atau Password yang anda masukan belum terdaftar');
                            $('#alert').after('<span id="alert-message" class="error">Email Atau Password yang anda masukan belum terdaftar.</span>');
                            // $('#username').val('');
                            // $('#pass').val('');
                             location.reload();
                        } else if (data.trim()=='berhasil') {
                            location.href="index.php";
                        }
                  }//end success 
            }); 
        }
    }
</script>
</body>
</html>