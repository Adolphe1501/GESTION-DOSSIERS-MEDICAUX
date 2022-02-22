<?php

 if(!isset($_SESSION['registration_number']) ):
    header("location: index.php?page =login/login");
else:
  if($_SESSION['is_infirmiere']!= true && $_SESSION['is_medecin']!= true && $_SESSION['is_medecin_chef']!=true):
     header ("location:index.php");
     
    endif;
    if (isset($_REQUEST['dossier_id']) && $_REQUEST['dossier_id'] > 0) {
        $dossier_id = (int) htmlentities($_REQUEST['dossier_id']);
       // die('<meta http-equiv="refresh" content="1 ; URL=admin.php?page=views/edit-hopital">');
    
    }
endif;
?>

<div class="row justify-content-center py-5 mx-0">
    <div class="col-sm-4">
    <?php  $dossier_id = (int) htmlentities($_REQUEST['dossier_id']); ?> 

        <div class="card card-body shadow-sm">
            <form method="post" action="index.php?page=controllers/add-antecedents-controller&dossier_id=<?= $dossier_id ?>" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-secondary">Ajouter Un Antecedent Medical  </span>
                </div>
             
                <div class="form-group col">
                        <label for="exampleInputEmail1">Libellé</label>
                        <input type="text" name="libelleAntecedent" class="form-control " required id="exampleInputEmail1"  value="<?= $_GET['libelleAntecedent'] ?? '' ?>" aria-describedby="">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail">Observations</label>
                        <input type="text" name="observationAntecedent" class="form-control " required id="exampleInputEmail"  value="<?= $_GET['observationAntecedent'] ?? '' ?>" aria-describedby="">
                    </div>
              
                <div class="row justify-content-center">
                    <button type="submit" name="submit_antecedent" class="btn btn-secondary col-md-4">Ajouter</button>
                </div>
             
            </form>
        </div>
    </div>
</div>