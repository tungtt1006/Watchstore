<?php 
  $this->layoutPath = "Layout.php";
?>
<div class="container panel_FerrariList">
  <!--ARRANGE-->
  <div class="row ps-3 pe-3 mt-4 mb-4">
    <div class="col-xl-6">
        <div class="dropdown">
          <button class="btn dropdown-toggle Range" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Price & Name
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=priceAsc">Ascending</a></li>
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=priceDesc">Decrease</a></li>
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=nameAsc">A-Z</a></li>
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=nameDesc">Z-A</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn dropdown-toggle Range" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Status
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=statusStocking">Stocking</a></li>
              <li><a class="dropdown-item" href="index.php?controller=BrandsList&id=<?php echo $id; ?>&order=statusOutStock">Out of stock</a></li>
          </ul>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="dropdown">
          <button class="btn dropdown-toggle Range" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Date
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Newest</a></li>
            <li><a class="dropdown-item" href="#">Year</a></li>
            <li><a class="dropdown-item" href="#">Month</a></li>
          </ul>
        </div>
    </div>
  </div>
  <!--ARRANGE END-->

  <!--LIST WATCHES-->
  <div class="row ps-3 pe-3">
    <?php foreach($query as $rows): ?>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card text-center One" style="border:none;">
              <span class="badge bg-danger" style="position:absolute;top:3px;left:3px;padding:10px;"><?php echo  $rows->discount; ?>%</span>
              <img src="assets/images/<?php echo $rows->anh_url; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                    <h5 class="card-title"><?php echo $rows->ten; ?></h5>
                    <p class="card-text">
                      <p class="pt-3 card_price">$<?php echo number_format($rows->giaban); ?></p>
                    </p>
                    <div class="row text-start">
                      <div class="col-md-7 pe-1">
                        <a href="detail/<?php echo $rows->id; ?>" class="btn btn-primary w-100 btn_detail" style="border-radius: 0rem;">Detail</a>
                      </div>
                      <div class="col-md-5 ps-1">
                        <a href="index.php?controller=cart&action=add&id=<?php echo $rows->id; ?>" class="btn btn-primary w-75 plus" style="border-radius: 0rem;"><i class="fas fa-shopping-cart"></i></a>
                      </div>
                    </div>
              </div>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
  <!--LIST WATCHES END-->
  
  <!--ANOTHER BRANDS-->
  <div class="row mt-5 text-center">
    <span class="mb-3 ad_brand_title">DISCOVER MORE ABOUT OUR BRANDS</span>

    <?php foreach ($query1 as $rows): ?>
      <div class="col-md-4">
        <a href="brandsList/<?php echo $rows->id; ?>" class="card ad_brand" style="border-radius:0rem;">
          <img src="assets/images/<?php echo $rows->anh_url; ?>" class="card-img-top" alt="...">
          <div class="card-footer">
            <div class="row py-2">
              <div class="col-10">
                <span class="ad_brandtitle"><?php echo $rows->ten; ?></span>
              </div>
              <div class="col-2 ad_brandincon">
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach ?>
  </div>
  <!--ANOTHER BRANDS END-->
</div>