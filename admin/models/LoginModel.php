<?php 
	trait LoginModel{
		public function modelLogin() {
			$email = $_POST["email"];
			$password = $_POST["password"];
			//mã hóa password
			$password = md5($password);
			//lấy biến kết nối
			$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->prepare("select hoten,email,password,quyen from tuser where 
				email =:var_email and password = :var_password");
			//thực thi truy vấn, truyền các biến
			$query->execute([":var_email"=>$email,":var_password"=>$password]);
			//lấy một bản ghi 
			$result = $query->fetch();
			if(isset($result->email) && $result->quyen==2){
				//đăng nhập thành công
				$_SESSION["admin_email"]  = $email;
				$_SESSION["admin_name"]  = $result->hoten;
				header("location:index.php");
			}else
				header("location:index.php?controller=login");
		}
	}
 ?>