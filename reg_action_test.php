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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO car_owners (f_name,l_name,nic,city,email,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[nic]','$_POST[city]','$_POST[email]','$_POST[password]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully! Thank You for registering with Us !";	
		
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
