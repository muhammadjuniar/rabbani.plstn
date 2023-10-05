<?php include("template/header.php"); ?>
<?php include("template/navbar.php"); ?>
<style>
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
</style>
<?php include "slider.php"; ?>
<section id="content" style="margin-bottom: 0px;background: #f5f5f5; ">
  <div class="container-fluid" style="background-color:#f5f5f5">

    
    <div id="mobile" class="container" >

      <div class="row pt-2">
        <?php 
        if($_GET['cate'] == 'All' || $_GET['cate'] == 'all'){
          $filter_cate = "";
        }else{
          $filter_cate = "WHERE kategori='$_GET[cate]'";
        }
        $sql="SELECT
                  id,
                  nama_produk,
                  kategori,
                  foto,
                  harga_total,
                  `status`
                FROM produk $filter_cate";
        $query=mysqli_query($link,$sql);
        while(list($id,$nama_produk,$kategori,$images,$harga,$status)=mysqli_fetch_array($query)){    
        ?>
        <div class="col-md-4 pt-4">
          <div class="list-produk">
              <a href="product-<?php echo str_replace([" ","-"],"_",$nama_produk)?>">
                <img src="<?php echo $images; ?>" alt="<?php $nama_produk;?>">
    
                <h5 class="title"><?php echo $nama_produk;?></h5>
                <h5 class="harga-produk">IDR. <?php echo number_format($harga); ?></h5>
              </a>
          </div>
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