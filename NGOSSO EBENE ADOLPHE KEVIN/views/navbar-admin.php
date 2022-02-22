
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
   <div class="container">
     <a class="navbar-brand" href="admin.php"><i class="flaticon-pharmacy"></i><span>Kev</span>Health</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="oi oi-menu"></span> Menu
       </button>
     </a>
       <div class="collapse navbar-collapse" id="ftco-nav">
         <ul class="navbar-nav ml-auto  navbar-right">
            <?php $images = list_image_by_id($_SESSION['user_id'], $db);
                    $img = mysqli_fetch_assoc($images);
                     if ($_SESSION['is_admin']== true): ?>
              <div class="nav-item  dropdown">
               <a class="nav-link dropdown-toggle" href="index.php?page=views/users/login" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php if($img['contenuImage'] == NULL):?>
                    <img class="img-profile rounded-circle" src="public/images/avatar/f.png" style="width: 40px;height: 40px;"><?= $_SESSION['user_pseudo']; ?>
                 <?php else : ?>
                    <img class="img-profile rounded-circle" src="public/images/upload/<?= $img['contenuImage']?>" style="width: 40px;height: 40px;"><?= $_SESSION['user_pseudo']; ?>
               </a>
                <?php endif; ?>    
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin.php?page=views/profil">Mon compte </a>
                    <a class="dropdown-item" href="index.php?page=controllers/users/logout">Déconnexion </a>
               </div>
            </div>
           <?php endif ; ?>
                                      
          </ul>
       </div>
   </div>
  </nav>

  