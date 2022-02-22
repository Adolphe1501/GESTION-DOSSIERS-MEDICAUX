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
                                <th scope="col">date debut </th>
                                <th scope="col">date fin </th>
                                <th scope="col">Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             if($dossier_id == $_SESSION['user_dossier']):
                                $list_soins = list_soins_by_id($_SESSION['user_dossier'],$db);
                             else:
                                $list_soins = list_soins_by_id($dossier_id,$db);
                             endif;
                            while ($soins = mysqli_fetch_assoc($list_soins)):
                                ?>
                                <tr>
                                    
                                    <td><?= $soins['heureDebutSoins'] ?></td>
                                    <td><?= $soins['heureFinSoins'] ?></td>
                                    <td><?= $soins['observationSoin'] ?></td>
                                  
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

          
          
          