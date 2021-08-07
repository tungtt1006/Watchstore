<?php 
	trait NewsModel {
	  	public function modelRead($recordPerPage) {
	  		$category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : "";
            $sqlCategory = " danhmuc_id != 0 ";
		    switch ($category_id) {
		        case 1:
		          $sqlCategory = " danhmuc_id = 1 ";
		          break;
		        case 2:
		          $sqlCategory = " danhmuc_id = 2 ";
		          break;
		        case 3:
		          $sqlCategory = " danhmuc_id = 3 ";
		          break;
		        case 4:
		          $sqlCategory = " danhmuc_id = 4 ";
		          break;
		    }

	  		$totalRecord = $this->modelTotalRecord();
	  		$numPage = ceil($totalRecord/$recordPerPage);
	  		//lấy biến page truyền từ url
	  		$page = isset($_GET["p"]) && $_GET["p"]>0 ? $_GET["p"]-1 : 0;
	  		//lấy từ bản ghi nào 
	  		$from = $page * $recordPerPage;
	  		$conn = Connection::getInstance();
	  		$query = $conn->query("select * from ttintuc where $sqlCategory order by id desc limit $from, $recordPerPage");
	  		return $query->fetchAll();
	  	}
	  	//tính tổng số bản ghi
	  	public function modelTotalRecord() {
	  		$conn = Connection::getInstance();
	  		$query = $conn->query("select id from ttintuc where danhmuc_id != 0");
	  		return $query->rowCount();
	  	}
        public function modelGetCategories() {
        	$conn = Connection::getInstance();
	  		$query = $conn->query("select * from ttintuc where danhmuc_id = 0");
	  		return $query->fetchAll();
        }
        public function modelGetANew($id) {
        	$conn = Connection::getInstance();
	  		$query = $conn->query("select * from ttintuc where id = $id");
	  		return $query->fetch();
        }
        public function modelGetAnotherNews($id) {
            $conn = Connection::getInstance();
	  		$query = $conn->query("select * from ttintuc where id != $id order by id desc limit 0, 4");
	  		return $query->fetchAll();
        }
	}
 ?>