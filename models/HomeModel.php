<?php 
	trait HomeModel {
		//lấy tất cả các hãng 
		public function modelGetBrands() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from thang where parent_id = 0");
			return $query->fetchAll();
		}
		//lấy 4 sp nổi bật
	    public function modelGetWatches($hang_id) {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tdongho where hang_id=$hang_id order by id desc limit 0,4");
			return $query->fetchAll();
		}
		public function modelGetDisplayedBanners() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tbanner where noibat = 1 order by id desc limit 0,4");
			return $query->fetchAll();
		}
		public function modelGetDisplayedNews() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from ttintuc where display = 1 order by id desc limit 0,3");
			return $query->fetchAll();
		}
	}
 ?>