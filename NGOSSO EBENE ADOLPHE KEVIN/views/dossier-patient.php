             
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
        <div class="card-header">
        <?php
                            $list_dossier = list_dossier_by_id($_SESSION['user_id'],$db);
                            $dossier = mysqli_fetch_assoc($list_dossier);
                                ?>
                <a href="index.php?page=views/add-hopital" class="btn btn-secondary btn-sm float-right">obtenir pdf</a>
                <?php if (isset($dossier['statutDossier']) && $dossier['statutDossier'] == 1 ): $stat=1;?>
                    
                <a href="index.php?page=controllers/status-dossier-controller&stat=<?= $stat?>" class="btn btn-outline-danger btn-text-danger btn-sm float-right">visible par moi uniquement</a>
                <?php else:
                        if(isset($dossier['statutDossier']) && $dossier['statutDossier'] == 0) : $stat=0;?>
                         <a href="index.php?page=controllers/status-dossier-controller&stat=<?= $stat?>" class="btn btn-outline-success btk6n-text-success btn-sm float-right">autoriser le personnel hospitalier </a>
                        <?php endif;?>
                <?php endif;?>
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Catégories</th>
                             
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_dossier = list_dossier_by_id($_SESSION['user_id'],$db);
                            $dossier = mysqli_fetch_assoc($list_dossier);
                                ?>
                                <tr>
                                    <td>Antécedents Médicaux</td>
                                    <td>
                                        <a href="index.php?page=views/list-antecedent-medicaux&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Consultations</td>
                                    <td>
                                        <a href="index.php?page=views/consultations&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Examens</td>
                                    <td>
                                        <a href="index.php?page=views/examens&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Médicaments Prescris</td>
                                    <td>
                                        <a href="index.php?page=views/medicament-prescrit&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Hospitalisation</td>
                                    <td>
                                        <a href="index.php?page=views/hospitalisation&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Ordonances</td>
                                    <td>
                                        <a href="index.php?page=views/ordonances&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Soins reçues</td>
                                    <td>
                                        <a href="index.php?page=views/soins-recues&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>    <tr>
                                    <td>Sortie</td>
                                    <td>
                                        <a href="index.php?page=views/sortie&dossier_id=<?= $dossier['idDossier'] ?>" class="btn btn-outline-secondary btn-sm">voir plus</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

