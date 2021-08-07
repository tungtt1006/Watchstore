<?php 
	trait BrandsListModel {
	    public function modelGetWatches($hang_id) {
	    	$order = isset($_GET["order"]) ? $_GET["order"] : "";
            $sqlOrder = " order by id desc ";

            switch ($order) {
		        case "priceAsc":
		          $sqlOrder = " order by giaban asc ";
		          break;
		        case "priceDesc":
		          $sqlOrder = " order by giaban desc ";
		          break;
		        case "nameAsc":
		          $sqlOrder = " order by ten asc ";
		          break;
		        case "nameDesc":
		          $sqlOrder = " order by ten desc ";
		          break;
		        case "statusStocking":
		          $sqlOrder = " order by tinhtrang desc ";
		          break;
		        case "statusOutStock":
                  $sqlOrder = " order by tinhtrang asc ";
		          break;
		    }
		    $conn = Connection::getInstance();
            if($hang_id != 0) {
				$query = $conn->query("select * from tdongho where hang_id=$hang_id $sqlOrder");
		    } else {
		    	$query = $conn->query("select * from tdongho $sqlOrder");
		    }
			return $query->fetchAll();
		}
		public function modelGetBrands() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from thang where parent_id = 0");
			return $query->fetchAll();
		}
		public function modelGetAnotherBrands($id) {
			$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->query("select * from thang where parent_id = 0 and id != $id order by id desc limit 0,3");
			return $query->fetchAll();
		}
		public function modelGetWithGender($gender) {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tdongho where gioitinh = $gender");
			return $query->fetchAll();
		}
		public function modelGetABrand($id) {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tdongho where hang_id = $id");
			return $query->fetchAll();
		}
	}
 ?>