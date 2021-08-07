<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
 ?>
<div class="row">
   <div class="col-md-8">
     <h1>Watch Brands</h1>
   </div>
   <div class="col-md-4" style="padding-top:30px;">
     <a class="btn_create" href="index.php?controller=home&action=create">Create New Brand</a>
   </div>
</div>
<table class="table table-hover">
  <thead>
    <tr class="table_title">
      <th scope="col">Brand Name</th>
      <th scope="col">Logo Image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $rows): ?>
	    <tr class="table_content brand_category">
	      <td><?php echo $rows->ten; ?></td>
        <td>
           <img src="../assets/images/<?php echo $rows->anh_url; ?>" style="border-radius:10px;width:100px;height:60px;">
        </td>
	      <td class="text-center">
	      	<a href="index.php?controller=home&action=update&id=<?php echo $rows->id; ?>" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
            <a href="index.php?controller=home&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
        </td>
	    </tr>
      <?php 
         $brandsSub = $this->modelBrandSub($rows->id);
      ?>
      <?php foreach($brandsSub as $rowsSub): ?>
        <tr class="table_content1"> 
          <td><?php echo $rowsSub->ten; ?></td>
          <td><?php echo $rowsSub->anh_url; ?></td>
          <td class="text-center">
              <a href="index.php?controller=home&action=update&id=<?php echo $rowsSub->id; ?>" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
              <a href="index.php?controller=home&action=delete&id=<?php echo $rowsSub->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endforeach; ?>

  </tbody>
</table>