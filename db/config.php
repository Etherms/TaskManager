<?php
    
//Database Configuration
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','taskmanager');

//Attempt to connect to Database
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME,);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}
?>