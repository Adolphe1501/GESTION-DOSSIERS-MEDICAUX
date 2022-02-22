<?php

$error = false;

if (isset($_POST['submit_login'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['registrationNumber']) || !filter_var($data['registrationNumber']) || empty($data['password'])) {
        $error = true;
    }
  
    if ($error === true) {
        die('<meta http-equiv="refresh" content="1" ; URL=views/login/login.php?&error=1&registrationNumber=' . $array["registrationNumber"] . '">');
   
        //header("location:index.php?page=views/users/login/login&error=1&registrationNumber=" . $data['registrationNumber']);
    } else {
        login($data, $db);
    }
}

