<?php
  include "models/UserModel.php";

  class UserController extends Controller {
  	 //kế thừa class UsersModel
  	 use UserModel;

  	 public function index() {
  	 	//số bản ghi trên một trang
  	 	$recordPerPage = 4;
  	 	//tính số trang để truyền ra view
  	 	$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
  	 	//lấy dữ liệu
  	 	$data = $this->modelRead($recordPerPage);
  	 	//gọi view truyền dữ liệu ra view
  	 	$this->loadView("UserReadView.php",["numPage"=>$numPage,"data"=>$data]);
  	 }
  	 public function update() {
  	 	$id = isset($_GET["id"]) && $_GET["id"]>0 ? $_GET["id"] : 0;
  	 	//tạo biến $action để đưa vào thuộc tính action của thẻ form
  	 	$action = "index.php?controller=user&action=updatePost&id=$id";
  	 	//lấy dữ liệu
  	 	$record = $this->modelGetRecord($id);
  	 	//gọi view, truyền dữ liệu ra view
  	 	$this->loadView("UserCreateUpdateView.php",["record"=>$record,"action"=>$action]);
  	 }
  	 public function updatePost() {
  	 	$id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
  	 	$this->modelUpdate($id);
  	 	header("location:index.php?controller=user");
  	 }
  	 public function create() {
  	 	//tạo biến $action để đưa vào thuộc tính action của thẻ form
  	 	$action = "index.php?controller=user&action=createPost";
  	 	//gọi view, truyền dữ liệu ra view
  	 	$this->loadView("UserCreateUpdateView.php",["action"=>$action]); 
  	 }
  	 public function createPost() {
  	 	$this->modelCreate();
  	 	header("location:index.php?controller=user");
  	 }
  	 public function delete() {
  	 	$id = isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
  	 	$this->modelDelete($id);
  	 	header("location:index.php?controller=user");
  	 }
  }
?>