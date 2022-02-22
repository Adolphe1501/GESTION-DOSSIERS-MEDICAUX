<?php

if(!isset($_SESSION['user_pseudo']) || !isset($_SESSION['user_email'])):
    header("location: index.php?page =views/login/login");
else:
  if($_SESSION['is_admin'] != true ):
     header ("location:index.php");
   endif;
endif;
?>

              <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                      <div class="dash-widget">
                          <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                          <div class="dash-widget-info text-right">
                              <?php $nombrePat = nombre_patient($db);?>
                              <h3><?=$nombrePat?></h3>
                              <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                      <div class="dash-widget">
                          <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                          <div class="dash-widget-info text-right">
                              <?php $nombreInf = nombre_infirmiere($db);?>
                              <h3><?=$nombreInf?></h3>
                              <span class="widget-title1">Infirmiere <i class="fa fa-check" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
               
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                      <div class="dash-widget">
                          <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                          <div class="dash-widget-info text-right">
                              <?php $nombreMed = nombre_medecin($db);?>
                              <h3><?=$nombreMed?></h3>
                              <span class="widget-title3">MEDECINS <i class="fa fa-check" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                      <div class="dash-widget">
                          <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                          <div class="dash-widget-info text-right">
                              <?php $nombreHop = nombre_hop($db);?>
                              <h3><?=$nombreHop?></h3>
                              <span class="widget-title4">HOPITAUX <i class="fa fa-check" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
              </div>

              
<div class="row mx-0 pr-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="admin.php?page=views/add-hopital" class="btn btn-secondary btn-sm float-right">Ajouter Hopital</a>
            </div>
            <div class="card-body">
                <div class="table-responsive example_wrapper">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Télephone</th>
                                <th scope="col">Ajoute le</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_hopitaux = list_hopitals($db);
                            while ($hopital = mysqli_fetch_assoc($list_hopitaux)):
                                ?>
                                <tr>
                                    <td><?= $hopital['nomHopital'] ?></td>
                                    <td><?= $hopital['telHopital'] ?></td>
                                    <td><?= date_formatter($hopital['createdAtHopital'], "j F Y") ?></td>
                                    <td>
                                        <a href="admin.php?page=controllers/edit-hopital-controller&hopital_id=<?= $hopital['idHopital'] ?>" class="btn btn-outline-secondary btn-sm">Modifier</a>
                                        <a  href="admin.php?page=controllers/del-hopital-controller&hopital_id=<?= $hopital['idHopital'] ?>"class="btn btn-outline-danger btn-sm ml-2 text-danger">Supprimer</a>
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

          
          
          