<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Staff Information & Login Access</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/add_new_staff.php" id="myForm1" class="needs-validation" novalidate>
               <div class="card card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>             
                    <!-- <input type="text" value=""   name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter first name" pattern="^[a-z]{2,15}$" required autofocus> -->
                    <input name="first_name" id="fisrtNameId" type="text" class="form-control" required autofocus>
                    

                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <!-- <input type="text" value=""  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last name"> -->
                    <input name="last_name" id="lastNameId" type="text" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <!-- <input type="email" value="" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address"> -->
                    <input type="email" name="email" id="emailId" class="form-control"  required>
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Not a valid email address</div>
                  </div>  
                <div class="card-header">
                  <h3 class="card-title">Staff Login Access</h3>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter login username" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter login Password">
                  </div> -->

                  <div class="form-group">
            Password<input type="text" id="pwdId" name="password" class="form-control pwds" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            
            <div class="invalid-feedback">** at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
            <div class="valid-feedback">Valid</div>
          </div>
          <div class="form-group">
            Confirm Password<input type="text" id="cPwdId" class="form-control pwds">
            
            <!-- <div id="cPwdInvalid" class="invalid-feedback">a to z only (2 to 4 long)</div> -->
            <div id="cPwdValid" class="valid-feedback">Valid</div>
          </div>
          <div class="form-group">
            <button id="submitBtn" type="submit" class="btn btn-primary submit-button" disabled>Submit</button>
          </div>
                
              </form>
              
      </div>
    </div>
  </div>
</div>
     <!-- form ends -->  
      </div><!-- /.container-fluid -->
    </section>


    
   