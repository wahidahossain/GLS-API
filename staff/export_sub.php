<?php

session_start();

  
$login=$_SESSION['login'];
$account_type=$_SESSION['account_type'];
$first_name=$_SESSION['first_name'];
$user_id=$_SESSION['user_id'];
if($login=="customer"){
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>



<?php

include_once '../model/connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=jrpinsightsreport.csv');

$delimiter = ','; 
$filename="jrpinsightsreport.csv";
$f = fopen('php://output', 'w+'); 
if ($f == false) {
    die('Error opening the file ' . $filename);
}
$fields = array('BRAND', 'JRPSKU', 'OEMSKU', 'DESCRIPTION', 'QTY', 'COST', 'MAP'); 
fputcsv($f, $fields, $delimiter); 
    
$result_assign_brand = mysqli_query($con, "SELECT * FROM `assign_brands` WHERE `user_id`='$user_id'");
while ($row_assign_brand = mysqli_fetch_array($result_assign_brand))
{    
    
    //===========================BRAND TABLE===========================	
    $jrp_account_no = $row_assign_brand['jrp_account_no'];
    $brands = $row_assign_brand['brandname'];
    //==============================END==========================

    $query = "SELECT * FROM `stock` WHERE `brand`='$brands';";
    $result_stock = mysqli_query($con, $query);
   
    while($row_stock = mysqli_fetch_array($result_stock)){ 

    // $brand = $row_stock['brand'];
    // $jrpsku = $row_stock['jrpsku'];
    // $oemsku = $row_stock['oemsku'];
    // $description = $row_stock['description'];
    $onhand = $row_stock['onhand'];
    $commited = $row_stock['commited'];
    // $cost = $row_stock['cost'];
    // $map = $row_stock['map'];


    $qty = $onhand - $commited;

    $lineData = array($row_stock['brand'], $row_stock['jrpsku'], $row_stock['oemsku'], $row_stock['description'], $row_stock['onhand'], $row_stock['cost'], $row_stock['map']); 
    //fputcsv($f, $lineData);
    $string = preg_replace('/\s+/', '', $lineData);
    fputcsv($f, $string,',',chr(0));
    } 
}
    //header('Content-Type: text/csv'); 
   // header('Content-Disposition: attachment; filename="'. $filename .'";'); 
fclose($f);
?>


<?php
        }            
else{    
    print("<script>window.location='../index_warning.php?pass=message'</script>");  
}
?>