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
                                <th scope="col">Catégories</th>
                             
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_dossier = list_dossier_by_id_dossier($dossier_id,$db);
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

