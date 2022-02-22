
<div class="container">
<div class="row flex-lg-nowrap">
 

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                  <form method="POST" action="index.php?page=controllers/edit-image-patient-controller" enctype="multipart/form-data">
                  <div class="col-12 col-sm-auto mb-3">
                      <?php
                       $list_images = list_image_by_id($_SESSION['user_id'], $db);
                       $image = mysqli_fetch_assoc($list_images);
                       $user = get_user_by_id($_SESSION['user_id'],$db);
                       $adresse = get_adresse_by_id($user['idAdresse'], $db);
                      ?>
                  <div class="mx-auto" style="width: 140px;">
                  <div class=" profile-img">
                            <img id="preview_image" src="public/images/upload/<?= $image['contenuImage']?>" alt="photo"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="image" id= "image" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>
                            <button class="file btn btn-lg btn-primary " type="submit" name="submit_image">
                                appliquer
                            </button>
                        </div>
                  </div>
                </form>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3 mt-5">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $_SESSION['user_nom'] ?></h4>
                    <p class="mb-0"><?= $_SESSION['user_pseudo'] ?></p>
                   
                  </div>
                  <div class="text-center text-sm-right">
                    <div class="text-muted"><small><?= $_SESSION['user_inscrit'] ?></small></div>
                  </div>
                </div>
              </div>
              <div class="row"></div>
              <div class="row"></div>
              <div class="row"></div>

              <div class="row">
               <ul class="mt-5 mb-5 nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link"></a></li>
               </ul>
              </div>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form method="POST" action="index.php?page=controllers/edit-profil-controller&user_id=<?= $_SESSION['user_id']?>" class="form" novalidate="">
                   <input type="hidden" name="hidded_id" value="<?= $_SESSION['user_id'] ?>">
                    
                   <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nom</label>
                              <input class="form-control" type="text" name="name" placeholder="votre nom" value="<?= $_GET['name'] ?? $_SESSION['user_nom'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>prenom</label>
                              <input class="form-control" type="text" name="prenom" placeholder="votre prenom" value="<?=$_GET['prenom'] ?? $_SESSION['user_prenom'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>pseudo</label>
                              <input class="form-control" type="text" name="pseudo" placeholder="votre pseudo" value="<?=$_GET['pseudo'] ?? $_SESSION['user_pseudo'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name= "email" placeholder="user@example.com" value="<?= $_GET['email'] ?? $_SESSION['user_email'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                              <label>Telephone</label>
                              <input class="form-control" type="number" name="phone" placeholder="6********" value="<?=$_GET['phone']  ?? $_SESSION['user_phone'] ?>">
                            </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Numero A Contacter </label>
                              <input class="form-control" type="number" name="numbercont1" placeholder="6********" value="<?=$_GET['numbercont1']  ?? $user['numeroAContacter1'] ?>">
                            </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Numero A Contacter </label>
                              <input class="form-control" type="number" name="numbercont2" placeholder="6********" value="<?=$_GET['numbercont2']  ?? $user['numeroAContacter2']  ?>">
                            </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Profession</label>
                              <input class="form-control" type="text" name="profession" placeholder="Profession" value="<?=$_GET['profession'] ?? $_SESSION['user_fonction'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group ">
                              <label>Sexe</label> 
                              <select required name="gender" class="custom-select mt-2" id="gender" aria-placeholder="Masculin ou Feminin" >
                                <option value="<?= $_GET['gender'] ?? $user['sexeUser']?>"><?=$user['sexeUser']?></option>
                                <option <?= (isset($_GET['gender'])) && $_GET['gender'] === "Masculin" ? 'selected' : '' ?> value="Masculin">Masculin</option>
                                <option <?= (isset($_GET['gender'])) && $_GET['gender'] === "Feminin" ? 'selected' : '' ?> value="Feminin">Feminin</option>
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group ">
                              <label>Groupe Sanguin</label> 
                              <select required name="sanguin" class="custom-select mt-2" id="sanguin" aria-placeholder=" groupe sanguin" >
                                <option value="<?= $_GET['sanguin'] ?? $user['groupeSanguainUser']?>"><?=$user['groupeSanguainUser']?></option>
                                <option <?= (isset($_GET['sanguin'])) && $_GET['sanguin'] === "A" ? 'selected' : '' ?> value="A">A</option>
                                <option <?= (isset($_GET['sanguin'])) && $_GET['sanguin'] === "B" ? 'selected' : '' ?> value="B">B</option>
                                <option <?= (isset($_GET['sanguin'])) && $_GET['sanguin'] === "O" ? 'selected' : '' ?> value="O">O</option>
                                <option <?= (isset($_GET['sanguin'])) && $_GET['sanguin'] === "AB" ? 'selected' : '' ?> value="AB">AB</option>
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group ">
                              <label>Situation Matrimoniale</label> 
                              <select required name="situation" class="custom-select mt-2" id="situation" aria-placeholder="Marié, célibataire ou divorcée" >
                                <option value="<?= $_GET['situation'] ?? $user['situationMatrimonialeUser']?>"><?=$user['situationMatrimonialeUser']?></option>
                                <option <?= (isset($_GET['situation'])) && $_GET['situation'] === "Marie" ? 'selected' : '' ?> value="Marie">Marié</option>
                                <option <?= (isset($_GET['situation'])) && $_GET['situation'] === "Celibataire" ? 'selected' : '' ?> value="Celibataire">Célibataire</option>
                                <option <?= (isset($_GET['situation'])) && $_GET['situation'] === "Divorce" ? 'selected' : '' ?> value="Divorce">Divorcé</option>
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                          <div class="form-group ">
                            <label for="example-date-input">Date de Naissance </label>
                            <input class="form-control" name="birthday" type="date" value="<?= $_GET['birthday'] ?? $user['dateNaissanceUser']?>" id="example-date-input">
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Lieu de Naissance</label>
                              <input class="form-control" type="text" name="lieu" placeholder="Lieu de Naissance" value="<?= $_GET['lieu'] ?? $user['lieuNaissanceUser'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nationalité</label>
                              <input class="form-control" type="text" name="nationalite" placeholder="Nationalite" value="<?= $_GET['nationalite'] ?? $user['nationaliteUser'] ?>">
                            </div>
                          </div>
                          </div>
                       
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                       
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" name="password" type="password" placeholder="••••••" value=" <?= $_GET['password'] ?? ""?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="confirm_password" placeholder="••••••" value=" <?= $_GET['confirm_password'] ?? ""?>"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" name="submit_edit_profil">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     
    </div>

  </div>
</div>
</div>