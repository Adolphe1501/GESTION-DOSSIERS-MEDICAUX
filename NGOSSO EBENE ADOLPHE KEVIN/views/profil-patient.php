
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post" action="index.php?page=views/edit-profil-patient">
                <div class="row">
                    <div class="col-md-4 mb-5 ">
                        <div class="profile-img">
                         <?php
                             $list_images = list_image_by_id($_SESSION['user_id'], $db);
                             $image = mysqli_fetch_assoc($list_images);
                          ?>
                        <a href="index.php?page=views/edit-profil-patient">
                            <img id="preview_image" src="public/images/upload/<?= $image['contenuImage']?> " alt="photo"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                            </div>
                        </a>
                        </div>
                    </div>
                  
                    <?php $user = get_user_by_id($_SESSION['user_id'], $db);?>

                    <div class="col-md-6 ">
                        <div class="profile-head">
                                    <h5>
                                    <?= $_SESSION['user_nom'] ?>

                                    </h5>
                                    <h6>
                                    <?=  $_SESSION['user_fonction'] ?>
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Plus</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
            
                    <div class="col-md-8 mt-5">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= $user['nomUser'] ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Surname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= $user['prenomUser'] ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$user['emailUser'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['telUser']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['fonctionUser']?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['sexeUser']?></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Groupe Sanguin </label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['groupeSanguainUser']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Situation Matrimoniale </label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['situationMatrimonialeUser']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de Naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= date_formatter($user['dateNaissanceUser']) ?></p>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Lieu de Naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['lieuNaissanceUser'] ?></p>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero A contacter 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['numeroAContacter1'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero A contacter 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $user['numeroAContacter2'] ?></p>
                                            </div>
                                        </div>
                               
                               
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>