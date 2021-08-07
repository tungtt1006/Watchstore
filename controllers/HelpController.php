<?php 
  include "models/HelpModel.php";

  class HelpController extends Controller {
  	//kế thừa class model
  	use HelpModel;
  	
  	public function index() {
  		//gọi view
  		$this->loadView("HelpView.php");
  	}
  }
?>