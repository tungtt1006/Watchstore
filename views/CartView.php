<?php 
  $this->layoutPath = "Layout.php";
?>
<?php if (isset($_SESSION["cart"]) == true): ?>
  <?php if($this->cartNumber() > 0): ?>
    <div class="container">
      <div class="row pt-5 pb-2"> 
        <form action="index.php?controller=cart&action=update" method="post">
          <table class="table table-hover table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Number</th>
                <th scope="col">Price</th>
                <th scope="col">Information</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($_SESSION['cart'] as $watch): ?> 
                  <tr>
                    <td>
                      <img src="assets/images/<?php echo $watch['anh_url']; ?>" alt="Fail" style="width:200px;">
                    </td>
                    <td>
                        <div class="input-group">
                         <input type="number" min="1" class="form-control text-center" value="<?php echo $watch['soluong']; ?>" name="watch_<?php echo $watch['id']; ?>" required="Không thể để trống" style="width:20px;">
                          <span class="input-group-text"> x $<?php echo number_format($watch['giaban']); ?></span>
                        </div> 
                    </td>
                    <td>$<?php echo number_format($watch['giaban'] * $watch['soluong']); ?></td>
                    <td>
                      <a href="" style="color:black;text-decoration:"><?php echo $watch['ten']; ?></a>     
                    </td>
                    <td>
                      <a href="index.php?controller=cart&action=delete&id=<?php echo $watch['id']; ?>" style="font-size:20px;color:black;"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
              <?php endforeach;?>
            </tbody>
            <tfoot>
              <tr>
                <td class="text-end ps-5" colspan="5" style="padding-top:20px;padding-bottom:20px;">
                  <a href="index.php?controller=cart&action=destroy" class="btn btn-danger">Delete All</a>&emsp; 
                  <a href="index.php" class="btn btn-secondary">Keep Buying</a>&emsp;
                  <input type="submit" class="btn" value="Update" style="background-color:lightgray;color:white;">
                </td>
              </tr>
            </tfoot>
          </table>
        </form>
      </div>
      <div class="row pb-2">
        <div class="col-8"></div>
        <div class="col-4 pt-2" style="border-left:1px solid lightgray;border-right:1px solid lightgray;border-top:1px solid lightgray;">
          <h4>TAXES: <b>$<?php echo number_format($this->cartTax()); ?></b></h4>
          <h4>TRANSPORT FEE:  <b>$100,000</b></h4>
          <h4>SERVICE FEE: <b>$100,000</b></h4>
          <h4>Discount: <b>$0</b></h4>
          <hr>
          <h2>TOTAL: <b>$<?php echo number_format($this->cartTotal()); ?></h2></b>
        </div>
      </div>
      <div class="row pb-3">
        <div class="col-8"></div>
        <div class="col-4 pb-2" style="border-left:1px solid lightgray;border-right:1px solid lightgray;border-bottom:1px solid lightgray;">
          <div class="d-grid gap-2">
            <a href="index.php?controller=cart&action=checkout" class="btn btn-lg" style="background-color:lightgray;color:white;font-size:25px;">PAY  <i class="fas fa-money-check-alt"></i></a>
          </div>
        </div>
      </div>  
    </div>
  <?php else: ?>
    <div class="container text-center" style="height: 400px;">
      <h1 class="mt-5">Your Cart Is Empty</h1>
       <a href="home" style="color:black;font-size:30px;">Return Home</a>  
    </div>
  <?php endif; ?>
<?php endif; ?>