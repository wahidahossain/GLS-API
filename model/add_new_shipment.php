<?php
session_start();
include('../superadmin/includes/session.php');
if(isset($_SESSION['login'])){ 
$account_type=$_SESSION['account_type'];
$first_name=$_SESSION['first_name'];
$user_id=$_SESSION['user_id'];
if($login=="superadmin" || $login=="staff" || $login=="dev")
{       $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("connect.php");

//error_reporting(0);

$billing_account_id = $_POST['billing_account_id'];
$sender_id = $_POST['sender_id'];
//$consignee_id = $_POST['consignee_id'];
$division = $_POST['division'];
$category = $_POST['category'];
if($category=='Freight')
{
  $parcelType = $_POST['parcelTypeFreight'];
  $surcharges_type = $_POST['surcharges_type_freight'];
}
if($category=='Parcel')
{
  $parcelType = $_POST['parcelTypeParcelCanada'];
  $surcharges_type = $_POST['surcharges_type_parcel'];
}

$paymentType = $_POST['paymentType'];
$note = $_POST['note'];
$unitOfMeasurement = $_POST['unitOfMeasurement'];

$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$length = $_POST['length'];
$depth = $_POST['depth'];
$width = $_POST['width'];


$hazmat = $_POST['hazmat'];
$h_phone = $_POST['h_phone'];
$h_erapReference = $_POST['h_erapReference'];
$h_number = $_POST['h_number'];
$h_shippingName = $_POST['h_shippingName'];
$h_primaryClass = $_POST['h_primaryClass'];
$h_subsidiaryClass = $_POST['h_subsidiaryClass'];
$h_toxicByInhalation = $_POST['h_toxicByInhalation'];
$h_packingGroup = $_POST['h_packingGroup'];
$h_description = $_POST['h_description'];
$h_hazmatType = $_POST['h_hazmatType'];
if($category=='Parcel'){
  $requestReturnLabel = $_POST['requestReturnLabel'];
      if ($requestReturnLabel == 'true') {
        $returnWaybill = $_POST['returnWaybill'];
      }

if(isset($returnWaybill)){
  $returnWaybill = $_POST['returnWaybill'];
}
else{
  $returnWaybill = '';
}

  $references_type = $_POST['references_type'];
  $references_code = $_POST['references_code'];
}
if($category=='Freight'){
  $appointment_type = $_POST['appointment_type'];
  $app_phone = $_POST['app_phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
}
//$surcharges_type = $_POST['surcharges_type'];
$surcharges_value = $_POST['surcharges_value'];
$promoCodes_status = $_POST['promoCodes_status'];
$promoCodes = $_POST['promoCodes'];
$deliveryType = $_POST['deliveryType'];
$return_id = $_POST['return_id'];

// Data for consignee table :: 
$addressLine1 = $_POST['addressline1'];
$addressLine2 = $_POST['addressline2'];
$province = $_POST['province'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];
$countryCode = $_POST['countryCode'];
$customerName = $_POST['customerName'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$department = $_POST['department'];
$telephone = $_POST['telephone'];
$jrp_acc_no = $_POST['jrp_acc_no'];
$OrderNumber = $_POST['OrderNumber'];
$col_5 = time().'-'.mt_rand();
//counting maximum characters for customer name field ===
$customerName_length = strlen($customerName);
if($customerName_length > '40'){
  print("<script>window.alert('Sorry Customer Name can not be more than 40 Characters.');</script>");
  if($category=='Freight') {
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
  }
  if($category=='Parcel') {
    print("<script>window.location='../superadmin/add_new_parcel.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
    }
}
//END counting maximum characters for customer name field



if($surcharges_type == 'DGG' && $hazmat == 'no' && $category=='Freight')
{
  print("<script>window.alert('If you selected the ???DGG : dangerous goods??? surcharge, you must include at least one parcel with at least one Hazmat');</script>");
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
}

if($hazmat == 'yes' && $surcharges_type != 'DGG')
{
  print("<script>window.alert('If you selected the ???Hazmat : Yes???, you must select ???Surcharge Type : DGG???');</script>");
  if($category=='Freight'){
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
  }
  if($category=='Parcel'){
    print("<script>window.location='../superadmin/add_new_parcel.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
    }
}
else{
//insert data into consignee table ========================================
$sql1="INSERT INTO `consignee` (`consignee_id`, `addressLine1`, `addressLine2`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `jrp_acc_no`, `col_2`, `date`) 
       VALUES (NULL, '$addressLine1', '$addressLine2', '$province', '$city', '$postalCode', '$countryCode', '$customerName', '$fullName', '$email', '$department', '$telephone', '$jrp_acc_no', '', NOW());";
$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
$consignee_id = mysqli_insert_id($con);
//end consignee table ======================================================



//insert data into new_shipment table =======================================
if($category=='Parcel'){
$parcelTypeParcelCanada = $_POST['parcelTypeParcelCanada'];
$totalparcelTypeParcelCanada = sizeof($parcelTypeParcelCanada);
for($i=0;$i<$totalparcelTypeParcelCanada;$i++) {

$sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
`parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
`h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
`createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES (NULL, '$billing_account_id', '$sender_id', '$consignee_id', 
'$division', '$category', '$paymentType', '$note', '$unitOfMeasurement', '".$parcelTypeParcelCanada[$i]."', '".$quantity[$i]."', '".$weight[$i]."', '".$length[$i]."', '".$depth[$i]."', '".$width[$i]."', '$hazmat', '$h_phone', 
'$h_erapReference', '$h_number', '$h_shippingName', '$h_primaryClass', '$h_subsidiaryClass', '$h_toxicByInhalation', '$h_packingGroup', '$h_description', '$h_hazmatType', '$requestReturnLabel', 
'$returnWaybill', '$surcharges_type', '$surcharges_value', '$promoCodes_status', '$promoCodes', NOW(), '$deliveryType', '$references_type', '$references_code', '$return_id', 
'', '', '','', '$col_5', '', '', '');";
$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
}
}
if($category=='Freight'){
  $parcelTypeFreight = $_POST['parcelTypeFreight'];
  $quantity = $_POST['quantity'];
  $weight = $_POST['weight'];
  $length = $_POST['length'];
  $width = $_POST['width'];
  $depth = $_POST['depth'];

$totalparcelTypeFreight = sizeof($parcelTypeFreight);
for($i=0;$i<$totalparcelTypeFreight;$i++) {
  $sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
  `parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
  `h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
  `createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES (NULL, '$billing_account_id', '$sender_id', '$consignee_id', 
  '$division', '$category', '$paymentType', '$note', '$unitOfMeasurement', '".$parcelTypeFreight[$i]."', '".$quantity[$i]."', '".$weight[$i]."', '".$length[$i]."', '".$depth[$i]."', '".$width[$i]."', '$hazmat', '$h_phone', 
  '$h_erapReference', '$h_number', '$h_shippingName', '$h_primaryClass', '$h_subsidiaryClass', '$h_toxicByInhalation', '$h_packingGroup', '$h_description', '$h_hazmatType', '', 
  '', '$surcharges_type', '$surcharges_value', '$promoCodes_status', '$promoCodes', NOW(), '$deliveryType', '', '', '$return_id', 
  '$app_phone', '$appointment_type', '$date','$time', '$col_5', '', '', '');";

  $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
}
}



$last_id = mysqli_insert_id($con);
//end new_shipment table =====================================================

if($category=='Freight')
{
print("<script>window.location='../superadmin/new_shipment_freight_json.php?new_shipment_id=$last_id&col_5=$col_5&jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>"); //===freight
}
if($category=='Parcel')
{
print("<script>window.location='../superadmin/new_shipment_json.php?new_shipment_id=$last_id&col_5=$col_5&jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>"); //===parcel
}
}

?>
<?php
}
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>