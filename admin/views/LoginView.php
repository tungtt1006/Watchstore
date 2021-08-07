<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<style>
		body {
			background-color: lightgray;
		}
		.body {
			padding-bottom: 50px;
		}
		input.text {
           height: 50px;
		}
		input.btn_login {
           background-color: darkgray;
           color: white;
           font-size: 20px;
           padding: 5px 30px;
		}
		.forgot_pass {
		   color: black;
		}
		.forgot_pass:hover {
		   color: black;
		}
		i {
		   font-size: 30px;
		}
	</style>
</head>
<body>
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel" style="border:1px solid darkgray;">
				<div class="panel-heading text-center" >
				   <h1 style="color:black;font-weight:900;">Login</h1>
				</div>
				<div class="panel-body text-center body">
				  <form method="post" action="index.php?controller=login&action=login">
					<div class="row" style="margin-top:5px;padding-left:75px;">
						<div class="col-md-10">
							<input type="email" name="email" class="form-control text" placeholder="Email" required>
						</div>
					</div>
					<div class="row" style="margin-top:15px;padding-left:75px;">
						<div class="col-md-10">
							<input type="password" name="password" class="form-control text"  placeholder="Password" required>
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-5"></div>
						<div class="col-md-7">
						  <a class="forgot_pass" href="#">Forgot Password?</a>
                        </div>
					</div>
					<div class="row" style="margin-top:50px;">
						<div class="col-md-12">
							<input type="submit" value="Login" class="btn btn_login"> 
						</div>
					</div>
				  </form>
				</div>
				<div class="panel-footer text-center">
					<i class="fab fa-facebook" style="color:#0000ff;"></i>
					 &emsp;
					<i class="fab fa-google" style="color:#DB4437;"></i>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>