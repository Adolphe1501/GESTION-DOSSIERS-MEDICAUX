<?php
    $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);
?> 
    <div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
        <div class="card-header">
            <?php if($_SESSION['is_medecin_chef'] == true): ?>
                <a href="index.php?page=views/add-examen&dossier_id=<?= $dossier_id ?>" class="btn btn-secondary btn-sm float-right">Ajouter Examen </a>
            <?php endif;?>
               
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nature</th>
                                <th scope="col">date d'envoi </th>
                                <th scope="col">date de reception </th>
                                <th scope="col">resultat </th>
                                <th scope="col">commentaire </th>
                                <th scope="col"> ajoute le </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($dossier_id == $_SESSION['user_dossier']):
                            $list_examens_medicaux = list_examen_by_id($_SESSION['user_dossier'],$db);
                            else:
                            $list_examens_medicaux = list_examen_by_id($dossier_id,$db);
                            endif;
                            while ($examen = mysqli_fetch_assoc($list_examens_medicaux)):
                                ?>
                                <tr>
                                    <td><?=  addslashes($examen['natureExamen'])  ?></td>
                                    <td><?= $examen['dateEnvoiExamen'] ?></td>
                                    <td><?= $examen['dateResultatExamen'] ?></td>
                                    <td><?= addslashes($examen['resultatExamen']) ?></td>
                                    <td><?= addslashes($examen['commentaireExamen'] )?></td>
                                    <td><?= date_formatter($examen['createdAtExamen'], "j F Y") ?></td>
                                 
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          