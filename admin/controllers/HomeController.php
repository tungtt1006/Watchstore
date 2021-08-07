<?php 
    include "models/HomeModel.php";

	class HomeController extends Controller {
		use HomeModel;

		//hàm tạo 
		public function __construct() {
			//xác thực đăng nhập
			$this->authentication();
		}
		public function index() {
			$query = $this->modelGetBrands();
			//load view
			$this->loadView("HomeView.php",$query);
		}
		public function update() {
			$id = isset($_GET["id"]) && $_GET["id"]>0 ? $_GET["id"] : 0;
			$action = "index.php?controller=Home&action=updatePost&id=$id";
			$query = $this->modelGetABrand($id);
            $query1 = $this->modelGetBrands();
			//load view
			$this->loadView("UpdateBrandCarView.php",["query"=>$query, "query1"=>$query1, "action"=>$action]);
		}
		public function updatePost() {
	  	 	$id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
	        $brandname = $_POST["brand"];
	        $this->modelUpdateABrand($id, $brandname);
	  	 	header("location:index.php");
  	    }
		public function create() {
		  $action = "index.php?controller=home&action=createPost";
          $query1 = $this->modelGetBrands();
		  $this->loadView("UpdateBrandCarView.php",["action"=>$action,"query1"=>$query1]); 
		}
		public function createPost() {
  		  $brandname = $_POST["brand"];
	      $parent_id = $_POST["parent_id"];
	      $this->modelCreateABrand($brandname, $parent_id);
	      header("location:index.php");
		}
	    public function delete() {
	      $id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
	      $this->modelDeleteABrand($id);
	      header("location:index.php");
	    }
	}
 ?>