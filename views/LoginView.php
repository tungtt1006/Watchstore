<?php 
  $this->layoutPath = "Layout.php";
?>
<style>
  .login_form {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .title_form {
    font-family: Gilroy-Light;
    font-weight: 700;
  }
  .input_form {
    border: none;
    width: 90%;
    border-radius: 0;
    border-bottom: 1px solid gray;
  }
  .input_form:focus {
    box-shadow: none;
    border: 1px solid white;
  }
  .remember {
    font-weight: 500;
  }
  .btnLog {
    background-color:#6c757d;
    border-radius: 10;
    padding: 10px 50px;
    border: 1px solid white;
  }
  .btnLog:hover {
    background-color:#6c757d;
    border: 1px solid black;
  }
  .btnLog:focus {
    background-color:#6c757d;
    box-shadow: none;
    outline: none;
  } 
  .signUp {
    text-decoration: none;
    color: darkgray;
  }
  .social i {
    font-size: 30px;
  }
</style>
<div class="container text-center mt-4">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6" > 
      <h1 class="mb-4 title_form">Login</h1>
      <form class="login_form pt-5" method="post" action="index.php?controller=account&action=loginPost">
          <div class="form-group ms-5">
            <input type="email" class="form-control form-control-lg input_form" aria-describedby="emailHelp" placeholder="Email" name="email" required>
          </div>
          <div class="form-group mt-4 ms-5">
            <input type="password" class="form-control form-control-lg input_form" placeholder="Password" name="password" required>
          </div>
          <br>
          <div class="form-check text-end me-5">
            <input type="checkbox"> <span class="remember">Rememmer Me</span>
          </div>
          <button type="submit" class="btn btn-primary mt-4 btnLog">Login</button><br><br>
          <a href="#" class="signUp">Sign up if don't have account</a>
          <div class="pb-3 mt-5 social">
             <i class="fab fa-facebook"></i>&nbsp;&nbsp;
             <i class="fab fa-instagram"></i>&nbsp;&nbsp;
             <i class="fab fa-google"></i>
          </div>
      </form>
    </div>
  </div>
</div>

