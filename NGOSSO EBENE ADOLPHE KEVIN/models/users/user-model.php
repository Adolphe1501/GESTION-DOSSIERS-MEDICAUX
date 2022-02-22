<?php


function check_user_email($email, $db) {
    $result = $db->query("SELECT * FROM users WHERE emailUser='{$email}'") or die(mysqli_error($db));
    return mysqli_num_rows($result);
}

function check_user_pseudo($pseudo, $db) {
    $result = $db->query("SELECT * FROM users WHERE pseudoUser='{$pseudo}'") or die(mysqli_error($db));
    return mysqli_num_rows($result);
}

function registration_number_member($db):string{
    $result = $db->query("SELECT MAX(idUser) as max_id FROM users where isPatient=1") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    $max['max_id'] = $max['max_id']+1;
    $regist_number='PA'.$max['max_id'];
    return $regist_number;
}
function registration_number_drh($db):string{
    $result = $db->query("SELECT MAX(idUser) as max_id FROM users where isDrh=1") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    $max['max_id'] = $max['max_id']+1;
    $regist_number='DRH'.$max['max_id'];
    return $regist_number;
}
function registration_number_medecin($db):string{
    $result = $db->query("SELECT MAX(idUser) as max_id FROM users where isDrh=1") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    $max['max_id'] = $max['max_id']+1;
    $regist_number='ME'.$max['max_id'];
    return $regist_number;
}
function registration_number_infirmiere($db):string{
    $result = $db->query("SELECT MAX(idUser) as max_id FROM users where isDrh=1") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    $max['max_id'] = $max['max_id']+1;
    $regist_number='INF'.$max['max_id'];
    return $regist_number;
}
function registration_number_medecin_chef($db):string{
    $result = $db->query("SELECT MAX(idUser) as max_id FROM users where isMedecinChef=1") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    $max['max_id'] = $max['max_id']+1;
    $regist_number='MEC'.$max['max_id'];
    return $regist_number;
}
function signup($data, $db) {
    $password = sha1($data['password']);
    $reg =	registration_number_member($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("INSERT INTO `users` ( `idHopital`, `idAdresse`, `registrationNumberUser`, `pseudoUser`, `passwordUser`, `nomUser`, `prenomUser`, `sexeUser`, `telUser`, `dateNaissanceUser`, `lieuNaissanceUser`, `nationaliteUser`, `fonctionUser`, `emailUser`, `situationMatrimonialeUser`, `numeroAContacter1`, `numeroAContacter2`, `groupeSanguainUser`, `isAdmin`, `isDrh`, `isInfirmiere`, `isMedecinChef`, `isMedecin`, `isPatient`, `userStatus`, `userSIgnedUpAt`)
                          VALUES (NULL, NULL, '{$data['registrationNumber']}', '{$data['pseudo']}', '$password', '{$data['nom']}', '{$data['prenom']}',NULL, NULL, NULL, NULL, NULL, NULL, '{$data['email']}', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 1, now())")
            or die(mysqli_error($db));
    login($data, $db);
}

function block_user($user,$status){
    $user['userStatus']=0;

}
function activate_user($user){
    $user['userStatus']=1;

}
function get_adresse_by_id($user_id, $db) {
    $result = $db->query("SELECT * FROM adresse WHERE idAdresse='{$user_id}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}
function get_user_by_id($user_id, $db) {
    $result = $db->query("SELECT * FROM users WHERE idUser='{$user_id}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}
function list_DRH($db) {
    $result = $db->query("SELECT * FROM users WHERE isDrh = 1 ") or die(mysqli_error($db));
    return $result;
}
function list_personnel($db, $id) {
    $result = $db->query("SELECT * FROM users WHERE idHopital ='{$id}' AND isDrh = 1 OR isMedecin = 1 OR isInfirmiere = 1  ") or die(mysqli_error($db));
    return $result;
}
function get_ordonance_by_id($id, $db) {
    $result = $db->query("SELECT * FROM ordonance WHERE idOrdonance='{$id}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}
function update_drh($id,$hopitalId,$data, $db) {
    $password = sha1($data['password']);
    $reg =	registration_number_drh($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("UPDATE `users` SET `idHopital` = '{$hopitalId}', `idAdresse`=NULL, `registrationNumberUser`='{$data['registrationNumber']}', `pseudoUser`='{$data['pseudo']}', `passwordUser`='{$password}', `nomUser`='{$data['name']}', `prenomUser`='{$data['prenom']}', `sexeUser`='{$data['gender']}', `telUser`='{$data['phone']}', `dateNaissanceUser`='{$data['birthday']}', `lieuNaissanceUser`=NULL, `nationaliteUser`=NULL, `fonctionUser`='DRH', `emailUser`='{$data['email']}', `situationMatrimonialeUser`=NULL, `numeroAContacter1`=NULL, `numeroAContacter2`=NULL, `groupeSanguainUser`=NULL, `isAdmin`=0, `isDrh`=1, `isInfirmiere`=0, `isMedecinChef`=0, `isMedecin`=0, `isPatient`=1, `userStatus`=1, `userSIgnedUpAt` =now() WHERE `users`.idUser ='{$id}'") or die(mysqli_error($db));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/drh&update_success=1">');

}
function update_medecin($id,$hopitalId,$data, $db) {
    $password = sha1($data['password']);
    $reg =	registration_number_medecin($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("UPDATE `users` SET `idHopital` = '{$hopitalId}', `idAdresse`=NULL, `registrationNumberUser`='{$data['registrationNumber']}', `pseudoUser`='{$data['pseudo']}', `passwordUser`='{$password}', `nomUser`='{$data['name']}', `prenomUser`='{$data['prenom']}', `sexeUser`='{$data['gender']}', `telUser`='{$data['phone']}', `dateNaissanceUser`='{$data['birthday']}', `lieuNaissanceUser`=NULL, `nationaliteUser`=NULL, `fonctionUser`='DRH', `emailUser`='{$data['email']}', `situationMatrimonialeUser`=NULL, `numeroAContacter1`=NULL, `numeroAContacter2`=NULL, `groupeSanguainUser`=NULL, `isAdmin`=0, `isDrh`=0, `isInfirmiere`=0, `isMedecinChef`=0, `isMedecin`=1, `isPatient`=1, `userStatus`=1, `userSIgnedUpAt` =now() WHERE `users`.idUser ='{$id}'") or die(mysqli_error($db));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/drh&update_success=1">');

}
function update_profil($id,$data, $db) {
    $password = sha1($data['password']);
    $result = $db->query("UPDATE `users` SET `pseudoUser`='{$data['pseudo']}', `passwordUser`='{$password}', `nomUser`='{$data['name']}', `prenomUser`='{$data['prenom']}', `sexeUser`='{$data['gender']}', `telUser`='{$data['phone']}', `dateNaissanceUser`='{$data['birthday']}', `lieuNaissanceUser`='{$data['lieu']}', `nationaliteUser`='{$data['nationalite']}', `fonctionUser`='{$data['profession']}', `emailUser`='{$data['email']}', `situationMatrimonialeUser`= '{$data['situation']}' , `numeroAContacter1`='{$data['numbercont1']}', `numeroAContacter2`='{$data['numbercont2']}', `groupeSanguainUser`='{$data['sanguin']}' WHERE `users`.idUser ='{$id}'") or die(mysqli_error($db));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/profil-patientqw &update_success=1">');

}
function update_infirmiere($id,$hopitalId,$data, $db) {
    $password = sha1($data['password']);
    $reg =	registration_number_infirmiere($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("UPDATE `users` SET `idHopital` = '{$hopitalId}', `idAdresse`=NULL, `registrationNumberUser`='{$data['registrationNumber']}', `pseudoUser`='{$data['pseudo']}', `passwordUser`='{$password}', `nomUser`='{$data['name']}', `prenomUser`='{$data['prenom']}', `sexeUser`='{$data['gender']}', `telUser`='{$data['phone']}', `dateNaissanceUser`='{$data['birthday']}', `lieuNaissanceUser`=NULL, `nationaliteUser`=NULL, `fonctionUser`='DRH', `emailUser`='{$data['email']}', `situationMatrimonialeUser`=NULL, `numeroAContacter1`=NULL, `numeroAContacter2`=NULL, `groupeSanguainUser`=NULL, `isAdmin`=0, `isDrh`=0, `isInfirmiere`=1, `isMedecinChef`=0, `isMedecin`=0, `isPatient`=1, `userStatus`=1, `userSIgnedUpAt` =now() WHERE `users`.idUser ='{$id}'") or die(mysqli_error($db));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/drh&update_success=1">');

}
function nombre_hop ($db) {
    $nombre_hop = $db->query("SELECT count(*) as Nombre FROM hopital ") or die(mysqli_error($db));
    $result = mysqli_fetch_assoc($nombre_hop);
    return $result['Nombre'];

}
function nombre_patient ($db) {
    $nombre_pat = $db->query("SELECT count(*) as Nombre FROM users WHERE isPatient = 1 ") or die(mysqli_error($db));
    $result = mysqli_fetch_assoc($nombre_pat);
    return $result['Nombre'];

}
function nombre_infirmiere ($db) {
    $nombre_inf = $db->query("SELECT count(*) as Nombre FROM users WHERE isInfirmiere = 1 ") or die(mysqli_error($db));
    $result = mysqli_fetch_assoc($nombre_inf);
    return $result['Nombre'];

}
function nombre_medecin ($db) {
    $nombre_med = $db->query("SELECT count(*) as Nombre FROM users WHERE isMedecin = 1 OR isMedecinChef = 1 ") or die(mysqli_error($db));
    $result = mysqli_fetch_assoc($nombre_med);
    return $result['Nombre'];

}
function set_status($stat, $id, $db){
    $result = $db->query("UPDATE `dossiermedical` SET `statutDossier` = '{$stat}' WHERE `dossiermedical`.`idDossier` = '{$id}' ") or die(mysqli_error($db));
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/dossier-patient&update_doss_success=1">');

}