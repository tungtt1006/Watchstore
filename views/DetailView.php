<?php 
  $this->layoutPath = "Layout.php";
?>
<link rel="stylesheet" type="text/css" href="assets/Client/css/Detail.css">
<div class="container">
  <div class="row mt-4">
     <div class="col-md-6">
        <img src="assets/images/<?php echo $query->anh_url; ?>" class="img-fluid" alt="...">
     </div>
     <div class="col-md-6">
        <ul class="information">
           <li>
               <h1 class="name"><?php echo $query->ten; ?></h1>    
           </li>
           <li class="pt-4">
               <h3 class="price">
                  $<?php echo number_format($query->giaban); ?>&emsp;
                  <span style="color:gray;font-size:25px;text-decoration:line-through;">$<?php echo number_format($query->giaban+100000); ?></span>                 
               </h3>
           </li>
           <li>
                <span class="inf_title">Size:</span>&emsp;
                <span class="inf_content"><?php echo $query->size; ?> mm</span>
           </li>
           <li>
                <span class="inf_title">Status: </span>&ensp;
                <?php if($query->tinhtrang): ?>
                  <span  style="color:rgb(59, 177, 0);font-size:20px;">
                    <i class="fas fa-check-circle"></i> Stocking
                  </span>
                <?php else: ?>
                  <span  style="color:red;font-size:20px;">
                    <i class="fas fa-times-circle"></i> Out of stock
                  </span>
                <?php endif; ?>
           </li>
           <li class="pt-3">
              <div class="ps-3 py-2" style="border:1px solid lightgray;width:70%;">
                  <h4 class="inf_titles">Rating:</h4>
                  <?php 
                    $rating = $this->modelGetStar($query->id);
                  ?>
                  <table style="width:100%;">
                     <tr>
                       <td>
                         <a href="index.php?controller=Detail&action=rating&star=1&id=<?php echo $query->id; ?>"><i class="fas fa-star star" ></i></a>
                       </td>
                       <td class="text-center"><span class="badge bg-dark">
                         <?php if($rating) echo $rating->sao_1; else echo 0; ?></span>
                       </td>
                     </tr>
                     <tr>
                       <td>
                         <a href="index.php?controller=Detail&action=rating&star=2&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                         <a href="index.php?controller=Detail&action=rating&star=2&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                       </td>
                       <td class="text-center"><span class="badge bg-danger"><?php if($rating) echo $rating->sao_2; else echo 0; ?></span></td>
                     </tr>
                     <tr>
                       <td>
                        <a href="index.php?controller=Detail&action=rating&star=3&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=3&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=3&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                      </td>
                       <td class="text-center"><span class="badge bg-warning text-dark"><?php if($rating) echo $rating->sao_3; else echo 0; ?></span></td>
                     </tr>
                     <tr>
                       <td>
                        <a href="index.php?controller=Detail&action=rating&star=4&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=4&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=4&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=4&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                      </td>
                       <td class="text-center"><span class="badge bg-info text-dark"><?php if($rating) echo $rating->sao_4; else echo 0; ?></span></td>
                     </tr>
                     <tr>
                       <td>
                        <a href="index.php?controller=Detail&action=rating&star=5&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=5&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=5&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=5&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                        <a href="index.php?controller=Detail&action=rating&star=5&id=<?php echo $query->id; ?>"><i class="fas fa-star star"></i></a>
                      </td>
                       <td class="text-center"><span class="badge bg-success"><?php if($rating) echo $rating->sao_5; else echo 0; ?></span></td>
                     </tr>
                  </table>     
              </div>
           </li>
           <li class="pt-5">
             <?php if($query->tinhtrang): ?>
                <a href="index.php?controller=detail&action=buy&id=<?php echo $query->id; ?>" type="button" class="btn btn-outline-secondary btn-lg w-50 btn_buy mt-3">BUY NOW</a>&ensp; &ensp; &ensp;
                <a href="index.php?controller=cart&action=add&id=<?php echo $query->id; ?>" type="button" class="btn btn-secondary btn-lg btn_cart mt-3" style="width:40%;">ADD TO CART</a>
             <?php else: ?>
                <h1 style="text-align:center;background-color:lightgray;color:white;font-weight:400;">Sold out</h1>
             <?php endif;?>
           </li>
        </ul>
     </div>
  </div>
  <div class="row mt-5 pt-4">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active px-3 btn_description" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descripton</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link btn_description" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Specifications</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link px-3 btn_description" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active pt-3" id="home" role="tabpanel" aria-labelledby="home-tab" style="width:100%;">
        <?php echo $query->mota; ?>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="width:50%;margin:auto;">
        <?php echo $query->thongsochitiet; ?>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
  </div>
</div>