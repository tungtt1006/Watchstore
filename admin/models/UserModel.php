<?php
  trait UserModel {
  	//lấy các bản ghi có phân trang 
  	//$recordPerPage -> số bản ghi trên 1 trang
  	public function modelRead($recordPerPage) {
       //lấy tổng các bản ghi
  		$totalRecord = $this->modelTotalRecord();
  		//tính số trang
  		//hàm ceil là hàm lấy trần. VD: ceil(2.2) = 3
  		$numPage = ceil($totalRecord/$recordPerPage);
  		//lấy biến page truyền từ url
  		$page = isset($_GET["p"]) && $_GET["p"]>0 ? $_GET["p"]-1 : 0;
  		//lấy từ bản ghi nào 
  		$from = $page * $recordPerPage;
  		//lấy biến kết nối 
  		$conn = Connection::getInstance();
  		$query = $conn->query("select * from tuser order by id desc limit $from, $recordPerPage");
  		//trả về tất cả các bản ghi
  		return $query->fetchAll();
  	}
  	//tính tổng số bản ghi
  	public function modelTotalRecord() {
  		//lấy biến kết nối
  		$conn = Connection::getInstance();
  		$query = $conn->query("select id from tuser");
  		//trả về tổng số bản ghi đếm được
  		return $query->rowCount();
  	}
    //Lấy một bản ghi
    public function modelGetRecord($id) {
      //lấy biến kết nối 
      $conn = Connection::getInstance();
      $query = $conn->prepare("Select * from tuser where id=:var_id");
      $query->execute(["var_id"=>$id]);
      //trả về một bản ghi
      return $query->fetch();
    }
    public function modelUpdate($id) {
       $name = $_POST["name"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       //lấy biến kết nối 
       $conn = Connection::getInstance();
       //update cột name 
       $query = $conn->prepare("update tuser set hoten=:var_name where id=:var_id");
       $query->execute(["var_id"=>$id,"var_name"=>$name]);
       //nếu password không rỗng thì update password
       if($password != "") {
           //mã hóa password
          $password = md5($password);
          $query = $conn->prepare("update tuser set password=:var_password where id=:var_id");
          $query->execute(["var_id"=>$id,"var_password"=>$password]);
       }
    }
    public function modelCreate() {
       $name = $_POST["name"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       //mã hóa password
       $password = md5($password);
       //lấy biến kết nối 
       $conn = Connection::getInstance();
       //update cột name 
       $query = $conn->prepare("insert into tuser set hoten=:var_name, email=:var_email, password=:var_password");
       $query->execute(["var_password"=>$password,"var_name"=>$name,"var_email"=>$email]);
    }
    public function modelDelete($id) {
      //lấy biến kết nối 
      $conn = Connection::getInstance();
      //delete cột name 
      $query = $conn->prepare("delete from tuser where id=:var_id");
      $query->execute(["var_id"=>$id]);
    }
  }
?>