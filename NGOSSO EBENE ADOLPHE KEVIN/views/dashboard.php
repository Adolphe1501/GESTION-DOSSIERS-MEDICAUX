<div class="sidebar" id="sidebar">
          <div class="sidebar-inner slimscroll ">
              <div id="sidebar-menu" class="sidebar-menu ">
                  <ul>
                      <li class="menu-title">Main</li>
                      <li class="active">
                          <a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                      </li>
                 
                      <li class="submenu">
                          <a href="javascript:void(0);"><i class="flaticon-pharmacy"></i> <span> Hopitaux</span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                        
                              <?php
                            $list_hop = list_hopitals($db);
                            while ($hopital = mysqli_fetch_assoc($list_hop)):
                                ?>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span><?= $hopital['nomHopital'] ?></span> <span class="menu-arrow"></span></a>
                              </li>
                           <?php endwhile; ?>
                           <li>
                             <a href="admin.php?page=views/add-hopital"><i class="flaticon-pharmacy"></i> <span>Ajouter Hopital </span></a>
                          </li>
                          </ul>
                      </li>
                   
                     
                  </ul>
              </div>
          </div>
      </div>