<!DOCTYPE html>
<html lang="en">
<head>
	<title>KevHealth</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
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
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="../conseil-sante/css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="../conseil-sante/css/animate.css">

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
<body style="background-color: #999999;">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../../index.php?page=views/conseil-sante/home"><i class="flaticon-pharmacy"></i><span>Kev</span>Health</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

  </nav>	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/medecin6.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form method="POST" action="../../index.php?page=controllers/users/signup-controller" class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="nom" placeholder="Name..."  value="<?= $_GET['nom'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required" >
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="prenom" placeholder="Name..." value="<?= $_GET['prenom'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess..." value="<?= $_GET['email'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="pseudo" placeholder="Username..."  value="<?= $_GET['pseudo'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required: au moins 5 caractères">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" placeholder="*************" value="<?= $_GET['password'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="text" name="confirm_password" placeholder="*************"  value="<?= $_GET['password'] ?? '' ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit_signup" class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="../login/login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
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