
<?php

if(!isset($_SESSION['registration_number']) ):
   header("location: index.php?page =login/login");
else:
 if($_SESSION['is_medecin_chef'] != true):
    header ("location:index.php");
  endif;
endif;
?>
<div class="row justify-content-center py-4 mx-0">
   <div class="col-sm-6">
       <div class="card card-body shadow-sm">
           <form method="post" action="index.php?page=controllers/edit-personnel-controller&personnel_id=<?=$personnel['idUser']?>" class="needs-validation" novalidate>
           <input type="hidden" name="hidded_id" value="<?= $personnel['idUser'] ?>">

               <div class="text-center my-4">
                   <span class="h3 font-weight-bold text-secondary">MODIFIER PERSONNEL </span>
               </div>
               <div class="row my-4">
                   <div class="form-group col">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" name="name" class="form-control " required id="exampleInputEmail1" value="<?=$_GET['name'] ?? $personnel['nomUser'] ?>" aria-describedby="">
                   </div>
                   <div class="form-group col">
                       <label for="exampleInputEmail1">Prenom</label>
                       <input type="text" name="prenom" class="form-control " required id="exampleInputEmail1" value="<?= $_GET['prenom'] ?? $personnel['prenomUser']  ?>" aria-describedby="">
                   </div>
                   <div class="form-group col">
                       <label for="pseudo">Pseudo</label>
                       <input type="text" name="pseudo" class="form-control " required id="pseudo"  value="<?=$_GET['pseudo'] ?? $personnel['pseudoUser'] ?>">
                   </div>
               </div>

               <div class="row my-4">
                   <div class="form-group col">
                       <label for="email">Email address</label>
                       <input type="email" name="email" class="form-control " required id="email" value="<?= $_GET['email'] ?? $personnel['emailUser'] ?>" aria-describedby="">
                       <!--<small id="" class="form-text text-muted">Votre eail ne sera pas divulgu&eacute;e.</small>-->
                   </div>
                   <div class="form-group col">
                       <label for="example-date-input">Birthday</label>
                       <input class="form-control" name="birthday" type="date" value="<?= $_GET['birthday'] ?? $personnel['dateNaissanceUser']?>" id="example-date-input">
                   </div>
               </div>

               <div class="row my-4">
                   <div class="input-group col pt-4">
                       <select required name="gender" class="custom-select mt-2" id="gender" >
                           <option value="<?= $_GET['gender'] ?? $personnel['sexeUser']?>"><?=$personnel['sexeUser']?></option>
                           <option <?= (isset($_GET['gender'])) && $_GET['gender'] === "Masculin" ? 'selected' : '' ?> value="Masculin">Masculin</option>
                           <option <?= (isset($_GET['gender'])) && $_GET['gender'] === "Feminin" ? 'selected' : '' ?> value="Feminin">Feminin</option>
                       </select>
                   </div>
                   <div class="form-group col">
                       <label for="email">Phone</label>
                       <input type="number" name="phone" class="form-control " required id="email" value="<?=  $_GET['phone'] ?? $personnel['telUser'] ?>" aria-describedby="">
                   </div>
               </div>

               <div class="row my-4">
                   <div class="form-group col">
                       <label for="password">Password</label>
                       <input type="password" name="password" value="<?=$_GET['password'] ?? '' ?>" class="form-control " required id="password" aria-describedby="">
                   </div>
                   <div class="form-group col">
                       <label for="confirm">Confirm Password</label>
                       <input type="password" name="confirm_password" value="<?=$_GET['confirm_password'] ?? '' ?>" class="form-control " required id="confirm">
                   </div>
               </div>
               <div class="row justify-content-center">
                   <button type="submit" name="submit_edit_personnel" class="btn btn-secondary col-md-4">ajouter</button>
               </div>

              
           </form>
       </div>
   </div>
</div>