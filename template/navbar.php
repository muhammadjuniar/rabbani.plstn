<style>

    body {
        min-height: 100vh;
    }

    .brand{
        text-align: center; padding-top:50px; margin-bottom:-10px;
    }

    .nav{
        width:100%;
        height:100px;
        background-image: url('assets/images/img_nav_bg.png');
        background-repeat: no-repeat;

    }
    .nav-link{
        color:white !important; 
        text-align:right;
        font-family: 'Inter Tight', sans-serif; 
        color: #FFFFFF;
        font-weight: 300;
        font-size: 13px;
        text-transform: capitalize;

    }

    .nav-category {
        color: #171717;
        font-size: 14px;
    }

    .nav-contact {
        color: #171717;
        font-size: 10px;
    }
    
    .top-nav{
            margin-bottom:-45px; margin-top:15px;
        }

    /* .btn-custom{
        background-color: #b75ae2; border-color: #b75ae2; color: #fff;
    } */
    /* .btn-custom:hover{
        color: #fff;
        background-color: #a748d2;
        border-color: #aa16ee;
    } */
    .nav-b{
    /* font-size:24px;  */
    float:left;
    /* font-family: 'Roboto', sans-serif; */
    text-transform: capitalize;
    color: white;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 500;
    margin-top:15px;

    }
    .img-logo{
        width:37px;
        height:37px;
        margin-right:5px;
        margin-top:15px;
    }

    .jarak{
        margin-right:8px
    }

    @media (max-width: 767px){
        .brand{
            padding-top:30px; margin-bottom:-70px;
        }
        
        .nav-b{
            float:none; font-size:18px; 
        }
        .nav-link{
        
            text-align:center;
            padding-bottom:5px;
        }
        .login-form{
            margin-top:-60px;
        }
        .nav{
            height:105px;
            border-bottom-left-radius:20px;
            border-bottom-right-radius:20px;
        }
        .img-logo{
            width:36px;
            height:36px;
            margin-right:10px;
        }
        img.biro{
            display:none;
        }
        img.wani{
            display:none;
        }
        img.rabbani{
            display:none;
        }
        a.toko{
            display:none;
        }
        .mob-name{
        margin-top:-25px;
        float:left;
        margin-left:12px;
        }
        .input-cari{
            padding: 7px; 
            padding-left: 10px;
            padding-left: 10px;
            border-radius:3px; 
            border-color: #FFFFFF; 
            border:0px; 
            margin-left: 5px;
            width: 73%;
            font-size: 12px;
        }
        img.rabbani-mob{
            width: 30px;height: 30.1px;
            margin-right:5px;
        }
        
        .login-font,.kelola{
            font-size:10px;
            color: #000 !important;
        }
        .top-nav{
            margin-bottom:10px; margin-top:-5px;
        }
        .nav-category {
            color: #fff;
        }

        .nav-contact {
            color: #fff;
        }
        @media (max-width: 412px){
            .login-font{
                display:none;
            }
            .input-cari{
                padding: 7px; 
                padding-left: 10px;
                padding-left: 10px;
                border-radius:3px; 
                border-color: #FFFFFF; 
                border:0px; 
                margin-left: 5px;
                width: 70%;
                font-size: 12px;
            }
            .mob-name{
            
                margin-left:15px;
            }
            a.seller{
                float:right;
                margin-right:20px;
            }
            .top-nav{
                margin-bottom:5px; 
            }
        }
        
    }
</style>
<body>
    
<?php // echo $kode_beli; //die;  ?>
<div class='nav'>
    <div id="mobile" class="container nav-link">
        <a href="https://wa.me/628112346165?text" class="nav-contact"><span>Contact Us</span></a>
        <div class="top-nav"> 				
            <a href="#" class="nav-category" ><span class="login-span" >Rabbani Men Palestine Series</span></a>
        </div>
        <div>
            <a href="index.php"><img class="nav-b img-logo rabbani" src="assets/images/logo/ico_logo_rabbani.png" alt="rabbani"></a>
          
            <a href="index.php"><img class="rabbani-mob" src="assets/images/logo/ico_logo_rabbani.png" alt="rabbani" style="  "></a>
        </div>
        <div class="mob-name">&nbsp;
        <a href="index.php" style="color:#fff">
            <i class="icon-home icon-13xx"></i>&nbsp;
        </a>

        </div>
    </div>


</div>
