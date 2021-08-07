<?php 
  $this->layoutPath = "Layout.php";
?>
<div class="container-fluid">
  <p class="pt-5 direct_news"><a href="home">Home</a>  <i class="fas fa-chevron-right"></i>  <a href="">News</a>  <i class="fas fa-chevron-right"></i>  <a href="">News</a></p>
  <h1 class="tile_news"><?php echo $query->ten; ?></h1>
  <p class="pb-4 infor_news">Author: <span style="color:black;font-weight:600;">Tùng Phạm</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-clock"></i> 8 hour ago</p>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
      <?php echo $query->noidung; ?>
    </div>
  </div>

<div class="panel_news mt-5">
  <div class="row pt-4">
    <div class="row">
       <h1 class="title_news1">Related News</h1> 
    </div>
    <?php 
       $display_news = $this->modelGetAnotherNews($query->id);
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
  </div>
</div>

</div>