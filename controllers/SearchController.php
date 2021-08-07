<?php
  include "models/SearchModel.php";

  class SearchController extends Controller {
  	 //kế thừa class SearchModel
  	 use SearchModel;
    
    //ajax search
     public function ajax() {
       $data = $this->modelAjax();
       echo $data;
     }
    //ajax động chỗ tên đồng hồ 
     public function ajax1() {
       $data = $this->modelAjax1();
       echo $data;
     }
  }
?>