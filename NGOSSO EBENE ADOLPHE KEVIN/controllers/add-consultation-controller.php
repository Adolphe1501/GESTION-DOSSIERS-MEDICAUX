<?php

$error = false;

if (isset($_POST['submit_consultation'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['libelleConsultation']) || !filter_var($data['libelleConsultation']) || empty($data['observationConsultation']) ) {
        $error = true;
        echo "<script language='javascript'>alert(' veuillez remplir tous les champs!!')</script>";

    }
    if ($error === true) {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  

        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/add-consultation&libelleConsultation=' . $data["libelleConsultation"] . '&dossier_id='.$dossier_id.' ">');
   
        //header("location:index.php?page=views/users/login/login&error=1&libelleConsultation=" . $data['libelleConsultation']);
    } else {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  
        add_consultation($dossier_id,$data, $db);
        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/consultations&dossier_id='.$dossier_id.' ">');

    }
}

