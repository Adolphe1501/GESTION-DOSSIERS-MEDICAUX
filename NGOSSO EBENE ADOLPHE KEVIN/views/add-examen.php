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
            <form method="post" action="index.php?page=controllers/add-examen-controller&dossier_id=<?= $dossier_id ?>" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-secondary">Ajouter Un Examen Medical  </span>
                </div>
             
                <div class="form-group col">
                        <label for="exampleInputEmail1">Nature</label>
                        <input type="text" name="natureExamen" class="form-control " required id="exampleInputEmail1"  value="<?= $_GET['natureExamen'] ?? '' ?>" aria-describedby="">
                    </div>
                    <div class="form-group col">
                        <label for="example-date-input">Date d'Envoie</label>
                        <input class="form-control" name="dateEnvoiExamen" type="date" value="<?= $_GET['dateEnvoiExamen'] ?? '' ?>" id="example-date-input">
                    </div>
                    <div class="form-group col">
                        <label for="example-date-input">Date de Reception</label>
                        <input class="form-control" name="dateReceptionExamen" type="date" value="<?= $_GET['dateReceptionExamen']  ?? '' ?>" id="example-date-input">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail">Resultat</label>
                        <input type="text" name="resultatExamen" class="form-control " required id="exampleInputEmail"  value="<?= $_GET['resultatExamen'] ?? '' ?>" aria-describedby="">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail">Commentaire</label>
                        <input type="text" name="commentaireExamen" class="form-control " required id="exampleInputEmail"  value="<?= $_GET['commentaireExamen'] ?? '' ?>" aria-describedby="">
                    </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit_examen" class="btn btn-secondary col-md-4">Ajouter</button>
                </div>
             
            </form>
        </div>
    </div>
</div>