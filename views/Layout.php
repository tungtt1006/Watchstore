<!DOCTYPE html>

<html>
    <head>
        <!-- <base href="http://tung123.byethost15.com/"> -->
        <base href="http://localhost/WatchStore_rewrite/">
        <title>Home | Gaara</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/Client/css/MainPage.css">
        <link rel="stylesheet" type="text/css" href="assets/Client/css/Header.css">
        <link rel="stylesheet" type="text/css" href="assets/Client/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>	
    </head>
    
    <body>
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/60ca02c57f4b000ac037ef6c/1f8ahllb9';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
      </script>
      <!--End of Tawk.to Script-->
    	<!--**** HEADER ****-->
      <?php include "views/HeaderView1.php"; ?>  
      <!--**** HEADER END****-->
        
        <!--**** PANEL ****-->
        <div class="container panel" style="margin-top: 65px;">
          <!--panel content-->
        	<div class="panel_content" >

               <?php echo $this->view; ?>
        	
          </div>
          <!--panel sidebar-->
        	<div class="panel_sidebar">
               <div class="row">
                    <div class="col-sm-12">
                          
                    </div>
               </div>
               <div class="row"> 
                    <div class="col-sm-12">
                        <div class="card text-center" style="border:none;">
                          <div class="card-body">
                            <?php if(isset($_SESSION["user_id"])): ?>
                                <h3>Hi, <?php echo $_SESSION["user_name"]; ?></h3>
                            <?php else: ?>
                                <a type="button" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                  Login
                                </a>
                                <a type="button" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                  Sign Up
                                </a>
                            <?php endif; ?>
                          </div> 
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#">
                                    Your Cart
                                    <span class="badge bg-danger garage">0</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="index.php?controller=news">News</a>
                            </li>
                            <li class="list-group-item">
                              <a href="index.php?controller=AboutUs">
                                    About Us
                              </a>
                            </li>
                            <li class="list-group-item">
                              <a href="index.php?controller=Help">
                                    Help
                              </a>
                            </li>
                            <?php if(isset($_SESSION["user_id"])): ?>
                              <li class="list-group-item">
                                  <a href="index.php?controller=account&action=logout">
                                      Logout
                                  </a>
                              </li>
                            <?php endif; ?>
                          </ul>
                        </div>
                    </div>
               </div> 
        	</div>
        </div>
        <!--**** PANEL END****-->


        <!--****  MODAL LOGIN **** -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="background-color:gray;">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" action="index.php?controller=account&action=loginPost">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" style="background-color:#6c757d;">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--****  MODAL SIGN UP **** -->
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" action="index.php?controller=account&action=registerPost">
                <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <label>Name</label>  
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                      </div>
                      <div class="col">
                        <label>Address</label>  
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword2">Re-enter password</label>
                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Re-enter password">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" style="background-color:#6c757d;">Sign up</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!--**** FOOTER ****-->
        <footer class="container-fuild mt-4 end">
            <div class="footer container pt-3">
               <div class="row">
                   <div class="col-xl-4">
                       <ul>
                           <li><h1>Our Store</h1></li>
                           <li><a href="">Ha Noi - Phone: 091111333</a></li>
                           <li><a href="">HCM - Phone: 091111333</a></li>
                       </ul>
                   </div>
                   <div class="col-xl-4">
                       <ul>
                           <li><h1>Our Policy</h1></li>
                           <li><a href="">Policies, general regulations</a></li>
                           <li><a href="">Shipping policy</a></li>
                           <li><a href="">Warranty Policy</a></li>
                           <li><a href="">Shipping policy</a></li>
                           <li><a href="">Policy for business</a></li>
                       </ul>
                   </div>
                   <div class="col-xl-4">
                       <h1 style="color:white;font-size:30px;font-weight:700;">Our Media</h1>
                       <ul class="list-group list-group-horizontal">
                           <li><a href="" style="font-size:35px;"><i class="fab fa-facebook"></i></a></li>&nbsp;&nbsp;&nbsp;
                           <li><a href="" style="font-size:35px;"><i class="fab fa-instagram"></i></a></i></li>&nbsp;&nbsp;&nbsp;
                           <li><a href="" style="font-size:35px;"><i class="fab fa-youtube"></i></a></i></li>
                       </ul>
                   </div>
               </div>
            </div>
        </footer>

<script type="text/javascript" src="assets/Client/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/Client/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="assets/Client/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/Client/js/MainPage.js"></script>
</body>   
</html>
   

