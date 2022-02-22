
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post" action="admin.php?page=views/edit-profil">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                         <?php
                             $list_images = list_image_by_id($_SESSION['user_id'], $db);
                             $image = mysqli_fetch_assoc($list_images);
                          ?>
                        <a href="admin.php?page=views/edit-profil">
                            <img id="preview_image" src="public/images/upload/<?= $image['contenuImage']?> " alt="photo"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                            </div>
                        </a>
                        </div>
                    </div>
                  

                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?= $_SESSION['user_nom'] ?>

                                    </h5>
                                    <h6>
                                    <?=  $_SESSION['user_fonction'] ?>
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
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
            
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= $_SESSION['user_nom'] ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_phone'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_fonction'] ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_sexe'] ?></p>
                                            </div>
                                        </div>
                                       
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Situation Matrimoniale </label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_situation_matrimoniale'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de Naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_birthday'] ?></p>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Lieu de Naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_lieu_naiss'] ?></p>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero A contacter 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_number1'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero A contacter 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $_SESSION['user_number2'] ?></p>
                                            </div>
                                        </div>
                               
                               
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>