<div class="container-fuild Header" style="z-index: 1;">
  	<div class="row">
  		<div class="col-xs-12 col-sm-12 col-md-2 col-xl-2">
              <span id="Header_logo"><a href="home">Tung</a></span>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-7 col-xl-6"> 
      	<ul class="Header_nav">
            <li>
                <a class="cate_title" href="">Men</a>
                <i class="fas fa-chevron-down"></i>
                <div class="sub_menu">
                  <div class="row">
                    <div class="col-md-4 pe-0">
                      <ul class="list-group list-group-flush sub_list">
                        <?php
                          $conn = Connection::getInstance();
                          $query = $conn->query("select * from thang where parent_id = 0");
                          $brands = $query->fetchAll();
                        ?>
                        <?php foreach($brands as $rows): ?>
                          <li class="list-group-item" id="<?php echo $rows->id; ?>">
                            <a href="brandsList/<?php echo $rows->id; ?>" class="name_brand"><?php echo $rows->ten; ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <div class="col-md-8 ps-3 pe-0">
                      <div class="row name_watch">

                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li>
                <a class="cate_title" href="">Women</a>
                <i class="fas fa-chevron-down"></i>
                <div class="sub_menu">
                    
                </div>
            </li>
            <li>
                <a class="cate_title" href="">Accessories</a>
                <i class="fas fa-chevron-down"></i>
                <div class="sub_menu">
                    <ul class="list-group list-group-flush sub_list">
                       
                    </ul>
                </div>
            </li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-7 col-xl-2 pt-3" style="position:relative;"> 
          <input type="text" id="key" placeholder="Search...">
          <button class="btn_button" type="button"><i class="fas fa-search"></i></button>
          <div class="smart_search">
            <ul class="list-group list-group-flush">
               
            </ul>
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-1 col-xl-2">
          <span><i class="fas fa-bars Header_btnsidebar"></i></span>   
      </div>
      </div>
</div>
<script type="text/javascript" src="assets/Client/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
   <?php foreach($brands as $rows): ?>
    $(document).ready(function() {
      $("#<?php echo $rows->id; ?>").hover(function() {
         $.ajax({
          url: "index.php?controller=search&action=ajax1&key=<?php echo $rows->id; ?>",
          success: function(result) {
            $( ".name_watch" ).empty();
            $( ".name_watch" ).append(result);
          }
        }); 
      });
    });
  <?php endforeach; ?> 

  $(document).ready(function() {
    $("#key").keyup(function() {
      var key = $("#key").val();
      if(key != "") {
        $(".smart_search").attr("style","display:flex;");
        $.ajax({
          url: "index.php?controller=search&action=ajax&key="+key,
          success: function(result) {
            $( ".smart_search ul" ).empty();
            $( ".smart_search ul" ).append(result);
          }
        });
      }
      else
        $(".smart_search").attr("style","display:none;");
    });
  });
</script>