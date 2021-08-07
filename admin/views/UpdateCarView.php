<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
 ?>
<h1>
	<?php if(isset($query->ten)): ?>
	   Update <?php echo $query->ten; ?>
	<?php else: ?>
	   Add A New Watch
	<?php endif; ?>		
</h1>
<?php if(isset($query->ten)): ?>
  <img src="../assets/images/<?php echo $query->anh_url; ?>" class="img-fluid" width="300px" style="margin-left:30px;margin-bottom:20px;border-radius:10px;">
<?php endif; ?>

<form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Name Of Watch</label>
      <input type="text" class="form-control" name="watch_name" value="<?php echo isset($query->ten) ? $query->ten : ""; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Sex</label>
      <input type="text" class="form-control" name="watch_sex" value="<?php echo isset($query->gioitinh) ? $query->gioitinh : ""; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Material</label>
      <input type="text" class="form-control" name="watch_material" value="<?php echo isset($query->chatlieu) ? $query->chatlieu : ""; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Size</label>
      <input type="text" class="form-control" name="watch_size" value="<?php echo isset($query->size) ? $query->size : 0; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Water resistant</label>
      <input type="text" class="form-control" name="watch_wtr" value="<?php echo isset($query->chongnuoc) ? $query->chongnuoc : 0; ?>" style="width:50%;">
    </div>
    <div class="mb-3" style="padding-left:30px;">
      <label class="form-label">Status</label>
      <input type="text" class="form-control" name="watch_status" value="<?php echo isset($query->tinhtrang) ? $query->tinhtrang : 0; ?>" style="width:50%;">
    </div>
    <div class="mb-5" style="padding-left:30px;">
      <label class="form-label">Discount</label>
      <input type="text" class="form-control" name="watch_discount" value="<?php echo isset($query->discount) ? $query->discount : 0; ?>" style="width:50%;">
    </div>
    <div class="mb-5" style="padding-left:30px;">
      <label class="form-label">Description</label>
      <textarea name="description"><?php echo isset($query->mota) ? $query->mota: ''; ?></textarea>
      <script type="text/javascript">
          CKEDITOR.replace("description");
      </script>
    </div>
    <div class="mb-5" style="padding-left:30px;">
      <label class="form-label">Detail information</label>
      <textarea name="detail"><?php echo isset($query->thongsochitiet) ? $query->thongsochitiet: ''; ?></textarea>
      <script type="text/javascript">
          CKEDITOR.replace("detail");
      </script>
    </div>

    <div class="mb-3" style="padding-left:30px;margin-top:20px;">
      <label class="form-label">Logo Image</label>
      <input class="form-control" type="file" id="formFile" name="photo" style="width:50%;">
    </div>
    <button type="submit" class="btn btn-secondary" name="submit" style="background-color:darkgray;margin-top:20px;border-radius:15px;color:white;margin-left:30px;">Submit</button>
</form>