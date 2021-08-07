<?php 
  class AboutUsController extends Controller {

  	public  function index() {
  		//gọi view
  		$this->loadView("AboutUsView.php");
  	}
  }
?>