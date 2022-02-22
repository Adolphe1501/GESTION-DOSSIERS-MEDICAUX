<?php

$error = false;

if (isset($_REQUEST['personnel_id']) && $_REQUEST['personnel_id'] > 0) {
    $personnel_id = (int) htmlentities($_REQUEST['personnel_id']);
    $personnel = get_user_by_id($personnel_id, $db);
   // die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');
  // header ("location:../views/edit-drh.php");
  require "views/edit-personnel.php";
}

if (isset($_POST['submit_edit_personnel'])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    $personnel_id = (int) htmlentities($_REQUEST['hidded_id']);
    $personnel = get_user_by_id($personnel_id, $db);


            if (empty($data['name']) || !is_string($data['name'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un nom valide !')</script>";
            } else {
                $data['name'] = htmlentities($data['name']);
            }
            if (empty($data['prenom']) || !is_string($data['prenom'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un prenom valide !')</script>";
            } else {
                $data['prenom'] = htmlentities($data['prenom']);
            }


            if (empty($data['pseudo']) || !is_string($data['pseudo'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un pseudo valide !')</script>";
            } else {
                $data['pseudo'] = htmlentities($data['pseudo']);
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrez un email valide !')</script>";
            } else {
                $data['email'] = htmlentities($data['email']);
            }
            if (strlen($data['password']) < 4 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || ($data['password'] !== $data['confirm_password'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un mot de passe valide !')</script>";
            } else {
                $data['password'] = htmlentities($data['password']);
            }

            if ($error === true) {
                echo "<script language='javascript'>alert('veuillez bien remplir tous les champs!')</script>";

                //die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-drh?&nom=' . $data["nom"] . '&prenom=' . $data["prenom"] . '&email=' . $data["email"] . '&pseudo=' . $data["pseudo"] . '">');
 
               // require 'views/edit-drh.php';
            } else {
                if($personnel['isMedecin']= 1):
                    update_medecin($personnel_id,$_SESSION['hopital_id'],$data,$db);
                endif;
                if($personnel['isInfirmiere']= 1):
                    update_infirmiere($personnel_id,$_SESSION['hopital_id'],$data,$db);
                endif; 
                 if($personnel['isDrh']= 1):
                    update_drh($personnel_id,$_SESSION['hopital_id'],$data,$db);
                endif;
            }
        } 
    


