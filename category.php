<?php include("template/header.php"); ?>
<?php include("template/navbar.php"); ?>
<style>
  .img-fluid {
    width: 100%;
    height: 338px !important;
    border-radius: 8px;
    
  }
  .breadcrumb-item + .breadcrumb-item::before {
    display: inline-block;
    color: #6c757d;
    content: none !important;
    
  }
  .breadcrumb a {
    font-size:16px !important;
    font-family: 'Inter Tight', sans-serif;
    font-size: 14px;
    color: #6a6a6a;
    font-weight: 600;
  }
  .breadcrumb li {
  text-align:center;
  padding-left:30px !important;
  }

  p.jenis-kategori{
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    font-weight: bold;
    color: #525252;
  }
  .aktif{
    color:#b75ae2 !important;
  }
  .garis{
    margin-top:8px;
    width:85px;
    display:block;
    margin-left: 4px;
    
  }
  .link-dropdown:active{
    background-color:#fff;
    color: #b75ae2;
    font-weight:300px;
  }
  .link-dropdown:hover{
    background-color:#fff;
    color: #b75ae2;
    font-weight:300px;
  }
  .dropdown-item:hover, .dropdown-item:focus {
    
    background-color: #fff !important;
  }
  .btn-outline-dropdown:focus{
    background-color: #b75ae2 !important;
    box-shadow: 0 0 0 0.2rem  #b75ae2 !important;
    color:#fff !important;
  }
.container_login {
    display: flex;
    flex-direction: row;
    width: 100%;
}

.login-separator {
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: #fff;
    padding: 30px 0;
    min-height: 110px;
    width: 100%;
}

.text-title{
  font-family: Roboto, sans-serif;
  font-size: 24px;
  font-weight: bold;
  font-stretch: condensed;
  font-style: normal;
  line-height: 1;
  letter-spacing: normal;
  text-align: left;
  color: #525252;
}

.link-category {
  font-family: Roboto, sans-serif;
  font-size: 14px;
  font-weight: 400;
  font-stretch: normal;
  font-style: normal;
  color: #6a6a6a;
  float: right;
}

.color-product{
  color: #525252!important;
  font-size: 16px;
  font-weight: 500;
}
@media (max-width: 767px){
    .img-fluid {
      height:200px !important;
    }
    .breadcrumb a {
      font-size:12px !important;
      font-family: 'Inter Tight', sans-serif;
      color: #6a6a6a;
      font-weight: 400;
    }
    .breadcrumb li {
    text-align:center;
    margin-left:10px !important;
    height: 30px;
    }

    p.jenis-kategori{
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      font-weight: bold;
      color: #525252;
    }
    .btn-outline-dropdown{
      font-size:12px !important;
      font-weight: 400 !important;
    }
    .garis{
      width:40px;
      margin-left: 0px;
    }
    .breadcrumb-item + .breadcrumb-item {
      padding-left: 1.2rem !important;
    }
    .text-title{
      margin-left:10px;
      font-size:16px;
    }
    .link-category{
      margin-right:10px;
      font-size:12px;
    }
    .col-md-4 {
      padding-right: 8px !important;
      padding-left: 8px !important;
      flex-basis: 0;
      flex-grow: 1;
    }
    .card-img-top{

      height:auto;
    }
    .img-brand {
      width:80%;
    }
    .card{
				min-width: 120px;
				min-height: 255px;
				max-width: 300px;
				
				width: auto;
				height: auto;
			}
  }
  @media (max-width:500px){
    .img-fluid {
      height:200px !important;
    }
    .breadcrumb a {
      font-size:12px !important;
      font-family: 'Inter Tight', sans-serif;
      color: #6a6a6a;
      font-weight: 400;
    }
    .breadcrumb li {
    text-align:center;
    margin-left:10px !important;
    height: 30px;
    }

    p.jenis-kategori{
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      font-weight: bold;
      color: #525252;
    }
    .btn-outline-dropdown{
      font-size:12px !important;
      font-weight: 400 !important;
    }
    .garis{
      width:40px;
      margin-left: 0px;
    }
    .breadcrumb-item + .breadcrumb-item {
      padding-left: 1.2rem !important;
    }
    .text-title{
      margin-left:10px;
      font-size:16px;
    }
    .link-category{
      margin-right:10px;
      font-size:12px;
    }
    .col-md-4 {
      padding-right: 8px !important;
      padding-left: 8px !important;
      flex-basis: 0;
      flex-grow: 1;
    }
    .card-img-top{

      height:auto;
    }
    .img-brand {
      width:80%;
    }
  }
  @media (max-width:411px){
    .img-fluid {
      height: 146px !important;
    }
    .breadcrumb {
      flex-wrap: nowrap;
    }
    .breadcrumb a {
      font-size:12px !important;
      font-family: 'Inter Tight', sans-serif;
      color: #6a6a6a;
      font-weight: 400;
    }
    .breadcrumb li {
    text-align:center;
    margin-left:0px !important;
    }

    p.jenis-kategori{
      font-family: 'Roboto', sans-serif;
      font-size: 14px;
      font-weight: bold;
      color: #525252;
    }
    .btn-outline-dropdown{
      font-size:11.5px !important;
      font-weight: 400 !important;
    }
    .garis{
      width:40px;
      margin-left: 0px;
    }
    .breadcrumb-item + .breadcrumb-item {
      padding-left: 1.2rem !important;
    }
    .boxed-slider{
      padding-top: 8px !important;
    }
    .box-slide{
      padding-left: 8px !important;
      padding-right: 8px !important;
    }
    .content-wrap {
      margin-top: -70px;
    }
    .text-title{
      margin-left:10px;
      font-size:16px;
    }
    .link-category{
      margin-right:10px;
      font-size:12px;
    }
    .col-md-4 {
      padding-right: 8px !important;
      padding-left: 8px !important;
      flex-basis: 0;
      flex-grow: 1;
    }
    .card-img-top{

      height:auto;
    }
    .img-brand {
      width:80%;
    }
    .color-product{
      font-size:9px;
    }
    .card{
				min-width: 100px;
				/* max-height: 255px; */
				max-width: 100px;
				
				width: auto;
				height: auto;
			}
  }
</style>
<section id="slider" class="slider-element boxed-slider" style="background-image: url('assets/images/img_bg.jpg')">
  <div id="mobile-slider" class="container clearfix box-slide">
      <img src="assets/images/img_banner.png" class="img-fluid" alt="Responsive image">
      <div class="row">
      <div class="col" style="margin-top:20px;">
        <h2 class="text-title">Palestine Series / <?php echo ucfirst($_GET['cate']) ?></h2>
      </div>
      <div class="col" style="margin-top:20px;">
        <a class="link-category"><?php echo ucfirst($_GET['cate']) ?></a>
      </div>
      </div>
  </div>
</section>
<section id="content" style="margin-bottom: 0px;background: #f5f5f5; ">
  <div class="container-fluid" style="background-color:#f5f5f5">

    
    <div id="mobile" class="container" >

      <div class="row pt-4">
        <?php 
        $sql="SELECT
                  id,
                  nama_produk,
                  kategori,
                  foto,
                  harga_total,
                  `status`
                FROM produk where kategori='$_GET[cate]'";
        $query=mysqli_query($link,$sql);
        while(list($id,$nama_produk,$kategori,$images,$harga,$status)=mysqli_fetch_array($query)){    
        ?>
        <div class="col-md-4 pt-2">
          <a href="detail_produk.php?idp=<?php echo $id?>">
            <div class="card">
              <img class="card-img-top" src="<?php echo $images; ?>" alt="<?php $nama_produk;?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nama_produk;?>
                  <br />
                  <!-- <span class="color-product">Black</span> -->
                </h5>
                <p class="harga card-text">IDR. <?php echo number_format($harga); ?></p>
              </div>
            </div>
            </a>
        </div>
        <?php } ?> 

       
       
      </div>


    </div>
    <div class="container mt-5">

    </div>
  </div>
</section>

<section id="separator" style="margin-bottom: 0; ">
    <div class="container_login">
        <div class="login-separator">
            <img class="img-brand" src="assets/images/img_family_brand.png" alt="">
        </div>
    </div>
</section>

<?php include("template/footer.php"); ?>