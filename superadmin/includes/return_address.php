<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Return Address</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/return_address.php" id="myForm1">
               <div class="card card-body">    
                                 <!-- sender start =========================================== -->
                                <div class="form-group">
                                    <label>AddressLine1</label>
                                    <input name="addressline1" id="addressline1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label>Province Code</label>
                                        <select class="custom-select" name="province">
                                        <option value="AB">Alberta</option>
                                        <option value="BC">British Columbia</option>
                                        <option value="MB">Manitoba</option>
                                        <option value="NB">New Brunswick</option>
                                        <option value="NF">Newfoundland</option>
                                        <option value="NT">Northwest Territories</option>
                                        <option value="NS">Nova Scotia</option>
                                        <option value="NU">Nunavut</option>
                                        <option value="ON">Ontario</option>
                                        <option value="PE">Prince Edward Island</option>
                                        <option value="QC">Quebec</option>
                                        <option value="SK">Saskatchewan</option>
                                        <option value="YT">Yukon Territory</option>
                                        </select>                                     
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" id="city" type="text" class="form-control"  required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input name="postalCode" id="postalCode" type="text" class="form-control"  required> * eg. H9P2T7.
                                    </div>
                                    <div class="form-group">
                                        <label>Country Code</label>
                                        <input name="countryCode" id="countryCode" type="text" class="form-control"  required>* eg. CA.
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input name="customerName" id="customerName" type="text" class="form-control"  required>
                                    </div>
                                    
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Sender Contact</h3>
                                    </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input name="fullName" id="fullName" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>e-mail</label>
                                                <input name="email" id="email" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input name="department" id="department" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input name="telephone" id="telephone" type="text" class="form-control"  required>
                                            </div>
                                    <!-- sender end =========================================== -->                                                 
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-button">Submit</button>
                                    </div>
                                        </form>                                     
                                </div>
                            </div>
     <!-- form ends -->  
      </div><!-- /.container-fluid --> 
          <div class="col-12">                     
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Return Information Table</h3>
                </div>
                <div>       
            </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>SL</th>                    
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province Code</th>
                    <th>Postal Code</th>
                    <th>Country Code</th>
                    <th>Customer Name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Phone</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                include ("../model/connect.php");

                //$result = mysqli_query($con, "SELECT * FROM `user` where account_type!='superadmin'");
                $result = mysqli_query($con, "SELECT * FROM `return`");
                $count = 0;
                while ($row = mysqli_fetch_array($result))
                {
                    $count = $count + 1;
                    $return_id = $row['return_id'];
                    $addressLine1 = $row['addressLine1'];
                    $province = $row['province'];
                    $city = $row['city'];
                    $postalCode = $row['postalCode'];
                    $countryCode = $row['countryCode'];
                    $customerName = $row['customerName'];
                    $fullName = $row['fullName'];
                    $email = $row['email'];
                    $department = $row['department'];
                    $telephone = $row['telephone'];
                    $date = $row['date'];                                         
                    ?>
                      <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $fullName;?></td>
                      <td><?php echo $addressLine1;?></td>
                      <td><?php echo $city;?></td>
                      <td><?php echo $province;?></td>
                      <td><?php echo $postalCode;?></td>
                      <td><?php echo $countryCode;?></td>
                      <td><?php echo $customerName;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $department;?></td>
                      <td><?php echo $telephone;?></td>
                      </tr>
                      <?php
                      }
                      ?>                                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>SL</th>                    
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province Code</th>
                    <th>Postal Code</th>
                    <th>Country Code</th>
                    <th>Customer Name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Phone</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
      <!-- table ends -->  
      </div><!-- /.container-fluid -->
    </section>


    
   