<?php

$dbname="jrpinsights";
$con = mysqli_connect("localhost","root","");
if (!$con)
{    
    echo "Can't Connect";
}
mysqli_select_db($con, "jrpinsights");

        
 
 
//====================== IMPORT ==========================

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "jrpinsights";
 
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?> 