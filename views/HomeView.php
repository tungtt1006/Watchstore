<?php 
  $this->layoutPath = "Layout.php";
  //assets/images/ForFirst.jpg
?>
<style type="text/css">
  .btn_slide {
  z-index: 0;  
}
.btn_slide:focus {
  box-shadow: 0 0 0 0;
} 
</style>
<!--banners-->
<div class="container-fluid mb-5" >
  <!--Slide-->
  <div class="row"> 
    <?php
      $banners = $this->modelGetDisplayedBanners(); 
      $i = 1;
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach($banners as $rows): ?>
            <?php if($i == 1): ?>
                <div class="carousel-item active">
                  <img src="assets/images/<?php echo $rows->anh_url; ?>" class="d-block w-100" alt="...">
                </div>
                <?php $i++; ?>
            <?php else: ?>
                <div class="carousel-item">
                  <img src="assets/images/<?php echo $rows->anh_url; ?>" class="d-block w-100" alt="...">
                </div>
            <?php endif;?>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev btn btn_slide" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next btn btn_slide" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!--Slide end-->
  <!--Gender-->
  <div class="row mt-5 pt-3">
    <div class="col-md-6">
      <div class="card bg-dark text-white" style="border-radius:0rem;">
        <img src="assets/images/Banner_5.jpg" style="opacity:0.5" class="card-img" alt="...">
        <div class="card-img-overlay text-center pt-5">
          <p class="card-text pt-5 gender_title">Men's Watches <br> 
            <a href="index.php?controller=BrandsList&action=gender&gender=1">See now</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card bg-dark text-white" style="border-radius:0rem;">
        <img src="assets/images/Banner_6.jpg" style="opacity:0.5" class="card-img" alt="...">
        <div class="card-img-overlay text-center pt-5">
          <p class="card-text pt-5 gender_title">Women's Watches <br> 
            <a href="">See now</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--Gender-->
</div>
<!--banners end-->

<!--list watch-->
<div class="container-fluid panel_listCars">
    <?php
      $brands = $this->modelGetBrands();
    ?>
    <?php foreach($brands as $rows): ?>
        <div class="list_title">
            <h1><?php echo $rows->ten; ?></h1>
            <p style="text-align:center;">
                <a href="brandsList/<?php echo $rows->id; ?>"  class="list_title_seemore">see more <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="row ps-3 pe-3 mb-3">
            <?php
                $watches = $this->modelGetWatches($rows->id); 
            ?>
            <?php foreach($watches as $rowsSub): ?>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="card text-center One" style="border:none;position:relative;">
                  <?php if($rowsSub->discount != 0): ?>
                  <span class="badge bg-danger" style="position:absolute;top:3px;left:3px;padding:10px;"><?php echo  $rowsSub->discount; ?>%</span>
                  <?php endif;?>
                  <img src="assets/images/<?php echo $rowsSub->anh_url; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                        <h5 class="card-title"><?php echo $rowsSub->ten; ?></h5>
                        <p class="card-text">
                            <p class="pt-3 card_price">$<?php echo number_format($rowsSub->giaban); ?></p>
                        </p>
                        <div class="row text-start">
                          <div class="col-md-7 pe-1">
                            <a href="detail/<?php echo $rowsSub->id; ?>" class="btn btn-primary w-100 btn_detail" style="border-radius: 0rem;">Detail</a>
                          </div>
                          <div class="col-md-5 ps-1">
                            <a href="index.php?controller=cart&action=add&id=<?php echo $rowsSub->id; ?>" class="btn btn-primary w-75 plus" style="border-radius: 0rem;"><i class="fas fa-shopping-cart"></i></a>
                          </div>
                        </div>
                  </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<!--list watch end-->

<!--news-->
<div class="container panel_news">
    <div class="row">
       <h1>News</h1> 
    </div>
    <?php 
       $display_news = $this->modelGetDisplayedNews();
       $cate_news = $this->modelGetCategories();
    ?>
    <?php foreach($display_news as $rows): ?>
        <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="row py-3">
            <div class="col-xl-3">
               <img src="assets/images/<?php echo $rows->anh_url; ?>" class="card-img-top" alt="..."> 
            </div>
            <div class="col-xl-9">
                <?php foreach($cate_news as $rowsSub): ?>
                    <?php if($rows->danhmuc_id == $rowsSub->id): ?>
                      <span style="font-weight:500;font-size:15px;color:gray;"><?php echo $rowsSub->ten; ?></span>
                    <?php endif; ?>
                <?php endforeach;?>
                <p style="font-weight:500;font-size:20px;"><?php echo $rows->ten; ?></p>
                <p style="font-weight:400;font-size:15px;color:darkgray;">4 hour ago</p>
            </div>
        </a>
    <?php endforeach; ?>
    <div class="row pt-4">
       <a href="index.php?controller=news" class="news_seemore">See more <i class="fas fa-arrow-right" style="font-weight:300;"></i></a> 
    </div>
</div>
<!--news end-->