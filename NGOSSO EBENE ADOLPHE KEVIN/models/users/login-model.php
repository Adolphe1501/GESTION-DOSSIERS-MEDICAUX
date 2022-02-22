<?php

function login( $array, $db) {
    $login = $array["registrationNumber"];
    $password = $array["password"];
    $request = $db->query("SELECT * FROM users WHERE registrationNumberUser='{$login}'") or die(mysqli_error($db));
 
    if (mysqli_num_rows($request) == 0) {
        echo "<script language='javascript'>alert('Utilisateur innexistant!')</script>";
        die('<meta http-equiv="refresh" content="1 ; URL=views/login/login.php?&registrationNumber=' . $array["registrationNumber"] . '">');

    } else {

        $result = mysqli_fetch_assoc($request);
         
        if (hash_equals(hash("SHA1", $password), $result["passwordUser"])) {
         

            if ($result['userStatus'] == true) {

                $val = 1;
                $_SESSION["hopital_id"] = $result["idHopital"];
                $_SESSION["addresse_id"] = $result["idAdresse"];
                $_SESSION["user_id"] = $result["idUser"];
                $_SESSION["user_nom"] = $result["nomUser"];
                $_SESSION["user_prenom"] = $result["prenomUser"];
                $_SESSION["user_pseudo"] = $result["pseudoUser"];
                $_SESSION["user_sexe"] = $result["sexeUser"];
                $_SESSION["user_phone"] = $result["telUser"];
                $_SESSION["user_fonction"] = $result["fonctionUser"];
                $_SESSION["user_email"] = $result["emailUser"];
                $_SESSION["user_birthday"] = $result["dateNaissanceUser"];
                $_SESSION["user_lieu_naiss"] = $result["lieuNaissanceUser"];
                $_SESSION["user_situation_matrimoniale"] = $result["situationMatrimonialeUser"];
                $_SESSION["user_number1"] = $result["numeroAContacter1"];
                $_SESSION["user_number2"] = $result["numeroAContacter2"];
                $_SESSION["user_groupeSanguain"] = $result["groupeSanguainUser"];
                $_SESSION["is_admin"] = $result["isAdmin"];
                $_SESSION["is_Drh"] = $result["isDrh"];
                $_SESSION["is_infirmiere"] = $result["isInfirmiere"];
                $_SESSION["is_medecin_chef"] = $result["isMedecinChef"];
                $_SESSION["is_medecin"] = $result["isMedecin"];
                $_SESSION["is_patient"] = $result["isPatient"];
                $_SESSION["registration_number"] = $result["registrationNumberUser"];
                $_SESSION["user_inscrit"] = $result["userSIgnedUpAt"];
                $id = $_SESSION["user_id"];
                
                $list_images = list_image_by_id($_SESSION['user_id'], $db);
                $image = mysqli_fetch_assoc($list_images);
                $list_dossiers= list_dossier_by_id($id,$db);
                $dossier = mysqli_fetch_assoc($list_dossiers);
                $_SESSION['user_dossier'] =$dossier['idDossier'];
                $_SESSION["user_avatar"]= $image["contenuImage"];
                if ($_SESSION["is_admin"] == true) {
                  // header("location:admin.php");
                 
                   die('<meta http-equiv="refresh" content="1 ; URL=admin.php?&login_success='.$val .'">');

                } else {
                    if ($_SESSION["is_Drh"] == true) {
                      //  header("location:drh.php");
                        die('<meta http-equiv="refresh" content="1 ; URL=index.php?&login_success='.$val .'">');
                    }else {
                         if ($_SESSION["is_infirmiere"] == true) {
                        //header("location:infirmiere.php");
                        die('<meta http-equiv="refresh" content="1 ; URL=index.php?&login_success='.$val .'">');

                    } else {if ($_SESSION["is_medecin_chef"] == true) {
                       // header("location:medecin-chef.php");
                       die('<meta http-equiv="refresh" content="1 ; URL=index.php?&login_success='.$val .'">');

                    } else {if ($_SESSION["is_medecin"] == true) {
                      //  header("location:medecin.php");
                      die('<meta http-equiv="refresh" content="1 ; URL=index.php?&login_success='.$val .'">');
                      
                    } else {if ($_SESSION["is_patient"] == true) {
                       // header("location:patient.php");
                        die('<meta http-equiv="refresh" content="1 ; URL=index.php?&login_success='.$val .'">');

                    }else {
                    header("location:index.php");
                } } } }}
                }
            } else {
               die('<meta http-equiv="refresh" content="1 ; URL=views/login/login.php?&registrationNumber=' . $array["registrationNumber"] . '">');
               // header("location:index.php?page=views/users/login/login&registrationNumber=" . $array['registrationNumber']);
            }
        } else {
            echo "<script language='javascript'>alert('Mot de passe incorrect!')</script>";
            die('<meta http-equiv="refresh" content="1 ; URL=views/login/login.php?&registrationNumber=' . $array["registrationNumber"] . '">');
           // header("location:index.php?page=views/users/login&error=1&registrationNumber=" . $array['registrationNumber']);
        }
    }
}
