<?php 
	trait HomeModel {
		//lấy tất cả bản ghi
		public function modelGetBrands() {
			$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->query("select * from thang where parent_id = 0");
			return $query->fetchAll();
		}
		//Lấy một bản ghi
	    public function modelGetABrand($id) {
	      //lấy biến kết nối 
	      $conn = Connection::getInstance();
	      $query = $conn->prepare("Select * from thang where id=:var_id");
	      $query->execute(["var_id"=>$id]);
	      //trả về một bản ghi
	      return $query->fetch();
	    }
	    //Thêm mới 1 hãng 
	    public function modelCreateABrand($name, $parent_id) {
            $conn = Connection::getInstance();
	        $photo = "";
		    if($_FILES["photo"]["name"] != "") {       
		        $photo = time()."_".$_FILES["photo"]["name"];
		        move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/images/$photo");
		    }
	        $query = $conn->prepare("insert into thang set parent_id=:var_parent_id, ten=:var_name, anh_url=:var_anh");
	        $query->execute(["var_name"=>$name,"var_parent_id"=>$parent_id,"var_anh"=>$photo]);
	    }
	    //Update 1 hãng xe
	    public function modelUpdateABrand($id, $brandname) {
	       $conn = Connection::getInstance();
	       //update cột name 
	       $query = $conn->prepare("update thang set ten=:var_name where id=:var_id");
	       $query->execute(["var_id"=>$id,"var_name"=>$brandname]);

	       $photo = "";
	       if($_FILES["photo"]["name"] != "") {
		        $oldPhoto = $conn->query("select anh_url from thang where id=$id");
		        if($oldPhoto->rowCount() > 0){
		          $record = $oldPhoto->fetch();
		          //xoa anh
		          if($record->anh_url != "" && file_exists("../assets/images/".$record->anh_url))
		            unlink("../assets/images/".$record->anh_url);
		        }
		        $photo = time()."_".$_FILES["photo"]["name"];
		        move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/images/$photo");
		        $query = $conn->prepare("update thang set anh_url=:var_photo where id=$id");
		        $query->execute(array("var_photo"=>$photo));
	        }
	    }
	    //Xóa một hãng xe
	    public function modelDeleteABrand($id) {
	       //lấy biến kết nối 
		   $conn = Connection::getInstance();
		   $oldPhoto = $conn->query("select anh_url from thang where id=$id");
	       if($oldPhoto->rowCount() > 0) {
		        $record = $oldPhoto->fetch();
		        //xoa anh
		        if($record->anh_url != "" && file_exists("../assets/images/".$record->anh_url))
		          unlink("../assets/images/".$record->anh_url);
	       }
		   //delete cột name 
		   $query = $conn->prepare("delete from thang where id=:var_id or parent_id=:var_id");
		   $query->execute(["var_id"=>$id]);
	    }
	    public function modelBrandSub($id) {
	    	$conn = Connection::getInstance();
		    $query = $conn->query("select * from thang where parent_id = $id");
		    return $query->fetchAll();
	    }
	}
 ?>