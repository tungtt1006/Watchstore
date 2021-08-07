<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
 ?>
<div class="row">
   <div class="col-md-8">
     <h1>Garage</h1>
   </div>
   <div class="col-md-4" style="padding-top:30px;">
     <a class="btn_create" href="index.php?controller=garage&action=create">Create new watch</a>
   </div>
</div>
<table class="table table-hover">
  <thead>
    <tr class="table_title">
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $rows): ?>
	    <tr class="table_content brand_category">
        <td>
         <?php if($rows->anh_url): ?>
           <img src="../assets/images/<?php echo $rows->anh_url; ?>" style="width:250px;">
         <?php endif; ?>
        </td>
	      <td><?php echo $rows->ten; ?></td>
        <td><?php echo "$".$rows->giaban; ?></td>
	      <td class="text-center">
	      	<a href="index.php?controller=garage&action=update&id=<?php echo $rows->id; ?>" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
            <a href="index.php?controller=garage&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
        </td>
	    </tr>
    <?php endforeach; ?>

  </tbody>
</table>