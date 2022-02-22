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
                                <th scope="col">motif </th>
                             
                                <th scope="col">date </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($dossier_id == $_SESSION['user_dossier']):
                                $list_sortie = list_sortie_by_id($_SESSION['user_dossier'],$db);
                                else:
                                $list_sortie = list_sortie_by_id($dossier_id,$db);
                                endif;

                                while ($sortie = mysqli_fetch_assoc($list_sortie)):
                                
                            ?>
                                    <tr>
                                        <td><?= $sortie['motifSortie'] ?></td>
                                        <td><?= date_formatter($sortie['dateSortie'], "j F Y") ?></td>
                                        
                                    
                                    </tr>
                                   
                               <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
