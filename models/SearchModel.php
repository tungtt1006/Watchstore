<?php 
  trait SearchModel {
     public function modelAjax() {
        $key = isset($_GET["key"]) ? $_GET["key"] : "";
        //lay bien ket noi
        $conn = Connection::getInstance();
        $query = $conn->query("select * from tdongho where ten like '%$key%'");
        $result = $query->fetchAll();
        $strAppend = "";
        foreach($result as $rows) {
          $gia = number_format($rows->giaban);
          $strAppend = $strAppend."<li class='list-group-item'>
                    <a href='detail/$rows->id'>
                      <div class='row'>
                        <div class='col-3' style='padding:0;'>
                          <img src='assets/images/$rows->anh_url' class='img-fluid' style='width:100%;'>
                        </div>
                        <div class='col-9'><b>$rows->ten</b><br> <span style='color:#737373;font-size:15px;'>$$gia</span> </div>
                      </div>
                    </a></li>";
        }
        return $strAppend;
      }
      public function modelAjax1() {
        $key = isset($_GET["key"]) ? $_GET["key"] : "";
        //lay bien ket noi
        $conn = Connection::getInstance();
        $query = $conn->query("select ten from thang where parent_id = $key and gioitinh = 1");
        $result = $query->fetchAll();
        $strAppend = "";
        foreach($result as $rows)
          $strAppend = $strAppend."<div class='col-md-6 pt-2'>
                                     <a href='index.php?controller=detail&action=index1&name=$rows->ten' class='list_name_watch'>$rows->ten</a>
                                 </div>";
        return $strAppend;
      }
  }
 ?>


