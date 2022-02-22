<?php

$error = false;

if (isset($_REQUEST['hopital_id']) && $_REQUEST['hopital_id'] > 0) {
    $hopital_id = (int) htmlentities($_REQUEST['hopital_id']);
    $hopital = get_hop_by_id($hopital_id, $db);
   // die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');

   require "views/edit-hopital.php";
}

if (isset($_POST['submit_edit_hopital'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    $hopital_id = (int) htmlentities($_REQUEST['hidded_id']);
    $hopital = get_hop_by_id($hopital_id, $db);

    if (check_hopital_name_on_update($data['nomHopital'], $db, $data['hidded_id']) === 0) {

        if (empty($data['nomHopital']) || !is_string($data['nomHopital']) || strlen($data['nomHopital']) > 100) {
            $error = true;
        } else {
            $data['nomHopital'] = htmlentities($data['nomHopital']);
        }

        if (empty($data['telHopital']) || !is_string($data['telHopital'])) {
            $error = true;
        } else {
            $data['telHopital'] = htmlentities($data['telHopital']);
        }

        if ($error === true) {
            //die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');
           require "views/edit-hopital.php";
        } else {
            update_hopital($data, $db);
        }
    } else {
        $hopital_name_error = "Ce nom de langage est deja pris, choisissez un autre!";
         // echo "<script language='javascript'>alert('Ce nom de langage est deja pris, choisissez un autre!!')</script>";
         //die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');
        require "views/edit-hopital.php";
    }
}

