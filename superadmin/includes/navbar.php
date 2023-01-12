
<?php
if($account_type=='superadmin'){
?> 
<!-- start admin navbar -->

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
            <li class="nav-header"></li>
            
              <!-- Staff manu start ============== -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-address-book"></i>
                  <p>
                    Staff
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                    <a href="add_new_staff.php" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Add New                
                      </p>
                    </a>
                  </li>
                      <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">
                          <i class="nav-icon fas fa-circle"></i>
                          <p>
                            Record View                
                          </p>
                        </a>
                      </li>
                  </ul>
                <!-- Staff manu end ============== -->

                <!-- Settings manu start ============== -->
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-wrench"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                    <a href="billing_accounts.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Billing Accounts                
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="sender_list.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Sender List                
                      </p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="consignee_list.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Consignee List                
                      </p>
                    </a>
                  </li> -->
                  <!-- <li class="nav-item">
                    <a href="consignee_list_step1.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Consignee List                
                      </p>
                    </a>
                  </li> -->
                      <li class="nav-item">
                        <a href="return_address.php" class="nav-link">
                          <i class="nav-icon fa fa-cogs"></i>
                          <p>
                            Return Address                
                          </p>
                        </a>
                      </li>
                  </ul>
                <!-- Settings manu end ============== -->



                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-th-large"></i>
                  <p>
                    Shipment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                      <a href="gls_record_view.php" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                          GLS Order List                
                        </p>
                      </a>
                      </li>
                      <li class="nav-item">
                      <a href="new_shipment.php" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                          All Shipment                
                        </p>
                      </a>
                      </li>
                      <!-- <li class="nav-item">
                        <a href="add_consignee.php" class="nav-link">
                          <i class="nav-icon fa fa-plus"></i>
                          <p>
                            Add Consignee                
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="add_sender.php" class="nav-link">
                          <i class="nav-icon fa fa-plus"></i>
                          <p>
                            Add Sender                
                          </p>
                        </a>
                      </li> -->
                  </ul>   
              
                <!-- <li class="nav-item">
                    <a href="gls_record_view.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                        GLS Shipping                          
                        </p>
                      </a>
                    </li>  -->
                    <!-- <li class="nav-item">
                    <a href="search_jrp_fitment.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                        Fitment Search                
                        </p>
                      </a>
                    </li>           -->
                <li class="nav-item">
                  <a href="../model/logout.php" class="nav-link">
                    <i class="fas fa fa-power-off"></i>
                    <p> Logout</p>
                  </a>
                </li>          
              </ul>
            </nav>
            <?php } ?>

<?php
if($account_type=='staff'){
?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
            <li class="nav-header"></li>
            
              <!-- Staff manu start ============== -->
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-address-book"></i>
                  <p>
                    Staff
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                    <a href="add_new_staff.php" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Add New                
                      </p>
                    </a>
                  </li>
                      <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">
                          <i class="nav-icon fas fa-circle"></i>
                          <p>
                            Record View                
                          </p>
                        </a>
                      </li>
                  </ul> -->
                <!-- Staff manu end ============== -->

                <!-- Settings manu start ============== -->
                <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-wrench"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                    <a href="billing_accounts.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Billing Accounts                
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="sender_list.php" class="nav-link">
                      <i class="nav-icon fa fa-cogs"></i>
                      <p>
                        Sender List                
                      </p>
                    </a>
                  </li>
                      <li class="nav-item">
                        <a href="return_address.php" class="nav-link">
                          <i class="nav-icon fa fa-cogs"></i>
                          <p>
                            Return Address                
                          </p>
                        </a>
                      </li>
                  </ul> -->
                <!-- Settings manu end ============== -->



                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-th-large"></i>
                  <p>
                    Shipment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">              
                    <li class="nav-item">
                      <a href="gls_record_view.php" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                          GLS Order List                
                        </p>
                      </a>
                      </li>
                      <li class="nav-item">
                      <a href="new_shipment.php" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                          All Shipment                
                        </p>
                      </a>
                      </li>
                      <!-- <li class="nav-item">
                        <a href="add_consignee.php" class="nav-link">
                          <i class="nav-icon fa fa-plus"></i>
                          <p>
                            Add Consignee                
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="add_sender.php" class="nav-link">
                          <i class="nav-icon fa fa-plus"></i>
                          <p>
                            Add Sender                
                          </p>
                        </a>
                      </li> -->
                  </ul>   
              
                <!-- <li class="nav-item">
                    <a href="gls_record_view.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                        GLS Shipping                          
                        </p>
                      </a>
                    </li>  -->
                    <!-- <li class="nav-item">
                    <a href="search_jrp_fitment.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                        Fitment Search                
                        </p>
                      </a>
                    </li>           -->
                <li class="nav-item">
                  <a href="../model/logout.php" class="nav-link">
                    <i class="fas fa fa-power-off"></i>
                    <p> Logout</p>
                  </a>
                </li>          
              </ul>
            </nav>
<?php } ?>