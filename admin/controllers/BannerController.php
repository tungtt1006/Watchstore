<?php 
  include "models/BannerModel.php";

	class BannerController extends Controller {
		use BannerModel;

		public function index() {
			$recordPerPage = 4;
  	 	    $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			$query = $this->modelGetBanners($recordPerPage);
			//load view
			$this->loadView("BannerView.php",["query"=>$query,"numPage"=>$numPage]);
		}
		public function noibat() {
			$this->dropRemarkableBanner();
			$h = $_POST["banner_noibat"];
			for($i=0; $i < count($h); $i++) {
			    $this->setRemarkableBanner($h[$i]);
			}
			header("location:index.php?controller=banner"); 
        }
	}
 ?>