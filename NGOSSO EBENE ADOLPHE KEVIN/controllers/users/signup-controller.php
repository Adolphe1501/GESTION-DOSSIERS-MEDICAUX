<?php

$error = false;

if (isset($_POST['submit_signup'])) {
    
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;
  
    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_pseudo($data['pseudo'], $db) === 0) {

            if (empty($data['nom']) || !is_string($data['nom'])) {
                $error = true;
            } else {
                $data['nom'] = htmlentities($data['nom']);
            }
            if (empty($data['prenom']) || !is_string($data['prenom'])) {
                $error = true;
            } else {
                $data['prenom'] = htmlentities($data['prenom']);
            }


            if (empty($data['pseudo']) || !is_string($data['pseudo'])) {
                $error = true;
            } else {
                $data['pseudo'] = htmlentities($data['pseudo']);
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
            } else {
                $data['email'] = htmlentities($data['email']);
            }
            if (strlen($data['password']) < 4 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || ($data['password'] !== $data['confirm_password'])) {
                $error = true;
            } else {
                $data['password'] = htmlentities($data['password']);
            }

            if ($error === true) {
                echo "<script language='javascript'>alert('Mot de passe trop court!')</script>";

                die('<meta http-equiv="refresh" content="1 ; URL=views/signup/signup.php?&nom=' . $data["nom"] . '&prenom=' . $data["prenom"] . '&email=' . $data["email"] . '&pseudo=' . $data["pseudo"] . '">');
 
               // require 'views/signup/signup.php';
            } else {
                signup($data, $db);
            }
        } else {
           // $pseudo_error = "Ce pseudo est deja pris, choisissez un autre!";
            echo "<script language='javascript'>alert('Ce pseudo est deja pris, choisissez un autre!!')</script>";

            die('<meta http-equiv="refresh" content="1 ; URL=views/signup/signup.php?&nom=' . $data["nom"] . '&prenom=' . $data["prenom"] . '&email=' . $data["email"] . '&pseudo=' . $data["pseudo"] . '">');

            //require 'views/signup/signup.php';
        }
    } else {
       // $email_error = "Adresse email deja prise, choisissez une autre!";
        echo "<script language='javascript'>alert('Adresse email deja prise, choisissez une autre!')</script>";

        die('<meta http-equiv="refresh" content="1 ; URL=views/signup/signup.php?&nom=' . $data["nom"] . '&prenom=' . $data["prenom"] . '&email=' . $data["email"] . '&pseudo=' . $data["pseudo"] . '">');

        
       // require 'views/signup/signup.php';
    }
}

