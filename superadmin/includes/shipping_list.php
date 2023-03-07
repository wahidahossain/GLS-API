<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->
              <div class="col-12">
              
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Shipping List</h3>
                       </div>                      
                </div>                
                 </div>
                       <div class="card-body">
                       <button onclick="history.go(-1);" class="btn bg-gradient-warning btn-flat btn-xs">Back</button> 
                       <a href="gls_record_view.php"><h3 class="float-right badge bg-danger">>> Go To Shipping Order List</h3></a>               
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                           <th>SL</th>
                           <th>Order#</th>   
                            <th>Name</th> 
                            <th>E-mail</th>
                            <th>Telephone</th>                
                             <th>AddressLine1</th>
                             <th>Province</th>
                             <th>Postal Code</th>
                             <th>Category</th>
                             <th>Tracking ID</th>
                             <th>Rate</th>
                             <th>BV Rate</th>
                             <!-- <th>Date</th> -->
                             <th>Del</th>
                             <th>Option</th>                            
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                         include ("../model/connect.php");
                         error_reporting(0);        
                         $result = mysqli_query($con, "SELECT * FROM `new_shipment` GROUP BY `col_5` ORDER BY `new_shipment`.`new_shipment_id` DESC");
                         $count = 0;
                         while ($row = mysqli_fetch_array($result))
                         {
                             $count = $count + 1;
                             $new_shipment_id = $row['new_shipment_id'];
                             $col_5 = $row['col_5'];
                            // Get rate table information ============================================
                            $result_rate = mysqli_query($con, "SELECT * FROM `trackingnumber` WHERE `col_1`='$col_5'");
                            $row_rate = mysqli_fetch_array($result_rate);
                            $trackingNumber = $row_rate['trackingNumber'];
                            $id = $row_rate['id'];
                            $rate = $row_rate['rate'];
                            $bv_rate = $row_rate['col_3'];
                            $order_number = $row_rate['order_number'];
                            // End rate table information ============================================

                             $billing_account_id = $row['billing_account_id'];
                             $sender_id = $row['sender_id'];

                            // Get consignee table information ============================================
                             $consignee_id = $row['consignee_id'];
                             $result_consignee = mysqli_query($con, "SELECT * FROM `consignee` WHERE `consignee_id`='$consignee_id'");
                                $row_consignee = mysqli_fetch_array($result_consignee);
                                $consignee_addressLine1 = $row_consignee['addressLine1'];
                                $consignee_province = $row_consignee['province'];
                                $consignee_city = $row_consignee['city'];
                                $consignee_postalCode = $row_consignee['postalCode'];
                                $consignee_countryCode = $row_consignee['countryCode'];
                                $consignee_customerName = $row_consignee['customerName'];
                                $consignee_fullName = $row_consignee['fullName'];
                                $consignee_email = $row_consignee['email'];
                                $consignee_department = $row_consignee['department'];
                                $consignee_telephone = $row_consignee['telephone'];
                            // End consignee table information ============================================
                                $division = $row['division'];
                                $category = $row['category'];
                                $quantity = $row['quantity'];
                                $weight = $row['weight'];
                                $length = $row['length'];
                                $depth = $row['depth'];
                                $width = $row['width'];
                                $hazmat = $row['hazmat'];
                                $h_phone = $row['h_phone'];
                                $h_erapReference = $row['h_erapReference'];
                                $h_number = $row['h_number'];
                                $h_shippingName = $row['h_shippingName'];
                                $h_primaryClass = $row['h_primaryClass'];
                                $h_subsidiaryClass = $row['h_subsidiaryClass'];
                                $h_toxicByInhalation = $row['h_toxicByInhalation'];
                                $h_packingGroup = $row['h_packingGroup'];
                                $h_hazmatType = $row['h_hazmatType'];
                                $requestReturnLabel = $row['requestReturnLabel'];
                                $returnWaybill = $row['returnWaybill'];
                                $surcharges_type = $row['surcharges_type'];
                                $surcharges_value = $row['surcharges_value'];
                                $promoCodes_status = $row['promoCodes_status'];
                                $promoCodes = $row['promoCodes'];
                                $deliveryType = $row['deliveryType'];
                                $references_type = $row['references_type'];
                                $references_code = $row['references_code'];
                                $return_id = $row['return_id'];
                                $createDate = $row['createDate'];                                                 
                             ?>         
                               <tr>
                               <td><?php echo $count;?></td>
                               <td><?php echo $order_number;?></td>
                               <td><?php echo $consignee_fullName;?></td>
                               <td><?php echo $consignee_email;?></td>
                               <td><?php echo $consignee_telephone;?></td>
                               <td><?php echo $consignee_addressLine1;?></td>
                               <td><?php echo $consignee_province;?></td>
                               <td><?php echo $consignee_postalCode;?></td>
                               <td>
                                
                               <!-- Start of manifest part ================================= -->
                                <?php                               
                                //checking existing manifest created or not =================
                                $sql_manifest_exist=mysqli_query($con, "SELECT COUNT(*) as 'exist' FROM `manifest` WHERE `shipment_id` = '$id'");
                                $row_manifest_exist = mysqli_fetch_array($sql_manifest_exist);
                                $exist_manifest = $row_manifest_exist['exist'];
                                //end of checking existing manifest created or not ==========
                              
                                if($exist_manifest!='0'){
                                //pulling pickup id from manifest table =============
                                $sql_manifest_exist=mysqli_query($con, "SELECT `pickup_id` FROM `manifest` WHERE `shipment_id` = '$id'");
                                $row_manifest_exist = mysqli_fetch_array($sql_manifest_exist);
                                $pickup_id = $row_manifest_exist['pickup_id'];
                                //End of pulling pickup id from manifest table ====
                               ?>                                
                               <a href="../model/manifest_print.php?id=<?php echo $pickup_id;?>" target="_blank"><img src="dist/img/manifest1.png" width="20px"></a> <?php echo $category;?>
                              <?php
                              }
                              else{
                              ?>
                              <a href="manifest.php?id=<?php echo $id;?>&category=<?php echo $category;?>&sender_id=<?php echo $sender_id;?>" target="_blank"><img src="dist/img/manifest1.png" width="20px"></a> 
                              <!-- end of manifest part ================================= -->                             
                              <?php echo $category;?>
                              <?php } ?>
                              </td>                           
                              <td>                               					
                                <?php 
                               if($quantity=='1'){
                                ?>
                                <a href="label.php?id=<?php echo $id;?>" target="_blank"><img src="dist/img/download.png" width="15px"></a>
                                <?php
                                echo $trackingNumber;
                               }
                               if($quantity>'1')
                               {
                                ?>
                                <a href="label.php?id=<?php echo $id;?>" target="_blank">
                                <img src="dist/img/download.png" width="15px">
                                <!-- <span class="glyphicon glyphicon-download"></span> -->
                                </a>
                                <?php
                                echo $trackingNumber;
                                echo "<ul class='ml-4 mb-0 fa-ul text-muted'>";
                                $result_subtrackingNumber = mysqli_query($con, "SELECT `subtrackingNumber` FROM `multiple_tracking` WHERE `trackingNumber`='$trackingNumber'");
                                while($row_subtrackingNumber = mysqli_fetch_array($result_subtrackingNumber)){
                                $subtrackingNumber = $row_subtrackingNumber['subtrackingNumber'];
                                echo"
                                <li class='small'><span class='fa-li'><i class='nav-icon fa fa-plus'></i></span>$subtrackingNumber</li>";                                                            
                                }
                                echo "</ul>";
                               }
                               ?>                              
                              </td>
                               <td><a href="rate_details.php?id=<?php echo $id;?>" target="_blank"><img src="dist/img/download.png" width="15px"></a>
                                    <?php echo $rate;?></td>
                               <td><?php echo $bv_rate;?></td>
                               <td><a href="../model/del_shippment.php?col_5=<?php echo $col_5;?>&id=<?php echo $id;?>&new_shipment_id=<?php echo $new_shipment_id;?>&consignee_id=<?php echo $consignee_id;?>" onclick="return confirm('Want to delect this shipment? Warning: Cannot revert the action.')"><i class="nav-icon fa fa-trash"></i></span><?php //echo $subtrackingNumber; ?> <?php //echo $createDate;?></a></td>
                               <td>                                
                               <?php echo "<a href='shipping_details.php?col_5=".$col_5."' target='_blank'>Details</a>";?></td>                               
                               </tr>
                               <?php
                               }
                               ?>                                 
                           </tbody>
                           <tfoot>
                           <tr>
                           <th>SL</th>
                           <th>Order#</th>   
                            <th>Name</th> 
                            <th>E-mail</th>
                            <th>Telephone</th>                
                             <th>AddressLine1</th>
                             <th>Province</th>
                             <th>Postal Code</th>
                             <th>Category</th>
                             <th>Tracking ID</th>
                             <th>Rate</th>
                             <th>BV Rate</th>
                             <!-- <th>Date</th> -->
                             <th>Del</th>
                             <th>Option</th>                            
                           </tr>
                           </tfoot>
                         </table>
                       </div>
                       <!-- /.card-body -->
                     
                   </div>
                   <!-- /.col -->
                 </div>
                </div><!-- /.container-fluid -->
              </section>


    
   