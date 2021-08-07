<?php 
	trait DetailModel {
	    public function modelGetAWatch($id) {
     		$conn = Connection::getInstance();
			//truyền câu truy vấn
			$query = $conn->query("select * from tdongho where id = $id");
			return $query->fetch();
		}
		public function modelGetAWatch1($name) {
     		$conn = Connection::getInstance();
			$query = $conn->query("select * from tdongho where ten = '$name'");
			return $query->fetch();
		}
		public function modelGetStar($id) {
     		$conn = Connection::getInstance();
			$query = $conn->query("select * from tdanhgia where dongho_id = $id");
			return $query->fetch();
		}
        public function modelRating($id, $star) {
        	$count = $this->modelCheck($id);
        	$conn = Connection::getInstance();
        	if($count > 0) {
                $query = $conn->prepare("update tdanhgia set sao_$star= (sao_$star+1) where dongho_id=:var_id");
                $query->execute(["var_id"=>$id]);
            } else {
                $query = $conn->prepare("insert into tdanhgia set dongho_id=:var_dongho_id, sao_$star=1");
	            $query->execute(["var_dongho_id"=>$id]);
            }
        }
        public function modelCheck($id){
	      $conn = Connection::getInstance();
	      $query = $conn->query("select id from tdanhgia where dongho_id=$id");
	      return $query->rowCount();
	    }
	    public function buyNow($id) {			
		  $user_id = $_SESSION["user_id"];
		  $dongho = $this->modelGetAWatch($id);
		  $gia = $dongho->giaban;
          
          $conn = Connection::getInstance();
		  $query = $conn->prepare("insert into thoadon set user_id=:var_user_id, date=now(), gia=:var_gia");
		  $query->execute(array("var_user_id"=>$user_id,"var_gia"=>$gia));

		  //lay id vua moi insert
		  $hoadon_id = $conn->lastInsertId();
		  
		  $query = $conn->prepare("insert into tchitiethoadon set hoadon_id=:var_hoadon_id, dongho_id=:var_dongho_id, gia=:var_gia, soluong=1");
		   $query->execute(array("var_hoadon_id"=>$hoadon_id,"var_dongho_id"=>$dongho->id,"var_gia"=>$dongho->giaban));
	    }
	}
 ?>