<?php 
	trait AccountModel{
		//ham dang ky nguoi dung
		public function modelRegister(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//---
			$conn = Connection::getInstance();
			//kiem tra neu email chua ton tai thi insert ban ghi
			$queryCheck = $conn->prepare("select email from tuser where email = :var_email");
			$queryCheck->execute(array("var_email"=>$email));
			if($queryCheck->rowCount() > 0)
				header("location:index.php");
			else {
				//insert ban ghi
				$query = $conn->prepare("insert into tuser set hoten=:var_name, email=:var_email, diachi=:var_address, password=:var_password");
				$query->execute(array("var_name"=>$name,"var_email"=>$email,"var_address"=>$address,"var_password"=>$password));
				header("location:index.php");
			}
		}
		public function modelLogin() {
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//---
			$conn = Connection::getInstance();
			$query = $conn->prepare("select id, hoten, email from tuser where email=:var_email and password=:var_password");
			$query->execute(array("var_email"=>$email,"var_password"=>$password));
			if($query->rowCount() > 0) {
				$result = $query->fetch();
					$_SESSION["user_id"] = $result->id;
					$_SESSION["user_name"] = $result->hoten;
					header("location:index.php");
			} //else
			// 	header("location:index.php?controller=account&action=login");
		}
		public function modelLogout(){
			unset($_SESSION["user_id"]);
			unset($_SESSION["user_name"]);
			header("location:index.php");
		}
	}
 ?>