  
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-white ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="./"><i class="flaticon-pharmacy"></i><span>Kev</span>Health</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <?php if (!isset($_SESSION['user_pseudo']) || !isset($_SESSION['user_email'])): ?>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="./" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="views/conseil-sante/about.html" class="nav-link">About</a></li>
     
          <li class="nav-item"><a href="views/conseil-sante/contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item cta"><a href="views/login/login.php" class="nav-link"><span>sign in</span></a></li>
        </ul>
      </div>
      <?php else :?>
        <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="./" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="views/conseil-sante/about.html" class="nav-link">About</a></li>

          <li class="nav-item"><a href="views/conseil-sante/contact.html" class="nav-link">Contact</a></li>
          
          <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="index.php?page=views/users/login" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php $images = list_image_by_id($_SESSION['user_id'], $db);
                    $img = mysqli_fetch_assoc($images);
              if($img['contenuImage']  == NULL):?>
               <img class="img-profile rounded-circle" src="public/images/avatar/f.png" style="width: 40px;height: 40px;"><?= $_SESSION['user_pseudo']; ?>
              <?php else : ?>
                <img class="img-profile rounded-circle" src="public/images/upload/<?= $img['contenuImage'] ?>" style="width: 40px;height: 40px;"><?= $_SESSION['user_pseudo']; ?>
              <?php endif; ?>   
           </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="index.php?page=views/dossier-patient"> Mon Dossier Medical</a>
         <?php if($_SESSION['is_medecin_chef'] == true  || $_SESSION['is_Drh'] == true): ?>
         <a class="dropdown-item" href="index.php?page=views/personnel"> gerer personnel</a>
         <?php endif ; ?>
         <?php if($_SESSION['is_medecin'] == true  || $_SESSION['is_infirmiere'] == true  || $_SESSION['is_medecin_chef'] == true): ?>
         <a class="dropdown-item" href="index.php?page=views/dossier-medicaux"> Gerer Dossier Patient</a>
         <?php endif ; ?>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="index.php?page=views/profil-patient">Mon compte </a>
         <a class="dropdown-item" href="index.php?page=controllers/users/logout">Déconnexion </a>
       </div>
       </ul>
      </div>
      <?php endif ; ?>
    </div>
  </nav>