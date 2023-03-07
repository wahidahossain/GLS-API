<!-- Manifest ============================= -->
<?php

$id=$_REQUEST['id'];
$category=$_REQUEST['category'];
$sender_id=$_REQUEST['sender_id'];

?>
<div class="col-md-3">
<form method="POST" action="../model/manifest.php" id="myForm1" class="needs-validation">
    <div class="card card-body">
    <div class="bootstrap-timepicker">
        <div class="form-group">
                <label>Date:</label>
                <?php
                $today = date("Y-m-d");                                                      
                //check current time =========================
                date_default_timezone_set("America/New_York");
                //echo "The time is " . date("H:i");
                //check current time =========================
                ?>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>" />
                <input type="hidden" class="form-control" name="category" value="<?php echo $category;?>" />
                <input type="hidden" class="form-control" name="sender_id" value="<?php echo $sender_id;?>" />

                <input type="date" class="form-control" name="date" min="<?php echo $today;?>" required/>
                <code>Has to be on a business day</code><br>  <br>                                                   
                    <label>Ready At (Time)</label><br>                        
                    <?php
                        function get_times ($default = '19:00', $interval = '+5 minutes') {
                        $output = '';
                        $current = strtotime('00:00');
                        $end = strtotime('23:59');
                        while ($current <= $end) {
                            $time = date('H:i', $current);
                            // $sel = ($time == $default) ? ' selected' : '';
                            $sel = ($time == $default);
                            $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
                            $current = strtotime($interval, $current);
                        }
                        return $output;
                        }
                    ?>
                <select name="time" id="time" onclick="return time_picker();"><?php echo get_times(); ?></select>                                                    
                    <label id="check" class="text-primary"></label><br>
                    <small><code>The time the shipments will be ready for pickup</code></small>
                    <script>
                        function time_picker() {
                        var element = document.getElementById("time").value;
                        if (element == "") {
                        alert("Please Enter Time");
                        return false;  
                        }
                        else {
                        // get system local time
                        var d = new Date();
                        var m = d.getMinutes();
                        var h = d.getHours();
                        if(h == '0') {h = 24}

                        var currentTime = h+"."+m;
                        console.log(currentTime);

                        // get input time
                        var time = element.split(":");
                        var hour = time[0];
                        if(hour == '00') {hour = 24}
                        var min = time[1];

                        var inputTime = hour+"."+min;
                        console.log(inputTime);

                        var totalTime = currentTime - inputTime;
                        console.log(totalTime);

                        if ((Math.abs(totalTime)) > 1) {
                        document.getElementById("check").innerHTML = "Valid time picked";
                        } 
                        else {
                        document.getElementById("check").innerHTML = "Invalid time picked";
                            }
                        }
                        }
                        </script>                        
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary submit-button">Submit</button>
            </div>
        </div>
        </div>
    </form>
</div>
<!-- End of Manifest ===================== -->
