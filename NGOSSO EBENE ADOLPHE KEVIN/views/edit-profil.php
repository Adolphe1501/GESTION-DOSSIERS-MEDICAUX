
<div class="container">
<div class="row flex-lg-nowrap">
 

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
              <?php if($_SESSION['is_admin']==true) : ?>
                  <form method="POST" action="admin.php?page=controllers/edit-image-controller" enctype="multipart/form-data">
                  <div class="col-12 col-sm-auto mb-3">
                      <?php
                       $list_images = list_image_by_id($_SESSION['user_id'], $db);
                       $image = mysqli_fetch_assoc($list_images);
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
                <?php else: ?>
                  <form method="POST" action="index.php?page=controllers/edit-image-controller" enctype="multipart/form-data">
                  <div class="col-12 col-sm-auto mb-3">
                      <?php
                       $list_images = list_image_by_id($_SESSION['user_id'], $db);
                       $image = mysqli_fetch_assoc($list_images);
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
                <?php endif; ?>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
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
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nom</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="<?= $_SESSION['user_nom'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>prenom</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="<?= $_SESSION['user_prenom'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>pseudo</label>
                              <input class="form-control" type="text" name="username" placeholder="johnny.s" value="<?= $_SESSION['user_pseudo'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" placeholder="user@example.com" value="<?= $_SESSION['user_email'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                              <label>telephone</label>
                              <input class="form-control" type="number" name="numbertel" placeholder="John Smith" value="<?= $_SESSION['user_nom'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>fonction</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="<?= $_SESSION['user_fonction'] ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>situation matrimoniale</label>
                              <input class="form-control" type="text" name="username" placeholder="johnny.s" value="<?= $_SESSION['user_situation_matrimoniale'] ?>">
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
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
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