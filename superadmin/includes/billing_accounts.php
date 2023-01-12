<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Billing Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/billing_accounts.php" id="myForm1">
               <div class="card card-body">               
                                <div class="form-group">
                                    <label>Billing Account Number</label>
                                    <input name="billing_account" id="billing_account" type="text" class="form-control"  required>
                                    <code>** When the division is set to Freight, the field billingAccount need to be of length : 7 , 8</code><br />
                                    <code>** For parcel, billingAccount need to be of length : 6</code>
                                </div>
                                <div class="form-group card card-body">
                                                          <label>Category</label>
                                                          <select class="custom-select" name="category" required>
                                                          <option value="">Select Option</option>
                                                          <option value="Freight">Freight</option>
                                                          <option value="Parcel">Parcel</option>                                        
                                                          </select>
                                                      </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <input name="note" id="note" type="text" class="form-control" required>
                                </div>
                              <div class="form-group">
                                <button  type="submit" class="btn btn-primary submit-button">Submit</button>
                              </div>                
                        </form>              
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- form ends --> 
              <div class="col-12">                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Billing Account Table</h3>
                       </div>
                       <div>                
                    </div>
                       <div class="card-body">        
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                           <th>SL</th>                    
                             <th>Billing Account No.</th>
                             <th>Category</th>
                             <th>Note</th>
                             <th>Date</th>
                             <th style="display:none;">Operations</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                         include ("../model/connect.php");        
                         $result = mysqli_query($con, "SELECT * FROM `billing_account`");
                         $count = 0;
                         while ($row = mysqli_fetch_array($result))
                         {
                             $count = $count + 1;
                             $billing_account_id = $row['billing_account_id']; 
                             $billing_account = $row['billing_account'];
                             $category = $row['category'];
                             $note = $row['note']; 
                             $flag = $row['flag']; 
                             $date = $row['date'];                   
                             ?>
                               <tr>
                               <td><?php echo $count;?></td>
                               <td><?php echo $billing_account;?></td>
                               <td><?php echo $category;?></td>
                               <td><?php echo $note;?></td>
                               <td><?php echo $date;?></td>
                               <td class="d-print-none">
                                <?php if($flag=='1'){echo "Active";} if($flag=='0'){echo "Inactive";}?>
                               <a href="../model/billing_accounts_flag.php?billing_account_id=<?php echo $billing_account_id;?>&flag=<?php echo $flag;?>"><i class="fa fa-edit fa-fw"></i>In/Active</a>  
                               </td>
                               </tr>
                               <?php
                               }
                               ?>                                 
                           </tbody>
                           <tfoot>
                           <tr>
                             <th>SL</th>                    
                             <th>Billing Account No.</th>
                             <th>Category</th>
                             <th>Note</th>
                             <th>Date</th>
                             <th style="display:none;">Operations</th>
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


    
   