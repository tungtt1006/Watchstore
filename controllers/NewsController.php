<?php 
  include "models/NewsModel.php";

  class NewsController extends Controller {
  	//kế thừa class model
  	use NewsModel;
  	
  	public function index() {
      $recordPerPage = 9;
      //tính số trang để truyền ra view
      $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
      //lấy dữ liệu
      $data = $this->modelRead($recordPerPage);
      $data1 = $this->modelGetCategories();
      $this->loadView("NewsView.php",["numPage"=>$numPage,"data"=>$data,"data1"=>$data1]);
  	}
    public function detail() {
       $id = isset($_GET["id"]) ? $_GET["id"] : 0;
       $query = $this->modelGetANew($id);
       $this->loadView("NewsDetailView.php",["query"=>$query]);
    }
  }
?>