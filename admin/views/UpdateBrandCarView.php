<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
 ?>
<h1>
	<?php if(isset($query->ten)): ?>
	   Update <?php echo $query->ten; ?>
	<?php else: ?>
	   Create A New Brand
	<?php endif; ?>		
</h1>
<?php if(isset($query->ten) && $query->anh_url != ""): ?>
  <img src="../assets/images/<?php echo $query->anh_url; ?>" class="img-fluid" width="300px" style="margin-left:30px;margin-bottom:20px;border-radius:10px;">
<?php endif; ?>

<form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Brand Name</label>
      <input type="text" class="form-control" name="brand" value="<?php echo isset($query->ten) ? $query->ten : ""; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;width:20%;">
      <label class="form-label">Brand Categories</label>
      <select class="form-control" name="parent_id">
        <option value="0"></option>  
        <?php foreach($query1 as $rows): ?>
          <option value="<?php echo $rows->id; ?>"><?php echo $rows->ten; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3" style="padding-left:30px;margin-top:20px;">
      <label class="form-label">Logo Image</label>
      <input class="form-control" type="file" id="formFile" name="photo" style="width:50%;">
    </div>
    <button type="submit" class="btn btn-secondary" name="submit" style="background-color:darkgray;margin-top:20px;border-radius:15px;color:white;margin-left:30px;">Submit</button>
</form>