<?php 
	include "models/OrderModel.php";

	class OrderController extends Controller {
		use OrderModel;

		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 25;
			//tinh so trang
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			//goi ham de lay du lieu
			$listRecord = $this->modelRead($recordPerPage);
			//load view
			$this->loadView("OrderView.php",["listRecord"=>$listRecord,"numPage"=>$numPage]);
		}	
		//xac nhan da giao hang
		public function delivery() {
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de thuc hien
			$this->modelDelivery($id);
			//di chuyen den trang danh sach cac ban ghi
			echo "<script>location.href='index.php?controller=order';</script>";
		}	
		//chi tiet don hang
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$data = $this->modelListOrderDetails($id);
			//load view
			$this->loadView("OrderDetailView.php",["data"=>$data,"id"=>$id]);
		}
	}
 ?>