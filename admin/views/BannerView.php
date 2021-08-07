<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
 ?>
<h1>Banners</h1>
<form action="index.php?controller=banner&action=noibat" method="post">
	<div class="row">
	  <?php foreach($query as $rows): ?>	
		  <div class="col-sm-6 col-md-3">
		    <div class="thumbnail">
		      <img src="../assets/images/<?php echo $rows->anh_url; ?>" alt="...">
		      <div class="caption">
		        <h3><?php echo $rows->tieude; ?></h3>
		        <p><?php echo $rows->chitiet; ?></p>
		        <p class="text-center">
		           <a href="#" class="btn" role="button" style="background-color:lightgray;color:white">Edit</a> 	&nbsp;	&nbsp;
		           <a href="#" class="btn btn-default" role="button">Delete</a>
		        </p>
		        <p class="text-right" style="padding-top:10px;">
		        	<input type="checkbox" id="<?php echo $rows->id; ?>" name="banner_noibat[]" value="<?php echo $rows->id; ?>" <?php echo $rows->noibat ? "checked":""; ?> >
		        	<label for="<?php echo $rows->id; ?>" style="font-weight:400;">set highlight</label>
		        </p>
		      </div>
		    </div>
		  </div>
	  <?php endforeach; ?>
	</div>

	<div class="row text-center">
		<nav aria-label="Page navigation">
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <?php for($i = 1; $i <= $numPage; $i++): ?>
		        <li class="page-item">
		          <a href="index.php?controller=banner&p=<?php echo $i; ?>" class="page-link">
		          <?php echo $i; ?></a>
		        </li>
		    <?php endfor; ?>
		    <li>
			    <a href="#" aria-label="Next">
			       <span aria-hidden="true">&raquo;</span>
			    </a>
		    </li>
		  </ul>
		</nav>
	</div>
	<input class="btn btn-default" type="submit" value="Set Hightlight Banner" style="background-color:darkgray;color:white;">
</form>