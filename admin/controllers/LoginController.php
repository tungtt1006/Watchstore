<?php 
	//load file model
	include "models/LoginModel.php";
	
	class LoginController extends Controller {
		// kế thừa class LoginModel
		use LoginModel;

		public function index() {
			//load view
			$this->loadView("LoginView.php");	
		}
		//Khi ấn nút submit
		public function login() {
			$this->modelLogin();
		}
		//Khi ấn logout
		public function logout() {
			session_unset();
			header("location:index.php?controller=Login");
		}
	}
 ?>