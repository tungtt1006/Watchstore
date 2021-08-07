<?php 
  include "models/BrandsListModel.php";

  class BrandsListController extends Controller {
  	//kế thừa class model
  	use BrandsListModel;
  	
  	public function index() {
      $id = isset($_GET["id"]) ? $_GET["id"] : 0;

      $query = $this->modelGetWatches($id);
      $query1 = $this->modelGetAnotherBrands($id);
  		//gọi view
  		$this->loadView("BrandsListView.php",["query"=>$query,"id"=>$id,"query1"=>$query1]);
  	}
    public function gender() {
      $gender = isset($_GET["gender"]) ? $_GET["gender"] : 1;
      $id = 0;
      $query = $this->modelGetWithGender($gender);
      $query1 = $this->modelGetBrands();
      $this->loadView("GenderView.php",["query"=>$query,"query1"=>$query1,"id"=>$id]);
    }
    public function gender1() {
      $id = isset($_GET["id"]) ? $_GET["id"] : 0;

      $query = $this->modelGetABrand($id);
      $query1 = $this->modelGetBrands();
      $this->loadView("GenderView.php",["query"=>$query,"query1"=>$query1,"id"=>$id]);
    }
    public function gender2() {
       $id = isset($_GET["id"]) ? $_GET["id"] : 0;
       
       $query = $this->modelGetWatches($id);
       $query1 = $this->modelGetBrands();
       $this->loadView("GenderView.php",["query"=>$query,"query1"=>$query1,"id"=>$id]);
    }
  }
?>