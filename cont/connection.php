<?php
session_start();

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "car_sale";

//create connection
$conn = new mysqli($server,$username,$password,$dbname);
// check connection
if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
// echo "Connected Successfully";

?>
