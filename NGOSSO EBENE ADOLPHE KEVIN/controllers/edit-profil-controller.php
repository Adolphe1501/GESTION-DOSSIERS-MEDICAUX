<?php

$error = false;

if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0) {
    $user_id = (int) htmlentities($_REQUEST['user_id']);
    $user = get_user_by_id($user_id, $db);
   // die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');
  // header ("location:../views/edit-drh.php");
  //require "views/edit-personnel.php";
}

if (isset($_POST['submit_edit_profil'])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    $user_id = (int) htmlentities($_REQUEST['hidded_id']);
    $user = get_user_by_id($user_id, $db);


            if (empty($data['name']) || !is_string($data['name'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un nom valide !')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');

            } else {
                $data['name'] = htmlentities($data['name']);
            }
            if (empty($data['prenom']) || !is_string($data['prenom'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un prenom valide !')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');
            
            } else {
                $data['prenom'] = htmlentities($data['prenom']);
            }


            if (empty($data['pseudo']) || !is_string($data['pseudo'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un pseudo valide !')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');
            
            } else {
                $data['pseudo'] = htmlentities($data['pseudo']);
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrez un email valide !')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');
            
            } else {
                $data['email'] = htmlentities($data['email']);
            }
            if (  !is_string($data['password']) || !is_string($data['confirm_password']) || ($data['password'] !== $data['confirm_password'])) {
                $error = true;
                echo "<script language='javascript'>alert('veuillez entrer un mot de passe valide !')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');
            
            } else {
                if (strlen($data['password']) > 3)
                $data['password'] = htmlentities($data['password']);
            }

            if ($error === true || empty($data['numbercont1']) || empty($data['numbercont2'])) {
                echo "<script language='javascript'>alert('veuillez bien remplir tous les champs!')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil-patient">');

                //die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-drh?&nom=' . $data["nom"] . '&prenom=' . $data["prenom"] . '&email=' . $data["email"] . '&pseudo=' . $data["pseudo"] . '">');
 
               // require 'views/edit-drh.php';
            } else {
               update_profil($_SESSION['user_id'], $data , $db);
            }
        } 
    


