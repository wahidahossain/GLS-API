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
include ("../model/connect.php");
//$new_shipment_id = $_REQUEST['new_shipment_id'];



// ====================================== API setup ==========================================
//$billing_account_id = $row['billing_account_id'];

// $url = "https://sandbox-smart4i.dicom.com/v1/shipment/label/1574255";
// $username = 'wahida@jrponline.com';
// $password = 'Dicom.123';

// //Initiate cURL.
// $curl = curl_init($url);

 
//Specify the username and password using the CURLOPT_USERPWD option.
//curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

//header("Content-Type: application/pdf");

// function get_data($url)
// {
//     $ch = curl_init();
//     $timeout = 5;
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//     $data = curl_exec($ch);
//     curl_close($ch);
//     return $data;
// }

$url = "https://sandbox-smart4i.dicom.com/v1/shipment/label/1574255";
$username = 'wahida@jrponline.com';
$password = 'Dicom.123';

//Initiate cURL.
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

//$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/pdf', 'Content-Type: application/pdf'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $saveTo = "newspaper.pdf";


// //Open file handler.
// $fp = fopen($saveTo, 'w+');

// //If $fp is FALSE, something went wrong.
// if($fp === false){
//     throw new Exception('Could not open: ' . $saveTo);
// }


//Create a cURL handle.
//$curl =curl_init($url);

curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
curl_setopt($curl, CURLOPT_REFERER, 'http://www.borkumer-zeitung.de/3d-flip-book/02-08-2019/');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
//Pass our file handle to cURL.
//curl_setopt($curl, CURLOPT_FILE, $fp);

//Timeout if the file doesn't download after 20 seconds.
//curl_setopt($curl, CURLOPT_TIMEOUT, 20);

//Execute the request.
header('Content-type: application/pdf');
echo curl_exec($curl);

//If there was an error, throw an Exception
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}

//Get the HTTP status code.
$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

//Close the cURL handler.
curl_close($curl);

//Close the file handler.
//fclose($fp);

if($statusCode == 200){
    echo 'Downloaded!';
} else{
    echo "Status Code: " . $statusCode;
}


?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>