<?php 
	trait CartModel {
		public function cartAdd($id) {
		    if(isset($_SESSION['cart'][$id])) {
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['soluong']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from tdongho where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array (
		            'id' => $id,
		            'ten' => $product->ten,
		            'anh_url' => $product->anh_url,
		            'soluong' => 1,
		            'giaban' => $product->giaban,
		        );
		    }
		}
		public function cartNumber() {
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['soluong'];
		    }
		    return $number;
		}	
		public function cartUpdate($id, $number){
		    if($number == 0) {
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['soluong'] = $number;
		    }
		}
		public function cartDelete($id) {
		    unset($_SESSION['cart'][$id]);
		}
		public function cartDestroy() {
		    $_SESSION['cart'] = array();
		    header("location:index.php?controller=cart");
		}
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += ($product['giaban'] + $product['giaban'] * 0.1) * $product['soluong'];
		    }
		    return $total;
		}
		public function cartTax() {
			$taxes = 0;
		    foreach($_SESSION['cart'] as $product){
		        $taxes += ($product['giaban'] * 0.1) * $product['soluong'];
		    }
		    return $taxes;
		}
		public function cartCheckOut(){
			$conn = Connection::getInstance();			
			$user_id = $_SESSION["user_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$gia = $this->cartTotal();
			$query = $conn->prepare("insert into thoadon set user_id=:var_user_id, date=now(), gia=:var_gia");
			$query->execute(array("var_user_id"=>$user_id,"var_gia"=>$gia));
			//lay id vua moi insert
			$hoadon_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $product) {
				$query = $conn->prepare("insert into tchitiethoadon set hoadon_id=:var_hoadon_id, dongho_id=:var_dongho_id, gia=:var_gia, soluong=:var_soluong");
				$query->execute(array("var_hoadon_id"=>$hoadon_id,"var_dongho_id"=>$product["id"],"var_gia"=>$product["giaban"],"var_soluong"=>$product["soluong"]));
			}
			//xoa gio hang
			$_SESSION['cart'] = array();
		}
	}
 ?>