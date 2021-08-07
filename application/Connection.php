<?php 
//kết nối csdl
//kết nối csdl sử dụng PDO, trả kết quả về biến kết nối
class Connection{
		public static function getInstance()
		{
			//kết nối csdl sử dụng PDO, trả kết quả về biến kết nối
			//new PDO("connect string","username","password")
			// $conn = new PDO("mysql:host=sql305.byethost15.com;dbname=b15_28931836_webbandongho","b15_28931836","Tung4321");
			$conn = new PDO("mysql:host=localhost;dbname=web_bandongho","root","");
			// lấy dữ liệu liệu theo kiểu unicode
			$conn->exec("set names utf8");
			// lấy kết quả trả về theo object
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $conn;
		}
	}
?>