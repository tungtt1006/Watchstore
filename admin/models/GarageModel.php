<?php 
	trait GarageModel {
		//lấy tất cả bản ghi
		public function modelGetWatches() {
			$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->query("select * from tdongho");
			return $query->fetchAll();
		}
		//Lấy một bản ghi
	    public function modelGetAWatch($id) {
	      //lấy biến kết nối 
	      $conn = Connection::getInstance();
	      $query = $conn->prepare("Select * from tdongho where id=:var_id");
	      $query->execute(["var_id"=>$id]);
	      //trả về một bản ghi
	      return $query->fetch();
	    }
	    //Thêm mới 1 hãng 
	    public function modelAddAWatch() {
	    	$watch_name = $_POST["watch_name"];
	    	$watch_sex = $_POST["watch_sex"];
	    	$watch_material = $_POST["watch_material"];
	    	$watch_size = $_POST["watch_size"];
            $watch_wtr = $_POST["watch_wtr"];
            $watch_status = $_POST["watch_status"];
            $watch_discount = $_POST["watch_discount"];
            $description = $_POST["description"];
            $detail = $_POST["detail"];

            $conn = Connection::getInstance();
	        $photo = "";
		    if($_FILES["photo"]["name"] != "") {       
		        $photo = time()."_".$_FILES["photo"]["name"];
		        move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/images/$photo");
		    }
	        $query = $conn->prepare("insert into tdongho set ten=:var_watch_name, gioitinh=:var_watch_sex, chatlieu=:var_watch_material, size=:var_watch_size, chongnuoc=:var_watch_wtr; tinhtrang=:var_watch_status; discount=:var_watch_discount; mota=:var_description; thongsochitiet=:var_detail; anh_url=:var_anh");
	        $query->execute(["var_car_name"=>$name,"var_car_engine"=>$parent_id,"var_car_acceleration","var_anh"=>$photo]);
	    }
	    //Update 1 hãng xe
	    public function modelUpdateABrand($id,$brandname,$image_url) {
	       $conn = Connection::getInstance();
	       //update cột name 
	       $query = $conn->prepare("update tdongho set ten=:var_name, anh_url=:var_anh where id=:var_id");
	       $query->execute(["var_id"=>$id,"var_name"=>$brandname,"var_anh"=>$image_url]);
	    }
	    //Xóa một hãng xe
	    public function modelDeleteABrand($id) {
	       //lấy biến kết nối 
		   $conn = Connection::getInstance();
		   //delete cột name 
		   $query = $conn->prepare("delete from thangxe where id=:var_id or parent_id=:var_id");
		   $query->execute(["var_id"=>$id]);
	    }
	    public function modelBrandCarsSub($id) {
	    	$conn = Connection::getInstance();
		    $query = $conn->query("select * from thangxe where parent_id = $id");
		    return $query->fetchAll();
	    }
	}
 ?>