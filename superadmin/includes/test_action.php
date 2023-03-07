<?php

/*
$parcelTypeFreight = $_GET['parcelTypeFreight'];
for($count = 0; $count<count($_GET); $count++){
    $parcelTypeFreight1 = $parcelTypeFreight;

echo $parcelTypeFreight1;
//echo count($_GET);
}
*/
/*
if(isset(filter_input_array(INPUT_GET)['submit'])){

    $names = filter_input_array(INPUT_GET)['parcelTypeFreight'];
echo $names;
    if(is_array($names)){
    //    $insertCourse = $con->prepare("INSERT INTO `courses`(`course_Name`) 
    //         VALUES (?)");
    //    $insertCourse->bind_param("s", $item);
       foreach ($names AS $key => $item){

           //$res = $insertCourse->execute();
           //if($res){
               echo 'added<br>';
          // }
       }
      // $insertCourse->close();
    }
    else {
        echo 'not array';
    }
}
*/
include("../../model/connect.php");
$parcelTypeFreight = $_POST['parcelTypeFreight'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$length = $_POST['length'];
$width = $_POST['width'];
$depth = $_POST['depth'];

// $i = 1;
// if($parcelTypeFreight != ''){
// $parcelTypeFreight1 = $parcelTypeFreight;
// var_dump($parcelTypeFreight1);
// }
// $i++;
//$i = 0;
$totalparcelTypeFreight = sizeof($parcelTypeFreight);
    for($i=0;$i<$totalparcelTypeFreight;$i++) {
//foreach ($parcelTypeFreight as $parcelType){
    
    $sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
    `parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
    `h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
    `createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES (NULL, '1', '1', '1', 
    '', '', '', '', '', '".$parcelTypeFreight[$i]."', '".$quantity[$i]."', '".$weight[$i]."', '".$length[$i]."', '".$depth[$i]."', '".$width[$i]."', '', '', 
    '', '', '', '', '', '', '', '', '', '', 
    '', '', '', '', '', NOW(), '', '', '', '', 
    '', '', '','', '', '', '', '');";
    $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
   // }
    }
//$i++;




?>