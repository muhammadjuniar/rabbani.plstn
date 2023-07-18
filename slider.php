<section id="slider" class="slider-element" style="padding-top:20px;background-image: url('assets/images/img_bg.jpg')">
  <div id="mobile-slider" class="container clearfix box-slide">
      <img src="assets/images/img_banner.png" class="img-fluid" alt="Responsive image">
      <div class="row">
        <div class="col" style="margin-top:20px;margin-bottom:-10px;">
            <?php if(isset($_GET['cate'])){ ?> 
                <h2 class="text-title">Palestine Series / <?php echo ucfirst($_GET['cate']); ?></h2>
            <?php }else{ ?>
                <h2 class="text-title">Palestine Series</h2>
            <?php } ?>
        </div>
        <div class="col" style="margin-top:20px;margin-bottom:-10px;">
            <?php if(isset($_GET['cate'])){ ?> 
                <a class="link-category"><?php echo ucfirst($_GET['cate']); ?></a>
            <?php }else{ ?>
                <a href="category.php?cate=all" class="link-category">Show all</a>
            <?php } ?>
        </div>
      </div>
  </div>
</section>