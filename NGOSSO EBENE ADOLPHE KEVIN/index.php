<?php
 session_start();
 include "models/users/login-model.php";
 include "models/db.php";
 include "models/model.php";
 include "models/hopitaux/hopital-model.php";

 include "models/users/user-model.php";

if (isset ($_SESSION['is_admin']) && $_SESSION['is_admin']== true ):
    header('location:admin.php');

endif;

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>KevHealth</title>
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
    <link rel="stylesheet" href="./public/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">

    
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
<link rel="shortcut icon" type="image/x-icon" href="views/assets/img/logo.png">
<title>KevHealth</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="views/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="views/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="views/assets/css/style.css">
<!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet"  href="public/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./public/css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./public/css/style.css">
<link rel="stylesheet" href="public/sweetalert/package/dist/sweetalert2.min.css"> 

</head>

<body  class="body2 " style="margin-top: 100px;">


   <?php include("views/navbar.php"); ?>
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
  
  <script src="views/assets/js/jquery-3.2.1.min.js"></script>
	<script src="views/assets/js/popper.min.js"></script>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script src="views/assets/js/jquery.slimscroll.js"></script>
    <script src="views/assets/js/Chart.bundle.js"></script>
    <script src="views/assets/js/chart.js"></script>
    <script src="views/assets/js/app.js"></script>
    <script src="public/js/jquery-3.5.1.min.js"></script> 
  <script src="public/js/bootstrap/js/jquery-3.5.1.min.js" type=text/javascript></script> 


  <script src="public/js/bootstrap/js/bootstrap.min.js" type=text/javascript></script> 
  <script src="public/js/scripts.js" type=text/javascript></script> 

  <script src="public/datatables/jquery.dataTables.min.js"></script>
  <script src="public/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="public/sweetalert/package/dist/sweetalert2.min.js"></script>
  <?php if (isset($_GET['login_success']) && $_GET['login_success'] == 1) : ?>
          echo "<script>
                   Swal.fire('Vous vous êtes connectés avec succès! notez votre registration Number:   <?=$_SESSION['registration_number'] ?> ','','success');
                 </script>";
                 
    <?php endif; ?>
    <?php if (isset($_GET['update_doss_success']) && $_GET['update_doss_success'] == 1) : ?>
          echo "<script>
                   Swal.fire(' Le statut de votre dossier a bien été changé ','','success');
                 </script>";
                 
    <?php endif; ?>
  </body>
   </html>