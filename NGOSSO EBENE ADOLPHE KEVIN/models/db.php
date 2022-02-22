<?php

$db = new mysqli("localhost:3306", "root", "", "kevhealth");

// Check connection
if (!$db) {
    echo 'Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
    exit();
}