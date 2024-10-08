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

  #preloader 
  { 
    display: flex;
    position: fixed; 
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 9999;
    background: #FFFFFF; 
    align-items: center;
    justify-content: center;
  }

  #preloader img {
    animation: fadeIn 2s;
  }

  @keyframes fadeIn {
			0% { opacity: 0; }
			100% { opacity: 1; }
	}

  @keyframes fadeOut {
			0% { opacity: 1; }
			100% { opacity: 0; }
	}
  
  
  @media (max-width: 440px){
    .list-produk .title {
      white-space: nowrap;
      width: 105px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  }
</style>
<div id="preloader">
  <img src="assets/images/preloader.png" alt="preloader" />
</div>
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
            <!-- <a href="category.php?cate=<?php echo $id;?>"> -->
            <a href="category-<?php echo ucfirst($id);?>">
                <img style="width: 400px !important;" src="assets/images/<?php echo $images;?>" alt="<?php echo $images;?>">
    
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

<script>
  window.onload = function Preloader() {
      setTimeout(() => {
          document.querySelector('#preloader').style.display = "none";
      }, 2000)
  };
  if (!sessionStorage.getItem('doNotShow')) {
    sessionStorage.setItem('doNotShow', true);
    Preloader();
  } else {
    document.querySelector('#preloader').style.display = "none";
  }
</script>
<?php include("template/footer.php"); ?>