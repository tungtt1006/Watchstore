<?php 
	//load file Layout.php
	$this->layoutPath = "Layout.php";
?>
<h1>Detail Order</h1>
<?php 
    $order = $this->modelGetOrders($id);
    $user = $this->modelGetUsers($order->user_id);
 ?>
<table class="table">
    <tr>
        <th style="width: 100px;">Name</th>
        <td><?php echo $user->hoten; ?></td>
    </tr>
    <tr>
        <th style="width: 100px;">Email</th>
        <td><?php echo $user->email; ?></td>
    </tr>
    <tr>
        <th style="width: 100px;">Price</th>
        <td><?php echo number_format($order->gia); ?></td>
    </tr>
    <tr>
        <th style="width: 100px;">Date</th>
        <td><?php echo $order->date; ?></td>
    </tr>
    <tr>
        <th style="width: 100px;">Status</th>
        <td>
            <?php if($order->tinhtrang == 0): ?>
                <span class="label label-danger">Chưa giao hàng</span>
            <?php else: ?>
                <span class="label label-primary">Đã giao hàng</span>
            <?php endif; ?>
        </td>
    </tr>
</table>
<!-- /thong tin -->
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 100px;">Photo</th>
        <th>Name</th>
        <th>Price</th>
        <th>Number</th>
    </tr>
    <?php foreach($data as $rows): ?>
        <?php 
            //lay ban ghi product tuong ung voi product_id
            $product = $this->modelGetProducts($rows->id);
         ?>
    <tr>
        <td style="text-align: center;"><img src="../assets/images/<?php echo $product->anh_url; ?>" style="width:100px;"></td>
        <td><?php echo $product->ten; ?></td>
        <td style="text-align: center;">$<?php echo number_format($rows->gia); ?></td>
        <td style="text-align: center;"><?php echo $rows->soluong; ?></td>
    </tr>
    <?php endforeach; ?>
</table>        