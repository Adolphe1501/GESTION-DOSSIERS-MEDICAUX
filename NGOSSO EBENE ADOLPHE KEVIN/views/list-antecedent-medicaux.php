<?php
    $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);
?> 
              
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
        <div class="card-header">
            <?php if($_SESSION['is_medecin_chef'] == true): ?>
                <a href="index.php?page=views/add-antecedents&dossier_id=<?= $dossier_id ?>" class="btn btn-secondary btn-sm float-right">Ajouter Antecedent Medical </a>
            <?php endif;?>
               
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Libellé </th>
                                <th scope="col">Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($dossier_id == $_SESSION['user_dossier']):
                            $list_antecedents_medicaux = list_antecedent_by_id($_SESSION['user_dossier'],$db);
                            else:
                            $list_antecedents_medicaux = list_antecedent_by_id($dossier_id,$db);
                            endif;
                            while ($antecedents = mysqli_fetch_assoc($list_antecedents_medicaux)):
                                ?>
                                <tr>
                                    <td><?= $antecedents['libelleAntecedentMedical'] ?></td>
                                    <td><?= $antecedents['observationAntecedentMedical'] ?></td>
                                  
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          