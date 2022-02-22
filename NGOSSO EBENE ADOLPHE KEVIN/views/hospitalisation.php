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
                                <th scope="col">Motif</th>
                                <th scope="col">heure de debut</th>
                                <th scope="col">heure de fin </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($dossier_id == $_SESSION['user_dossier']):
                            $list_hospitalisation = list_hospitalisation_by_id($_SESSION['user_dossier'],$db);
                            else:
                            $list_hospitalisation = list_hospitalisation_by_id($dossier_id,$db);
                            endif;
                            while ($hopitalisation = mysqli_fetch_assoc($list_hospitalisation)):
                                ?>
                                <tr>
                                    <td><?=  addslashes($hopitalisation['motifHospitalisation'])  ?></td>
                                    <td><?= $hopitalisation['heureDebutHospitalisation'] ?></td>
                                    <td><?= $hopitalisation['heureFinHospitalisation'] ?></td>
                                    
                            
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          