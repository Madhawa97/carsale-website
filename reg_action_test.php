<?php

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

//--- see if the user is exists
$sql = "SELECT email from car_owners WHERE email = '$_POST[email]' " ; 
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    echo "Couldn't create account. You're already registered with this email.";
    
} else {
    //---- data insert part
    $sql_2 = "INSERT INTO car_owners (f_name,l_name,nic,city,email,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[nic]','$_POST[city]','$_POST[email]','$_POST[password]')";
    if ($conn->query($sql_2) === TRUE) {
        echo "New record created successfully! Thank You for registering with Us !";	
            
    } else {
        echo "Error: " . $sql_2 . "<br>" . $conn->error;
    }
    //---- end of data insert

}

$conn->close();
?>
