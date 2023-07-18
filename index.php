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

      <div class="row pt-4">
        <?php 
        $sql="SELECT
                id,
                nama_kategori,
                images,
                seq,
                updatedate,
                updateby,
                `status`
              FROM produk_kategori order by seq asc";
        $query=mysqli_query($link,$sql);
        while(list($id,$nama_kategori,$images,$seq,$updatedate,$updateby,$status)=mysqli_fetch_array($query)){      
        ?>
        <div class="col-md-4 pt-2">
          <div class="list-produk">
            <a href="category.php?cate=<?php echo $id;?>">
                <img style="width: 350px !important;" src="assets/images/<?php echo $images;?>" alt="<?php echo $images;?>">
    
                <h5 class="title"><?php echo $nama_kategori?></h5>
                <p class="sub-title">For Your All Activity</p>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>


    </div>
    <div id="mobile" class="container" >

      <h1 class="pt-4">New Arrivals</h1>
      <div class="row">
        <?php 
          $sql="SELECT
                  id,
                  nama_produk,
                  kategori,
                  foto,
                  harga_total,
                  `status`
                FROM produk";
        $query=mysqli_query($link,$sql);
        while(list($id,$nama_produk,$kategori,$images,$harga,$status)=mysqli_fetch_array($query)){    
        ?>
        <div class="col-md-4 pt-4">
          <div class="list-produk">
              <a href="detail_produk.php?idp=<?php echo $id?>">
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