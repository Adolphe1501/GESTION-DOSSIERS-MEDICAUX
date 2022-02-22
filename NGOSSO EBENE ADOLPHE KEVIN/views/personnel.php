<?php

if(!isset($_SESSION['user_pseudo']) || !isset($_SESSION['user_email'])):
    header("location: index.php?page =views/login/login");
else:
  if($_SESSION['is_medecin_chef'] != true && $_SESSION['is_Drh'] != true):
     header ("location:index.php");
   endif;
endif;
?>

              
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
            <?php if($_SESSION['is_medecin_chef'] == true): ?>
                <a href="index.php?page=views/add-drh" class="btn btn-secondary btn-sm float-right">Ajouter DRH</a>
            <?php endif;?>
                <a href="index.php?page=views/add-medecin" class="btn btn-secondary btn-sm float-right">Ajouter Medecin</a>
                <a href="index.php?page=views/add-infirmiere" class="btn btn-secondary btn-sm float-right">Ajouter Infirmiere</a>
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Télephone</th>
                                <th scope="col">Fonction</th>
                                <th scope="col">Ajoute le</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_personnel = list_personnel($db, $_SESSION['hopital_id']);
                            while ($personnel = mysqli_fetch_assoc($list_personnel)):
                                 $fonction = NULL; 
                              if ($personnel['isMedecin'] == 1){
                                  $fonction= 'Medecin';
                               } 
                               if ($personnel['isInfirmiere'] == 1){
                                $fonction= 'Infirmiere';
                             }     if ($personnel['isDrh'] == 1){
                                $fonction= 'DRH';
                             } 
                                ?>
                                <tr>
                                    <td><?= $personnel['nomUser'] ?></td>
                                    <td><?= $personnel['prenomUser'] ?></td>
                                    <td><?= $personnel['telUser'] ?></td>
                                    <td><?= $fonction ?></td>
                                    <td><?= date_formatter($personnel['userSIgnedUpAt'], "j F Y") ?></td>
                                    
                                    <td>
                                        <a href="index.php?page=controllers/edit-personnel-controller&personnel_id=<?= $personnel['idUser'] ?> " class="btn btn-outline-secondary btn-sm">Modifier</a>
                                        <a  href="index.php?page=controllers/del-personnel-controller&personnel_id=<?= $personnel['idUser'] ?>"class="btn btn-outline-danger btn-sm ml-2 text-danger">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          