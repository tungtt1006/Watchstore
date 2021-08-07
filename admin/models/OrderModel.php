<?php 
	trait OrderModel {
		//ham liet ke danh sach cac ban ghi, co phan trang
		public function modelRead($recordPerPage) {
			$total = $this->modelTotal();
			$numPage = ceil($total/$recordPerPage);
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from thoadon order by id,tinhtrang desc limit $from, $recordPerPage");
			//tra ve tat ca cac ban truy van duoc
			return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select id from thoadon");
			//lay tong so ban ghi
			return $query->rowCount();
			//---
		}
		public function modelGetOrders($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from thoadon where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//lay mot ban ghi trong table customers		
		public function modelGetUsers($id) {
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tuser where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//lay mot ban ghi trong table products		
		public function modelGetProducts($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tdongho where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//xac nhan da giao hang
		public function modelDelivery($id){
			//---
			$conn = Connection::getInstance();
			$conn->query("update thoadon set tinhtrang = 1 where id = $id");
		}
		//lay danh sach cac san pham trong talbe orderdetails
		public function modelListOrderDetails($id) {
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tchitiethoadon where hoadon_id = $id");
			return $query->fetchAll();
			//---
		}
	}
 ?>