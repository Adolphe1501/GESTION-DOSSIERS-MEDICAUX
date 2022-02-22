<?php
 session_start();
 include "models/users/login-model.php";
 include "models/db.php";
 include "models/model.php";
 include "models/users/user-model.php";
 include "models/hopitaux/hopital-model.php";



 if(!isset($_SESSION['user_pseudo']) || !isset($_SESSION['user_email'])):
  header("location: index.php?page =views/users/login");
else:
if($_SESSION['is_admin'] != true):
   header ("location:index.php");
 endif;
endif;



?>


<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <title>KevHealth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      
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
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
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

<body>
<?php
     include("views/navbar-admin.php");
     include("views/dashboard.php");
     include("views/errors.php");


     ?>
     <div class="page-wrapper">
     <div class="content">
      <div class="main-wrapper ">

      <?php
        if (isset($_REQUEST ['page'])){
            $page_to_load = $_REQUEST['page'].".php";
            if (file_exists($page_to_load)){
                include($page_to_load);
            }else{
                    include("views/404.php");
            }
        }else {
            include("views/dashboard-admin/dashboard-admin.php");
        }

      ?>
     </div> 
     </div>
     </div>
   
   

    <div class="sidebar-overlay" data-reff=""></div>
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
    <?php if (isset($_GET['hop_success']) && $_GET['hop_success'] == 1) : ?>
          echo "<script>
                   Swal.fire("L'hôpital a été ajouté avec succès",'','success');
                 </script>";
    <?php endif; ?>
    <?php if (isset($_GET['del_hop_success']) && $_GET['del_hop_success'] == 1) : ?>
          echo "<script>
                   Swal.fire("L'hôpital a été supprimé avec succès",'','success');
                 </script>";
    <?php endif; ?>
</body>


<!-- index22:59-->
</html>