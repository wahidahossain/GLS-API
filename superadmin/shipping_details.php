<?php
session_start();
include('includes/session.php');
if(isset($_SESSION['login'])){ 
$account_type=$_SESSION['account_type'];
$first_name=$_SESSION['first_name'];
$user_id=$_SESSION['user_id'];
if($login=="superadmin")
{       $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("../model/connect.php");
include("includes/css.php");
error_reporting(0);


$col_5 = $_REQUEST['col_5'];
//$result = mysqli_query($con, "SELECT JSON_ARRAYAGG(JSON_OBJECT(billing_account_id, sender_id, consignee_id, division, category, paymentType)) FROM `new_shipment` limit 1");
$result = mysqli_query($con, "SELECT * FROM `new_shipment` WHERE `col_5`='$col_5'");

$row = mysqli_fetch_array($result);
   
$billing_account_id = $row['billing_account_id'];
$result_billing_account = mysqli_query($con, "SELECT `billing_account` FROM `billing_account` WHERE `billing_account_id`='$billing_account_id'");
$row_billing_account = mysqli_fetch_array($result_billing_account);
$billing_account = (string) $row_billing_account['billing_account'];

//==================================================================================================== SENDER
$sender_id = $row['sender_id'];
$result_sender = mysqli_query($con, "SELECT * FROM `sender` WHERE `sender_id`='$sender_id'");
$row_sender = mysqli_fetch_array($result_sender);
$sender_addressLine1 = (string)$row_sender['addressline1'];
$sender_province = (string)$row_sender['province'];
$sender_city = (string)$row_sender['city'];
$sender_postalCode = (string)$row_sender['postalCode'];
$sender_countryCode = (string)$row_sender['countryCode'];
$sender_customerName = (string)$row_sender['customerName'];
$sender_fullName = (string)$row_sender['fullName'];
$sender_email = (string)$row_sender['email'];
$sender_department = (string)$row_sender['department'];
$sender_telephone = (string)$row_sender['telephone'];

//==================================================================================================== CONSIGNEE
$consignee_id = $row['consignee_id'];
$result_consignee = mysqli_query($con, "SELECT * FROM `consignee` WHERE `consignee_id`='$consignee_id'");
$row_consignee = mysqli_fetch_array($result_consignee);
$consignee_addressLine1 = $row_consignee['addressLine1'];
$consignee_province = $row_consignee['province'];
$consignee_city = $row_consignee['city'];
$consignee_postalCode = $row_consignee['postalCode'];
$consignee_countryCode = $row_consignee['countryCode'];
$consignee_customerName = $row_consignee['customerName'];
$consignee_fullName = $row_consignee['fullName'];
$consignee_email = $row_consignee['email'];
$consignee_department = $row_consignee['department'];
$consignee_telephone = $row_consignee['telephone'];



$division = $row['division'];
$category = $row['category'];
$paymentType = $row['paymentType'];
$note = $row['note'];
$unitOfMeasurement = $row['unitOfMeasurement'];

$hazmat = $row['hazmat'];
$h_phone = $row['h_phone'];
$h_erapReference = $row['h_erapReference'];
$h_number = $row['h_number'];
$h_shippingName = $row['h_shippingName'];
$h_primaryClass = $row['h_primaryClass'];
$h_subsidiaryClass = $row['h_subsidiaryClass'];
$h_toxicByInhalation = $row['h_toxicByInhalation'];
$h_packingGroup = $row['h_packingGroup'];
$h_description = $row['h_description'];
$h_hazmatType = $row['h_hazmatType'];
$requestReturnLabel = $row['requestReturnLabel'];
$returnWaybill = $row['returnWaybill'];
$surcharges_type = $row['surcharges_type'];
$surcharges_value = $row['surcharges_value'];
$promoCodes_status = $row['promoCodes_status'];
$promoCodes = $row['promoCodes'];
$deliveryType = $row['deliveryType'];
$references_type = $row['references_type'];
$references_code = $row['references_code'];
//$createDate = DATE_FORMAT($row['date'], "Y/m/d H:i:s");
$createDate = $row['createDate'];
$appointment_type = $row['col_2'];
$appointment_phone = $row['col_1'];
$appointment_date = $row['col_3'];
$appointment_time = $row['col_4'];
//==================================================================================================== RETURN
$return_id = $row['return_id'];
$result_return = mysqli_query($con, "SELECT * FROM `return` WHERE `return_id`='$return_id'");
$row_return = mysqli_fetch_array($result_return);
$return_addressLine1 = $row_return['addressLine1'];
$return_province = $row_return['province'];
$return_city = $row_return['city'];
$return_postalCode = $row_return['postalCode'];
$return_countryCode = $row_return['countryCode'];
$return_customerName = $row_return['customerName'];
$return_fullName = $row_return['fullName'];
$return_email = $row_return['email'];
$return_department = $row_return['department'];
$return_telephone = $row_return['telephone'];

// Get rate table information ============================================
$result_rate = mysqli_query($con, "SELECT * FROM `trackingnumber` WHERE `col_1`='$col_5'");
$row_rate = mysqli_fetch_array($result_rate);
$trackingNumber = $row_rate['trackingNumber'];
$rate = $row_rate['rate'];
$order_number = $row_rate['order_number'];
$id = $row_rate['id'];

?>

<div class="card-body">
    <label><?php echo $rate;?></label>
    <table id="example1" class="table table-bordered table-striped">
<tr>
    <th height="36">Billing Acc: <?php echo $billing_account;?></th>
    <th>Sender: <?php echo $sender_postalCode;?></th>
    <th>Consignee: <?php echo $consignee_postalCode;?></th>
    <th>Division: <?php echo $division;?></th>
  </tr>
  <tr>
    <td height="221" rowspan="2"><p>Request Return Label: <?php echo $requestReturnLabel;?><br />
      Return Waybill: <?php echo $returnWaybill;?>
      </p>
    </td>
    <td colspan="2" rowspan="2"><b>Hazmat: <?php echo $hazmat;?></b><br />
    Hazmat Type: <?php echo $h_hazmatType;?><br />
    Phone: <?php echo $h_phone;?><br />
    Era Ref.: <?php echo $h_erapReference;?><br />
    Number: <?php echo $h_number;?><br />
    Shipping Name: <?php echo $h_shippingName;?><br />
    Primary Class: <?php echo $h_primaryClass;?><br />
    Subsidary Class: <?php echo $h_subsidiaryClass;?><br />
    Toxic By Inhalation: <?php echo $h_toxicByInhalation;?><br />
    Packing Group: <?php echo $h_packingGroup;?><br />
    Description: <?php echo $h_description;?><br />   
    
    </td>
    <td height="103">Surcharges: <?php echo $surcharges_type;?><br /> 
    Promocode Status: <?php echo $promoCodes_status;?><br />
    Promocode: <?php echo $promoCodes;?>
    </td>
  </tr>
  <tr>
    <td height="77"><b>Tracking Number: <?php echo $trackingNumber;?><br />
    Rate: <?php echo $rate;?></b>
<?php if($category=="Freight") { ?><br>Appointment: <?php echo $appointment_type;?><br><?php echo $appointment_phone." "; if($appointment_type=='Scheduled'){echo $appointment_date." "; echo $appointment_time;}?>

</td>
  </tr>
  <tr>
    <td colspan="4">Note: <?php echo $note;?></td>
  </tr>
</table>

<?php } ?>
</div>
<?php
$result_parcel_type = mysqli_query($con, "SELECT * FROM `new_shipment` WHERE `col_5`='$col_5'");
while($row_result_parcel_type = mysqli_fetch_array($result_parcel_type)){
$parcelType = $row_result_parcel_type['parcelType'];
$quantity = (int)$row_result_parcel_type['quantity'];
$weight = (float)$row_result_parcel_type['weight'];
$length = (float)$row_result_parcel_type['length'];
$depth = (float)$row_result_parcel_type['depth'];
$width = (float)$row_result_parcel_type['width'];
?>
<table id="example1" class="table table-bordered table-striped">
  <tr>
    <td scope="col">Parcel Type: <?php echo $parcelType;?><br />
Unit Of Measurement: <?php echo $unitOfMeasurement;?><br />
Quantity: <?php echo $quantity;?><br />
Weight: <?php echo $weight;?><br />
Length: <?php echo $length;?><br />
Depth: <?php echo $depth;?><br />
Width: <?php echo $width;?></td>
  </tr>
</table>
<?php
$billing_account_id = $row['billing_account_id'];

}


$resp = curl_exec($curl);
if(curl_errno($curl)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($curl));
}
// ======================================== END ==============================================
$json_resp = (array) json_decode($resp, false);
//var_dump($json_resp);
?>



<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->
              <div class="col-12">
                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Detail Rate:</h3>
                       </div>
                       <div>                
                 </div>
                       <div class="card-body"> 
                     
                           <?php
                         include ("../model/connect.php");
                         //$id = $_REQUEST['id'];
                         


                         $url = 'https://sandbox-smart4i.dicom.com/v1/rate/shipment/'.$id;  // NEED TO Change -------------------------
                         //$url = 'https://smart4i.dicom.com/v1/rate/shipment/'.$id;

$username = "wahida@jrponline.com";
$password = "Dicom.123";

//Initiate cURL.
$ch = curl_init($url);
 
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

$result = json_decode($response, true);
$result2 = json_encode($response, JSON_PRETTY_PRINT);

$json2 = json_encode(json_decode($response), JSON_PRETTY_PRINT);
echo '<pre>' . $json2 . '</pre>';

if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}                        
?>                             
                </div><!-- /.container-fluid -->
              </section>
<?php
}
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>