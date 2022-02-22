<?php

$error = false;

if (isset($_POST['submit_hopital'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['nomHopital']) || !filter_var($data['nomHopital']) || empty($data['telHopital']) ) {
        $error = true;
        echo "<script language='javascript'>alert(' veuillez remplir tous les champs!!')</script>";

    }
    if(strlen($data['telHopital']) != 9){
        $error = true;
        echo "<script language='javascript'>alert(' numéro de téléphone incorrect !!')</script>";

    }
    if ($error === true) {

        die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/add-hopital&nomHopital=' . $data["nomHopital"] . '">');
   
        //header("location:index.php?page=views/users/login/login&error=1&nomHopital=" . $data['nomHopital']);
    } else {
        add_hopital($data, $db);
        die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/signup/add-medecin-chef">');

    }
}

