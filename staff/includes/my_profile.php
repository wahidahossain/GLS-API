<!-- Main content -->
<section class="content">
      <div class="container-fluid">
                    <?php
                    include ("../model/connect.php");
                    //========================== check in profile table ===============================
                    $result = mysqli_query($con, "SELECT * FROM `user` where user_id = '$user_id'");                
                    $row = mysqli_fetch_array($result);                   
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $username = $row['username'];
                    $email = $row['email'];                  
                    ?>
        <div class="card card-primary card-outline col-sm-4">
            <div class="card-body box-profile">             
                    <h3 class="profile-username text-center">Name: <?php echo $first_name ."&nbsp;". $last_name;?></h3>                  
                  <ul class="list-group list-group-unbordered mb-3">                  
                            <li class="list-group-item">
                                  Login Username: <?php echo $username;?>
                            </li>
                            <li class="list-group-item">
                                  e-mail: <?php echo $email;?>
                            </li> 
                            <li class="list-group-item">
                                <a href="change_password_staff.php?user_id1=<?php echo $user_id;?>"><i class="fa fa-edit fa-fw"></i>Reset Login Password</a>               
                            </li>
                    </ul>
              </div>
          </div>
      </div>
</section>
   