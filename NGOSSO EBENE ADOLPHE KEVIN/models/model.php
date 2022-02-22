<?php
function get_last_inserted_id($connect) {
    $request = $connect->query("SELECT last_insert_id() as last_id") or die(mysqli_error($connect));
    $result = mysqli_fetch_assoc($request);
    return $result['last_id'];
}

function date_formatter($date, $format = null) {
    $date_to_format = new DateTime($date);
    if ($format !== null) {
        return date_format($date_to_format, $format);
    } else {
        return date_format($date_to_format, 'l j F Y h:i:s A');
    }
}function upload_file($file, $destination) {

    if (isset($_FILES[$file]) AND $_FILES[$file]['error'] === 0) {

        if ($_FILES[$file]['size'] <= 2000000) {

            $infosphoto = pathinfo($_FILES[$file]['name']);
            $extension_img = $infosphoto['extension'];
            $ext_valid = array('jpg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'jpeg', 'JPG');

            if (in_array($extension_img, $ext_valid)) {

                return move_uploaded_file($_FILES[$file]['tmp_name'], $destination);
            } else {
                echo"<script language='javascript'>alert('Extension nom autorisée')</script>";
            }
        } else {
            echo"<script language='javascript'>alert('Image trop grande choisissez une autre')</script> ";
        }
    } else {
        echo"<script language='javascript'>alert('Veuillez charger cette image elle et erronee')</script> ";
    }
}
function list_image_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM images WHERE idUser='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function list_dossier_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM dossiermedical WHERE idUser='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function list_dossier_by_id_dossier($id, $connect){
    $result = $connect->query("SELECT * FROM dossiermedical WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function list_dossier( $connect){
    $result = $connect->query("SELECT * FROM dossiermedical ") or die(mysqli_error($connect));
    return $result;
}
function list_antecedent_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM `antecedentsmedicaux` WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}function list_consultation_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM consultation WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}function list_examen_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM examen WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}function list_hospitalisation_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM hospitalisation WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}function list_medicaments_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM medicamentsprescris WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function list_ordonance_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM ordonance WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}function list_soins_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM soins WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function list_sortie_by_id($id, $connect){
    $result = $connect->query("SELECT * FROM sortie WHERE idDossier='{$id}'") or die(mysqli_error($connect));
    return $result;
}
function add_image($data, $connect) {

    upload_file('image', "public/images/upload/" . $_FILES['image']['name']);
    $request = $connect->query("INSERT INTO images ( idUser, contenuImage,statutImage,isAvatar,createdAtImage) "
                    . "VALUES( '{$_SESSION['user_id']}', '{$_FILES['image']['name']}',1,1, now())") or die(mysqli_error($connect));
                    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil">');
                

    unset($_POST);
}
function add_image_patient($data, $connect) {

    upload_file('image', "public/images/upload/" . $_FILES['image']['name']);
    $request = $connect->query("INSERT INTO images ( idUser, contenuImage,statutImage,isAvatar,createdAtImage) "
                    . "VALUES( '{$_SESSION['user_id']}', '{$_FILES['image']['name']}',1,1, now())") or die(mysqli_error($connect));
                    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil">');

    unset($_POST);
}
function update_image($data , $connect){
    $id = $_SESSION['user_id'];
    upload_file('image', "public/images/upload/" . $_FILES['image']['name']);
    $request = $connect->query(" UPDATE `images` SET `contenuImage` = '{$_FILES['image']['name']}' WHERE `images`.`idUser` ='{$id}'  AND `images`.`isAvatar` = 1" )or die(mysqli_fetch_assoc($connect));
    die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-profil">');
    unset($_POST);
}
function update_image_patient($data , $connect){
    $id = $_SESSION['user_id'];
    upload_file('image', "public/images/upload/" . $_FILES['image']['name']);
    $request = $connect->query(" UPDATE `images` SET `contenuImage` = '{$_FILES['image']['name']}' WHERE `images`.`idUser` ='{$id}' AND `images`.`isAvatar` = 1" )or die(mysqli_fetch_assoc($connect));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/edit-profil">');
    unset($_POST);
}