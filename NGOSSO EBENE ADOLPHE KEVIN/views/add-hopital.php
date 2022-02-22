<?php

 if(!isset($_SESSION['registration_number']) ):
    header("location: index.php?page =login/login");
else:
  if($_SESSION['is_admin'] != true):
     header ("location:index.php");
   endif;
endif;
?>

<div class="row justify-content-center py-5 mx-0">
    <div class="col-sm-4">
        <div class="card card-body shadow-sm">
            <form method="post" action="admin.php?page=controllers/add-hop-controller" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-secondary">Ajouter un hopital </span>
                </div>
             
                <div class="form-group col">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="nomHopital" class="form-control " required id="exampleInputEmail1"  value="<?= $_GET['nomHopital'] ?? '' ?>" aria-describedby="">
                    </div>
                <div class="form-group col">
                        <label for="email">Phone</label>
                        <input type="number" name="telHopital" class="form-control " required id="email"  value="<?= $_GET['telHopital'] ?? '' ?>" aria-describedby="">
                    </div>
              
                <div class="row justify-content-center">
                    <button type="submit" name="submit_hopital" class="btn btn-secondary col-md-4">Ajouter</button>
                </div>
             
            </form>
        </div>
    </div>
</div>