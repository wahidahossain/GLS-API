<?php
include("../../model/connect.php");
$col_5 = '1676650386-1168536407';
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

//multiple

$parcelType = $row['parcelType'];
$quantity = (int)$row['quantity'];
$weight = (float)$row['weight'];
$length = (float)$row['length'];
$depth = (float)$row['depth'];
$width = (float)$row['width'];

//end of multiple

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
//$requestReturnLabel = $row['requestReturnLabel'];
//$returnWaybill = $row['returnWaybill'];
$surcharges_type = $row['surcharges_type'];
$surcharges_value = $row['surcharges_value'];
$promoCodes_status = $row['promoCodes_status'];
$promoCodes = $row['promoCodes'];
$deliveryType = $row['deliveryType'];
//$references_type = $row['references_type'];
//$references_code = $row['references_code'];
//$createDate = DATE_FORMAT($row['date'], "Y/m/d H:i:s");
$createDate = $row['createDate'];

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

$app_phone = $row['col_1'];
$appointment_type = $row['col_2'];
$date = $row['col_3'];
$time = $row['col_4'];
$mid_value1 = '';
//$mid_value=array('parcelType'=> $parcelType, 'quantity'=> $quantity);
$emparray = array();
//$result2 = mysqli_query($con, "SELECT `parcelType`, `quantity`, `weight`, `length`, `depth`, `width` FROM `new_shipment` WHERE `col_5`='$col_5'");
$result2 = mysqli_query($con, "SELECT * FROM `new_shipment` WHERE `col_5`='$col_5'");
 while($rows = mysqli_fetch_assoc($result2)){

//$rows[] = $r;
//$results_array = array();
//while($rows = $result2->fetch_assoc()) {
//$count_rows = mysqli_num_rows ( $result2 );   
//for($i = 0; $count_rows>$i; $i++){
 
 
 //Non regulated hazmat format==============================       
 /*   $results_array = array('parcelType'=>$rows['parcelType'], 
    'quantity'=>$rows['quantity'], 
    'weight'=>$rows['weight'], 
    'length'=>$rows['length'], 
    'depth'=>$rows['depth'], 
    'width'=>$rows['width'],
    'hazmat'=>array('description'=>$rows['h_description'],
    'hazmatType'=>$rows['h_hazmatType'])
    );
  */  

  //Regulated hazmat format==============================       
    $results_array = array('parcelType'=>$rows['parcelType'], 
    'quantity'=>$rows['quantity'], 
    'weight'=>$rows['weight'], 
    'length'=>$rows['length'], 
    'depth'=>$rows['depth'], 
    'width'=>$rows['width'],
    'hazmat'=>array(
                    'phone'=>$rows['h_phone'],
                    'erapReference'=>$rows['h_erapReference'],
                    'number'=>$rows['h_number'],
                    'shippingName'=>$rows['h_shippingName'],
                    'primaryClass'=>$rows['h_primaryClass'],
                    'subsidiaryClass'=>$rows['h_subsidiaryClass'],
                    'toxicByInhalation'=>$rows['h_toxicByInhalation'],
                    'packingGroup'=>$rows['h_packingGroup'],
                    'hazmatType'=>$rows['h_hazmatType']
                    )
                );
    



//$mid_value = json_decode(json_encode($results_array, JSON_FORCE_OBJECT), TRUE);
$emparray[] = json_decode(json_encode($results_array, JSON_FORCE_OBJECT), TRUE);
//$mid_value = json_encode($data = array( $results_array ));
         
            }
//$mid_value1 = $mid_value;
//var_dump($emparray); 

//$mid_value = $mid_value1;
$data_without_hazmat_none = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        //$data[$row->id] = ['desc' => $row->desc, 'qty' => $row->qty];        
        'parcels'=>   
                      
            //['parcelType'=>$rows['parcelType'], 'quantity'=>$rows['quantity'], 'weight'=>$rows['weight'], 'length'=>$rows['length'], 'depth'=>$rows['depth'], 'width'=>$rows['width']],
           // ['parcelType'=>$rows['parcelType'], 'quantity'=>$rows['quantity'], 'weight'=>$rows['weight'], 'length'=>$rows['length'], 'depth'=>$rows['depth'], 'width'=>$rows['width']]
           $emparray       
        ,
        
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],        
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];
   
//}  //echo $rows['parcelType']; 
  var_dump($data_without_hazmat_none);

    
   // print json_encode($rows);


?>