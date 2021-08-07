<?php
  include "models/AccountModel.php";
  class AccountController extends Controller {
  	use AccountModel;
 
  	public function registerPost() {
       $this->modelRegister();
  	}
  	public function loginPost() {
  		$this->modelLogin();
  	}
    public function login() {
      $this->loadView("LoginView.php");
    }
  	public function logout() {
  		$this->modelLogout();
  	}
  }
?>