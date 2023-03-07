<?php
session_start();
include('../superadmin/includes/session.php');
if(isset($_SESSION['login']))
{
     

    $account_type=$_SESSION['account_type'];
    $first_name=$_SESSION['first_name'];
    $user_id=$_SESSION['user_id'];
        if($login=="superadmin" || $login=="staff" || $login=="dev")
        {       $login=$_SESSION['login'];
                $account_type=$_SESSION['account_type'];
                $first_name=$_SESSION['first_name'];
                $user_id=$_SESSION['user_id'];
                

                include ("connect.php");
                //error_reporting(0);
                $id = $_REQUEST['id'];
                $category = $_REQUEST['category'];
                $sender_id = $_REQUEST['sender_id'];
                $date = $_REQUEST['date'];
                $time = $_REQUEST['time'];

                 //fetch sender information =================
                 $sql_sender_info = mysqli_query($con, "SELECT `fullName`, `email`, `department`, `telephone` FROM `sender` WHERE `sender_id` = '$sender_id'");
                 $row_sender_info = mysqli_fetch_array($sql_sender_info);
                 $fullName = $row_sender_info['fullName'];
                 $email = $row_sender_info['email'];
                 $department = $row_sender_info['department'];
                 $telephone = $row_sender_info['telephone'];
                 //end of fetch sender information ==========
                
                //checking existing manifest created or not =================
                $sql_manifest_exist=mysqli_query($con, "SELECT COUNT(*) as 'exist' FROM `manifest` WHERE `shipment_id` = '$id'");
                $row_manifest_exist = mysqli_fetch_array($sql_manifest_exist);
                $exist_manifest = $row_manifest_exist['exist'];
                //end of checking existing manifest created or not ==========

                //getting pickup id from API ===========
                $emparray = array();
                $results_array = array('id'=>$id, 
                                       'status'=> 0);
                $emparray[] = json_decode(json_encode($results_array, JSON_FORCE_OBJECT), TRUE);


                $data = 
                [
                    'shipments'=> $emparray,                         
                    'contact'=> [                                
                                'fullName'=> $fullName,
                                'language'=>  'EN',
                                'email'=> $email,
                                'department'=> $department,
                                'telephone'=> $telephone,
                                ],                        
                        'status'=> '0',
                        'officeClose'=> '18:00',
                        'date'=> $date,
                        'ready'=> $time,
                        'location'=> 'OT',
                        'otherLocation'=> 'none', 
                        'category'=> $category                               
                ];


                $url = "https://sandbox-smart4i.dicom.com/v1/pickup";     // NEED TO Change -------------------------
                $username = 'wahida@jrponline.com';
                $password = 'Dicom.123';

                //Initiate cURL.
                $curl = curl_init($url);                
                //Specify the username and password using the CURLOPT_USERPWD option.
                curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

                //$curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                //SSL verify disabled
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));                
                $resp = curl_exec($curl);
                if(curl_errno($curl)){
                    //If an error occured, throw an Exception.
                   // throw new Exception(curl_error($curl));
                   $json2 = json_encode(json_decode($resp), JSON_PRETTY_PRINT);
                }               
                 
                $json_resp1 = (array) json_decode($resp, false);
                //var_dump($json_resp1);
               echo  $pickup_id = $json_resp1['ID'];
                //status check ========================
                $json2 = json_encode(json_decode($resp), JSON_PRETTY_PRINT);
                echo '<pre>' . $json2 . '</pre>';


                //end of getting pickup id from API ====

                if($exist_manifest=='0'){
                $sql1="INSERT INTO `manifest` (`manifest_id`, `pickup_id`, `shipment_id`, `sender_id`, `date`, `time`, `category`, `create_date`) 
                       VALUES (NULL, '$pickup_id', '$id', '$sender_id', '$date', '$time', '$category', NOW());";

                $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
                print("<script>window.location='manifest_print.php?id=$pickup_id'</script>");
                }
                else{
                print("<script>window.alert('For this order number manifest already created, save it please!');</script>");
                print("<script>window.location='manifest_print.php?id=$pickup_id'</script>");
                }
            }
        }
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>