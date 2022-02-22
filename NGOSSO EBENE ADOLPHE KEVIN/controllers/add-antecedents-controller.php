<?php

$error = false;

if (isset($_POST['submit_antecedent'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['libelleAntecedent']) || !filter_var($data['libelleAntecedent']) || empty($data['observationAntecedent']) ) {
        $error = true;
        echo "<script language='javascript'>alert(' veuillez remplir tous les champs!!')</script>";

    }
    if ($error === true) {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  

        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/add-antecedents&libelleAntecedent=' . $data["libelleAntecedent"] . '&dossier_id='.$dossier_id.'">');
   
        //header("location:index.php?page=views/users/login/login&error=1&libelleAntecedent=" . $data['libelleAntecedent']);
    } else {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  
        add_antecedent($dossier_id,$data, $db);
        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/list-antecedent-medicaux&dossier_id='.$dossier_id.' ">');

    }
}

