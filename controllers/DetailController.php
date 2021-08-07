<?php 
  include "models/DetailModel.php";

  class DetailController extends Controller {
  	//kế thừa class model
  	use DetailModel;
  	
  	public function index() {
  		$id = isset($_GET["id"]) ? $_GET["id"]: 0;
  		$query = $this->modelGetAWatch($id);
  		$this->loadView("DetailView.php",["query"=>$query]);
  	}
    public function index1() {
      $name = isset($_GET["name"]) ? $_GET["name"]: "";
      $query = $this->modelGetAWatch1($name);
      $this->loadView("DetailView.php",["query"=>$query]);
    }
    public function rating() {
      $star = isset($_GET["star"]) ? $_GET["star"]: 0;
      $id = isset($_GET["id"]) ? $_GET["id"]: 0;
      $this->modelRating($id, $star);
      header("location:index.php?controller=detail&id=$id");
    }
    public function buy() {
      if(isset($_SESSION["user_id"]) == false) {
        header("location:index.php?controller=account&action=login");
      }
      else {
        $id = isset($_GET["id"]) ? $_GET["id"]: 0;
        $this->buyNow($id);
        header("location:index.php?controller=detail&id=$id");
      }
    }
  }
?>