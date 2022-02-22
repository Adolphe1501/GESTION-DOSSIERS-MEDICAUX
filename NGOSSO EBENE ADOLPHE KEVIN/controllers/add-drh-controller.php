<?php

$error = false;

if (isset($_POST['submit_drh'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_pseudo($data['pseudo'], $db) === 0) {

            if (empty($data['name']) || !is_string($data['name'])) {
                $error = true;
            } else {
                $data['name'] = htmlentities($data['name']);
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

            if (empty($data['phone']) || !filter_var($data['phone'], FILTER_VALIDATE_INT)) {
                $error = true;
            } else {
                $data['phone'] = htmlentities($data['phone']);
            }

            if (strlen($data['password']) < 4 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || ($data['password'] !== $data['confirm_password'])) {
                $error = true;
            } else {
                $data['password'] = htmlentities($data['password']);
            }

            if ($error === true) {
                echo "<script language='javascript'>alert(' veuillez bien remplir tous les champs')</script>";
                require 'views/add-drh.php';
            } else {
                add_drh($_SESSION['hopital_id'], $data, $db);
                echo "<script language='javascript'>alert(' le drh a bien été ajouté !!')</script>";
                die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/drh">');

            }
        } else {
            $pseudo_error = "Ce pseudo est deja pris, choisissez un autre!";
            echo "<script language='javascript'>alert(' Ce pseudo est deja pris, choisissez un autre!')</script>";
            require 'views/add-drh.php';
        }
    } else {
        $email_error = "Adresse email deja prise, choisissez une autre!";
        require 'views/add-drh.php';
    }
}

