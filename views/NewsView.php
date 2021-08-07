<?php 
  $this->layoutPath = "Layout.php";
?>
<div class="row mt-4">
   <div style="width: 85%;"></div>
   <div class="cate_select" style="width: 15%;">
      <select class="form-control" onchange="location.href = 'index.php?controller=news&category_id='+this.value;">
            <option value="0">All</option>
            <?php foreach($data1 as $rows): ?>
               <option <?php if(isset($_GET["category_id"])&&$_GET["category_id"]==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->ten; ?></option>
            <?php endforeach; ?>
      </select>
   </div>
</div>

<div class="row mt-3">
  <?php foreach($data as $rows): ?>
     <div class="col-md-4">
           <div class="card mb-3">
              <img src="assets/images/Banner_1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <?php foreach($data1 as $rowsSub): ?>
                   <?php if($rows->danhmuc_id == $rowsSub->id): ?>
                     <h5 class="card-title"><a class="title_news" href="index.php?controller=News&action=detail&id=<?php echo $rows->id; ?>"><span class="badge bg-secondary"><?php echo $rowsSub->ten; ?></span> <?php echo $rows->ten; ?></a></h5>
                   <?php endif; ?>
                <?php endforeach; ?>
              </div>
           </div>
     </div>
  <?php endforeach; ?>
</div>

<div class="row text-center">
   <nav aria-label="Page navigation example">
     <ul class="pagination justify-content-center">
       <li class="page-item">
         <a class="page-link" href="#" aria-label="Previous">
           <span aria-hidden="true">&laquo;</span>
         </a>
       </li>
       <?php for($i = 1; $i <= $numPage; $i++): ?>
          <li class="page-item"><a class="page-link" href="index.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php endfor; ?>
       <li class="page-item">
         <a class="page-link" href="#" aria-label="Next">
           <span aria-hidden="true">&raquo;</span>
         </a>
       </li>
     </ul>
   </nav>
</div>
