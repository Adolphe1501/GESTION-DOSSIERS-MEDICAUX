<?php

$error = false;

if (isset($_POST['submit_examen'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['natureExamen']) || !filter_var($data['natureExamen']) || empty($data['resultatExamen']) || empty($data['commentaireExamen'])|| empty($data['dateReceptionExamen'])|| empty($data['dateEnvoiExamen']) ) {
        $error = true;
        echo "<script language='javascript'>alert(' veuillez remplir tous les champs!!')</script>";

    }
    if ($error === true) {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  

        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/add-examen&natureExamen=' . $data["natureExamen"] . '&dossier_id='.$dossier_id.'">');
   
        //header("location:index.php?page=views/users/login/login&error=1&libelleConsultation=" . $data['libelleConsultation']);
    } else {
        if(isset($_REQUEST['dossier_id']) && $_REQUEST['dossier_id'] > 0 ):
            $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);  
            add_examen($dossier_id,$data, $db);
            die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/examens&dossier_id='.$dossier_id.' ">');
        else:    
         endif;
    }
}

