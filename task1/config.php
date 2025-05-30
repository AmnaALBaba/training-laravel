<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "userdb";
$dsn = "mysql:host=$host;dbname =$db";

$options = [
    PDO::ATTR_ERRMODE   =>   PDO::ERRMODE_EXCEPTION,
];


// $con = mysqli_connect($host, $user , $password , $db);
// if($con){
//     echo "connect successfully" ; 
// }