<?php 
  include "models/CartModel.php";

  class CartController extends Controller {
  	//kế thừa class model
  	use CartModel;
  	
  	public function index() {
  		$this->loadView("CartView.php");
  	}
    // them san pham vao gio hang
    public function add(){
       $id = isset($_GET["id"]) ? $_GET["id"]: 0;
       // goi ham cartAdd để them sản phẩm vào giỏ hàng
       $this->cartAdd($id);
       header("location:cart");
    }

    public function update() {
      foreach($_SESSION["cart"] as $watch) {
        $id = $watch["id"];
        $soluong = $_POST["watch_$id"];
        // gọi hàm cập nhập số lượng
        $this->cartUpdate($id, $soluong);
      }
      header("location:index.php?controller=cart");
    }
    public function delete() {
       $id = isset($_GET["id"]) ? $_GET["id"]:0;
       $this->cartDelete($id);
       header("location:index.php?controller=cart");
    }
    public function destroy() {
      $this->cartDestroy();
      header("location:index.php?controller=cart");
    }
    public function checkout() {
      if(isset($_SESSION["user_id"]) == false) {
        header("location:index.php?controller=account&action=login");
      }
      else {
        $this->cartCheckOut();
        header("location:index.php?controller=cart");
      }
    }
  }
?>