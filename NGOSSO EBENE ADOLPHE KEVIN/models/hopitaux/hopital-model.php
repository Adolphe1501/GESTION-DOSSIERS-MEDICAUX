<?php
function del_hopital($hop_id,$db) {
    $result = $db->query("DELETE FROM hopital WHERE idHopital='{$hop_id}' ") or die(mysqli_error($db));
    $res = $db->query("DELETE FROM users WHERE idHopital='{$hop_id}' ") or die(mysqli_error($db));
     die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/dashboard-admin/dashboard-admin&del_hop_success=1">');
}
function del_personnel($id,$db) {
    $res = $db->query("DELETE FROM users WHERE idUser='{$id}' ") or die(mysqli_error($db));
     die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/personnel&del_success=1">');
}
function list_hopitals($db) {
    $result = $db->query("SELECT * FROM hopital ") or die(mysqli_error($db));
    return $result;
}
function add_hopital($data,$db) {
    $data['nomHopital']= addslashes($data['nomHopital']);
    $result = $db->query("INSERT INTO `hopital` (`nomHopital`, `telHopital`,`createdAtHopital`) 
    VALUES ('{$data['nomHopital']}', '{$data['telHopital']}',now() )") or die(mysqli_error($db));
    return $result;
}function add_antecedent($idDOSS,$data,$db) {
    $data['libelleAntecedent']= addslashes($data['libelleAntecedent']);
    $result = $db->query("INSERT INTO `antecedentsmedicaux` (`idDossier`, `libelleAntecedentMedical`,`observationAntecedentMedical`) 
    VALUES ($idDOSS,'{$data['libelleAntecedent']}', '{$data['observationAntecedent']}' )") or die(mysqli_error($db));
    return $result;
}
function add_consultation($idDOSS,$data,$db) {
    $data['libelleConsultation']= addslashes($data['libelleConsultation']);
    $result = $db->query("INSERT INTO `consultation` (`idDossier`, `libelleConsultation`,`observationConsultation`, `createdAtConsultation`) 
    VALUES ($idDOSS,'{$data['libelleConsultation']}', '{$data['observationConsultation']}',now() )") or die(mysqli_error($db));
    return $result;
}
function add_examen($idDOSS,$data,$db) {
    $data['natureExamen']= addslashes($data['natureExamen']);
    $result = $db->query("INSERT INTO `examen` (`idDossier`, `natureExamen`, `dateEnvoiExamen`, `dateResultatExamen`, `resultatExamen`, `commentaireExamen`, `createdAtExamen`) 
    VALUES ($idDOSS,'{$data['natureExamen']}','{$data['dateEnvoiExamen']}','{$data['dateReceptionExamen']}','{$data['resultatExamen']}', '{$data['commentaireExamen']}',now() )") or die(mysqli_error($db));
    return $result;
}
function add_chef_medecin($data, $db) {
    $data['pseudo']= addslashes($data['pseudo']);
    $data['name']= addslashes($data['name']);
    $data['prenom']= addslashes($data['prenom']);
    $list_hopitals = list_hopitals($db);
    $id = mysqli_fetch_assoc($list_hopitals);
    $res = $db->query("SELECT MAX(idHopital) as max_id FROM hopital") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($res);
    $id_hop= $max['max_id'];
    $password = sha1($data['password']);
    $reg =	registration_number_medecin_chef($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("INSERT INTO `users` ( `idHopital`, `idAdresse`, `registrationNumberUser`, `pseudoUser`, `passwordUser`, `nomUser`, `prenomUser`, `sexeUser`, `telUser`, `dateNaissanceUser`, `lieuNaissanceUser`, `nationaliteUser`, `fonctionUser`, `emailUser`, `situationMatrimonialeUser`, `numeroAContacter1`, `numeroAContacter2`, `groupeSanguainUser`, `isAdmin`, `isDrh`, `isInfirmiere`, `isMedecinChef`, `isMedecin`, `isPatient`, `userStatus`, `userSIgnedUpAt`)
                          VALUES ($id_hop, NULL, '{$data['registrationNumber']}' , '{$data['pseudo']}', '$password', '{$data['name']}', '{$data['prenom']}','{$data['gender']}', '{$data['phone']}','{$data['birthday']}', NULL, NULL, 'medecin', '{$data['email']}', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, now())")
            or die(mysqli_error($db));
}
function add_drh($id_hop,$data, $db) {
    $data['pseudo']= addslashes($data['pseudo']);
    $data['name']= addslashes($data['name']);
    $data['prenom']= addslashes($data['prenom']);
    $list_hopitals = list_hopitals($db);
    $id = mysqli_fetch_assoc($list_hopitals);
    $password = sha1($data['password']);
    $reg =	registration_number_drh($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("INSERT INTO `users` ( `idHopital`, `idAdresse`, `registrationNumberUser`, `pseudoUser`, `passwordUser`, `nomUser`, `prenomUser`, `sexeUser`, `telUser`, `dateNaissanceUser`, `lieuNaissanceUser`, `nationaliteUser`, `fonctionUser`, `emailUser`, `situationMatrimonialeUser`, `numeroAContacter1`, `numeroAContacter2`, `groupeSanguainUser`, `isAdmin`, `isDrh`, `isInfirmiere`, `isMedecinChef`, `isMedecin`, `isPatient`, `userStatus`, `userSIgnedUpAt`)
                          VALUES ($id_hop, NULL, '{$data['registrationNumber']}' , '{$data['pseudo']}', '$password', '{$data['name']}', '{$data['prenom']}','{$data['gender']}', '{$data['phone']}','{$data['birthday']}', NULL, NULL, 'drh', '{$data['email']}', NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, 1, now())")
            or die(mysqli_error($db));
}
function add_medecin($id_hop,$data, $db) {
    $data['pseudo']= addslashes($data['pseudo']);
    $data['name']= addslashes($data['name']);
    $data['prenom']= addslashes($data['prenom']);
    $list_hopitals = list_hopitals($db);
    $id = mysqli_fetch_assoc($list_hopitals);
    $password = sha1($data['password']);
    $reg =	registration_number_medecin($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("INSERT INTO `users` ( `idHopital`, `idAdresse`, `registrationNumberUser`, `pseudoUser`, `passwordUser`, `nomUser`, `prenomUser`, `sexeUser`, `telUser`, `dateNaissanceUser`, `lieuNaissanceUser`, `nationaliteUser`, `fonctionUser`, `emailUser`, `situationMatrimonialeUser`, `numeroAContacter1`, `numeroAContacter2`, `groupeSanguainUser`, `isAdmin`, `isDrh`, `isInfirmiere`, `isMedecinChef`, `isMedecin`, `isPatient`, `userStatus`, `userSIgnedUpAt`)
                          VALUES ($id_hop, NULL, '{$data['registrationNumber']}' , '{$data['pseudo']}', '$password', '{$data['name']}', '{$data['prenom']}','{$data['gender']}', '{$data['phone']}','{$data['birthday']}', NULL, NULL, 'medecin', '{$data['email']}', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 1, now())")
            or die(mysqli_error($db));
}
function add_infirmiere($id_hop,$data, $db) {
    $data['pseudo']= addslashes($data['pseudo']);
    $data['name']= addslashes($data['name']);
    $data['prenom']= addslashes($data['prenom']);
    $list_hopitals = list_hopitals($db);
    $id = mysqli_fetch_assoc($list_hopitals);
    $password = sha1($data['password']);
    $reg =	registration_number_infirmiere($db);
    $data['registrationNumber'] = $reg;
    $result = $db->query("INSERT INTO `users` ( `idHopital`, `idAdresse`, `registrationNumberUser`, `pseudoUser`, `passwordUser`, `nomUser`, `prenomUser`, `sexeUser`, `telUser`, `dateNaissanceUser`, `lieuNaissanceUser`, `nationaliteUser`, `fonctionUser`, `emailUser`, `situationMatrimonialeUser`, `numeroAContacter1`, `numeroAContacter2`, `groupeSanguainUser`, `isAdmin`, `isDrh`, `isInfirmiere`, `isMedecinChef`, `isMedecin`, `isPatient`, `userStatus`, `userSIgnedUpAt`)
                          VALUES ($id_hop, NULL, '{$data['registrationNumber']}' , '{$data['pseudo']}', '$password', '{$data['name']}', '{$data['prenom']}','{$data['gender']}', '{$data['phone']}','{$data['birthday']}', NULL, NULL, 'infirmiere', '{$data['email']}', NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0 , 1, 1, now())")
            or die(mysqli_error($db));
}
function get_hop_by_id($hop_id, $db) {
    $result = $db->query("SELECT * FROM hopital WHERE idHopital='{$hop_id}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}
function update_hopital($data, $connect) {

    $result = $connect->query("UPDATE hopital SET nomHopital='{$data['nomHopital']}', telHopital='{$data['telHopital']}' WHERE idHopital='{$data['hidded_id']}'")
            or die(mysqli_error($connect));
        echo "<script language='javascript'>alert('L'Hopital a bien été modifié !!')</script>";
     die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/dashboard-admin/dashboard-admin&update_success=1">');

//    header("location:admin.php?page=views/dashboard-admin/dashboard-admin&update_success=1");
}
function check_hopital_name_on_update($hopital_name, $connect, $id) {
    $result = $connect->query("SELECT * FROM hopital WHERE nomHopital= '{$hopital_name}' AND idHopital != '{$id}'") or die(mysqli_error($connect));
    return mysqli_num_rows($result);
}
