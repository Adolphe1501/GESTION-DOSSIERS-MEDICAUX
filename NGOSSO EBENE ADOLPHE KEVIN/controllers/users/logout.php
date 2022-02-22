<?php

 $_SESSION['user_pseudo'] = 'NULL';
 $_SESSION['user_email'] = 'NULL';
 session_unset();
 session_destroy();

 die('<meta http-equiv="refresh" content="1 ; URL=index.php">');

 //header('location:index.php');
 exit();


