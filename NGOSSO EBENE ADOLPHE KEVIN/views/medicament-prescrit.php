<?php
    $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);
?>
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
        
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">nom</th>
                                <th scope="col">quantite</th>
                                <th scope="col">appartient à l'ordonance du</th>
                                <th scope="col">Prescrite par</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($dossier_id == $_SESSION['user_dossier']):
                                $list_medicament = list_medicaments_by_id($_SESSION['user_dossier'],$db);
                                else:
                                $list_medicament = list_medicaments_by_id($dossier_id,$db);
                                endif;
                                while ($medicament = mysqli_fetch_assoc($list_medicament)):
                                    $ordo = get_ordonance_by_id($medicament['idOrdonance'],$db);
                                   $user = get_user_by_id($ordo['idUser'], $db);
                                  
                            ?>
                                    <tr>
                                        <td><?= $medicament['nomMedicamentPrescris'] ?></td>
                                        <td><?= $medicament['quantiteMedicamentPrescris'] ?></td>
                                        <td><?= date_formatter($ordo['dateCreationOrdonance'], "j F Y") ?></td>
                                        <td><?= $user['pseudoUser'] ?></td>
                                       
                                     
                                    </tr>
                                   
                               <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
