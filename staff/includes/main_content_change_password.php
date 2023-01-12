<section class="content">
  <div class="container-fluid">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Customer Information & Login Access</h3>
            </div>
              <?php
                include ("../model/connect.php");
                $user_id1 = $_REQUEST['user_id1'];
                ?>
                  <form role="form" action="../model/change_password.php">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">New Password</label>
                              <input name = "user_id1" type="hidden" value=<?php echo $user_id1;?> >
                              <input type="password" name ="password" id = "pswd" class="form-control" id="exampleInputEmail1">
                              <span id = "message" style="color:red">
                            </div>
                        </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
            </div>
          </div>
        </div>
  </section>

<script>
    function verifyPassword() {
      var pw = document.getElementById("pswd").value;
      //check empty password field
      if(pw == "") {
        document.getElementById("message").innerHTML = "**Fill the password please!";
        return false;
      }
    
    //minimum password length validation
      if(pw.length < 8) {
        document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
        return false;
      }

    //maximum length of password validation
      if(pw.length > 15) {
        document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
        return false;
      } else {
        alert("Password is correct");
      }
    }
</script>
   