<?php if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
    <div class="row pt-4 justify-content-center mx-0">
        <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login</strong> ou <strong>Mot de passe</strong> incorrect !.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(isset($_SESSION['user_registrationNumber']) || isset($_SESSION['user_email'])):
            if($_SESSION['is_admin'] != true):
              header ("location:admin.php");
            else:
               header("location: index.php?page =views/home");
            endif;
       endif;
	  ?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>sign in</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<link rel="stylesheet" href="../conseil-sante/css/owl.carousel.min.css">
<link rel="stylesheet" href="../conseil-sante/css/owl.theme.default.min.css">
<link rel="stylesheet" href="../conseil-sante/css/magnific-popup.css">

<link rel="stylesheet" href="../conseil-sante/css/aos.css">

<link rel="stylesheet" href="../conseil-sante/css/ionicons.min.css">

<link rel="stylesheet" href="../conseil-sante/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="../conseil-sante/css/jquery.timepicker.css">




<link rel="stylesheet" href="../conseil-sante/css/flaticon.css">
<link rel="stylesheet" href="../conseil-sante/css/icomoon.css">
<link rel="stylesheet" href="../conseil-sante/css/style.css">
    
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-white ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../../index.php?page=views/conseil-sante/home"><i class="flaticon-pharmacy"></i><span>Kev</span>Health</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

  </nav>	
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="../../index.php?page=controllers/users/login-controller">
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your registration number">
						<input class="input100" type="text" name="registrationNumber" placeholder="registrationNumber" value="<?= $_GET['registrationNumber'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?= $_GET['password'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							registrationNumber / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name= "submit_login" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

					     	<a href="../signup/signup.php" class="txt3">
					     		Sign up now
						    </a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>