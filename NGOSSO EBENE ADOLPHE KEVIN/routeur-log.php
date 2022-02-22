<?php
 session_start();
 








?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="views/conseil-sante/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="views/conseil-sante/css/animate.css">
    
    <link rel="stylesheet" href="views/conseil-sante/css/owl.carousel.min.css">
    <link rel="stylesheet" href="views/conseil-sante/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="views/conseil-sante/css/magnific-popup.css">

    <link rel="stylesheet" href="views/conseil-sante/css/aos.css">

    <link rel="stylesheet" href="views/conseil-sante/css/ionicons.min.css">

    <link rel="stylesheet" href="views/conseil-sante/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="views/conseil-sante/css/jquery.timepicker.css">

    

    
    <link rel="stylesheet" href="views/conseil-sante/css/flaticon.css">
    <link rel="stylesheet" href="views/conseil-sante/css/icomoon.css">
    <link rel="stylesheet" href="views/conseil-sante/css/style.css">

	<link rel="icon" type="image/png" href="views/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="views/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="views/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="views/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="views/login/css/main.css">

</head>

<body  class="body2 " style="margin-top: 100px;">


   <?php include("views/navbar-log.php"); ?>
   <?php
      if (isset($_REQUEST ['page'])){
          $page_to_load = $_REQUEST['page'].".php";
          if (file_exists($page_to_load)){
              include($page_to_load);
          }else{
                  include("views/404.php");
          }
      }else {
          include("views/conseil-sante/home.php");
      }

    ?>
   
   
  <?php include("views/footer.php"); ?>
  
  <script src="public/js/jquery-3.5.1.min.js"></script> 
  <script src="public/js/bootstrap/js/jquery-3.5.1.min.js" type=text/javascript></script> 


  <script src="public/js/bootstrap/js/bootstrap.js" type=text/javascript></script> 

  
  </body>
   </html>