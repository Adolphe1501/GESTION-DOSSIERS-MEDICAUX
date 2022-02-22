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
                                <th scope="col">Date de Prescription </th>
                             
                                <th scope="col">Prescrit par</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($dossier_id == $_SESSION['user_dossier']):
                                $list_ordonance = list_ordonance_by_id($_SESSION['user_dossier'],$db);
                                else:
                                $list_ordonance = list_ordonance_by_id($dossier_id,$db);
                                endif;
                                while ($ordonance = mysqli_fetch_assoc($list_ordonance)):
                                
                                   $user = get_user_by_id($ordonance['idUser'], $db);
                            ?>
                                    <tr>
                                        <td><?= date_formatter($ordonance['dateCreationOrdonance'], "j F Y") ?></td>
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
