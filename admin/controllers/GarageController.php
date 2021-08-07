<?php 
    include "models/GarageModel.php";

	class GarageController extends Controller {
		use GarageModel;

		public function index() {
			$query = $this->modelGetWatches();
			//load view
			$this->loadView("GarageView.php",$query);
		}
		public function update() {
			$id = isset($_GET["id"]) && $_GET["id"]>0 ? $_GET["id"] : 0;
			$action = "index.php?controller=garage&action=updatePost&id=$id";
			$query = $this->modelGetAWatch($id);
			//load view
			$this->loadView("UpdateCarView.php",["query"=>$query, "action"=>$action]);
		}
		public function updatePost() {
	  	 	$id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
            $brandname = $_POST["brand"];
            if ($_FILES['uploadFile']['name'] != NULL) {
               // Kiểm tra file up lên có phải là ảnh không
               if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
                     // Nếu là ảnh tiến hành code upload
                     $path = "../assets/images/"; // Ảnh sẽ lưu vào thư mục images
                     $tmp_name = $_FILES['uploadFile']['tmp_name'];
                     $name = $_FILES['uploadFile']['name'];
                     // Upload ảnh vào thư mục images
                     move_uploaded_file($tmp_name, $path . $name);
                     // $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                   // Insert ảnh vào cơ sở dữ liệu
                     $this->modelUpdateABrand($id,$brandname,$name);
                     header("location:index.php?controller=home");
                } else {
                    // Không phải file ảnh
                    echo "Kiểu file không phải là ảnh";
                }
            } else {
              echo "Bạn chưa chọn ảnh upload";
            }
	  	 	header("location:index.php");
	  	 }
		public function create() {
		   $action = "index.php?controller=garage&action=createPost";
       $query = $this->modelGetWatches();
		   $this->loadView("UpdateCarView.php",["action"=>$action,"query"=>$query]); 
		}
		public function createPost() {
      $this->modelAddAWatch();
      header("location:index.php");
		}
    public function delete() {
       $id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
       $this->modelDeleteABrand($id);
       header("location:index.php");
    }
	}
 ?>