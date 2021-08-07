<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
?>
<h1>Order List</h1>

<table class="table table-hover">
  <thead>
    <tr class="table_title">
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listRecord as $rows): ?>
	    <tr class="table_content brand_category">
	      <?php $user =  $this->modelGetUsers($rows->user_id); ?>
	      <td>
	         <?php echo $user->email; ?>	  
	      </td>
		  <td>
	      	<?php 
               $date = Date_create($rows->date);
               echo Date_format($date, "d/m/Y");
	      	?>	  
	      </td>
	      <td>
	      	 $<?php echo number_format($rows->gia); ?>	  
	      </td>
	      <td style="text-align: center;">
             <?php if($rows->tinhtrang == 1): ?>
                <span class="label label-primary">Đã giao hàng</span>
             <?php else: ?>
                <span class="label label-danger">Chưa giao hàng</span>
             <?php endif; ?>
         </td>
         <td style="text-align: center;">
            <a href="index.php?controller=order&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Detail</a>
            <?php if($rows->tinhtrang == 0): ?>
                <a href="index.php?controller=order&action=delivery&id=<?php echo $rows->id; ?>" class="label label-info">Giao hàng</a>
            <?php endif; ?>
         </td>
	    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
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