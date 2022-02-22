<?php

if(!isset($_SESSION['user_pseudo']) || !isset($_SESSION['user_email'])):
    header("location: index.php?page =views/login/login");
else:
  if($_SESSION['is_medecin_chef'] != true && $_SESSION['is_medecin'] != true && $_SESSION['is_infirmiere'] != true):
     header ("location:index.php");
   endif;
endif;
?>

              
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
 
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom Patient</th>
                                <th scope="col">Prenom Patient</th>
                                <th scope="col">Date de Naissance Patient</th>
                                <th scope="col">Dossier Ajoute le</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_dossier = list_dossier($db);
                            while ($dossier = mysqli_fetch_assoc($list_dossier)):
                            $user = get_user_by_id($dossier['idUser'],$db);
                            if (isset($dossier['statutDossier']) &&  $dossier['statutDossier']==1):  ?>
                                <tr>
                                    <td><?= $user['nomUser'] ?></td>
                                    <td><?= $user['prenomUser'] ?></td>
                                    <td><?= date_formatter($user['dateNaissanceUser'], "j F Y") ?></td>
                                    <td><?= date_formatter($dossier['dateCreationDossier'], "j F Y") ?></td>
                                    
                                    <td>
                                        <a href="index.php?page=views/dossier-patient-dossier&dossier_id=<?= $dossier['idDossier'] ?> " class="btn btn-outline-secondary btn-sm">voir plus</a>
                                        <a  href="index.php?page=controllers/del-personnel-controller&personnel_id=<?= $dossier['idDossier'] ?>"class="btn btn-outline-success btn-sm ml-2 text-success">obtenir pdf</a>
                                    </td>
                                </tr>
                            <?php
                            endif; 
                        endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          