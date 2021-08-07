<?php 
	trait BannerModel {
		//lấy tất cả bản ghi
		public function modelGetBanners($recordPerPage) {
			$totalRecord = $this->modelTotalRecord();
			$numPage = ceil($totalRecord/$recordPerPage);
			$page = isset($_GET["p"]) && $_GET["p"]>0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->query("select * from tbanner order by id desc limit $from, $recordPerPage");
			return $query->fetchAll();
		}
		//tính tổng số bản ghi
		public function modelTotalRecord() {
	  		$conn = Connection::getInstance();
	  		$query = $conn->query("select id from tbanner");
	  		return $query->rowCount();
  	    }
  	    //xóa banner nổi bật
  	    public function dropRemarkableBanner() {
  	    	$conn = Connection::getInstance();
  	    	$query = $conn->query("update tbanner set noibat = 0");
  	    }
  	    //tạo banner nổi bật 
  	    public function setRemarkableBanner($id) {
  	    	$conn = Connection::getInstance();
  	    	$query = $conn->prepare("update tbanner set noibat = 1 where id=:var_id");
	  		$query->execute(["var_id"=>$id]);
  	    }
	}
 ?>