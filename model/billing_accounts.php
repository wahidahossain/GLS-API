<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

 if($login=="superadmin"){
 $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("connect.php");

//error_reporting(0);

$billing_account = $_REQUEST['billing_account'];
$note = $_REQUEST['note'];

$sql1="INSERT INTO `billing_account`(
    `billing_account_id`,
    `billing_account`,
    `note`,
    `flag`,
    `date`
)
VALUES(
    NULL,
    '$billing_account',
    '$note',
    '1',
    NOW());
";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

// if($result2){
    //print("<script>window.alert('Staff information added successfully');</script>");    
// } 

print("<script>window.location='../superadmin/billing_accounts.php'</script>");

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>