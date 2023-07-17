<?php include("template/header.php"); ?>
<?php include("template/navbar.php"); ?>
<style>
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

      <div class="badan pt-4">
        <div class="row">
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
        <div class="list-produk">
            <a href="detail_produk.php?idp=<?php echo $id?>">
              <img src="<?php echo $images; ?>" alt="<?php $nama_produk;?>">
  
              <h5 class="title"><?php echo $nama_produk;?></h5>
              <h5 class="harga-produk">IDR. <?php echo number_format($harga); ?></h5>
            </a>
        </div>
        <?php } ?> 

       
        </div>
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