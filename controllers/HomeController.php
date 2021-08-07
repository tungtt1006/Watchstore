<?php 
  include "models/HomeModel.php";
  include "models/NewsModel.php";

  class HomeController extends Controller {
  	//kế thừa class model
  	use HomeModel;
    use NewsModel;
  	
  	public function index() {
  		//gọi view
  		$this->loadView("HomeView.php");
  	}
  }
?>