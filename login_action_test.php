<?php
//To start session
		// if(!isset($_SESSION)){
session_start();

// require("connection.php");

$servername = "localhost";
$username = "root";
$pass = "root";
$dbname = "car_sale";

// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);


$_SESSION["u_email"]=$_POST["email"];
$_SESSION["u_password"]=$_POST["password"];

$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql = "SELECT * FROM car_owners WHERE email='$user_email' AND password='$user_password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Logged as a Member !!!";
}else {
    $sql_2 = "SELECT * FROM admins WHERE email='$user_email' AND password='$user_password' ";
    $result_2 = $conn->query($sql_2);

    if ($result_2->num_rows > 0){
        echo "Logged as an admin !!!";
    } else {
        echo "LOGIN FAILED";
    }
    
}


?>