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

// ------------------------------------------------------------------------
$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql = "SELECT member_id FROM car_owners WHERE email='$user_email' AND password ='$user_password'";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    // output data of each row
    while ($row = $result -> fetch_assoc()) {
        // echo "<div>";
        // echo "<h1>" . $row['member_id']. "</h1>" ;
        // echo "</div>";
        $mem_id = $row['member_id'];
    }
} else {
    echo "Error getting member_ID";
}

// ------------------------------------------------------------------------
$sql_2 = "INSERT INTO car_info (car_member_id,brand,model,car_condition,price,description,image) VALUES($mem_id,'$_POST[brand]','$_POST[model]','$_POST[car_cond]','$_POST[price]','$_POST[description]','$_POST[image]')";

if ($conn->query($sql_2) === TRUE) {
    echo "Car record added successfully!";
} else {
    echo "Error adding Car: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>