<?php
session_start();

require_once("cont/connection.php");
require_once("cont/header.php");

//--- see if the user is exists
$sql = "SELECT email from car_owners WHERE email = '$_POST[email]' " ; 
$result = $conn->query($sql);

echo "<div class='alert-box' >";

if ($result -> num_rows > 0) {
    echo "Couldn't create account. You're already registered with this email.";
    
} else {
    //---- data insert part
    $sql_2 = "INSERT INTO car_owners (f_name,l_name,nic,city,email,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[nic]','$_POST[city]','$_POST[email]','$_POST[password]')";
    if ($conn->query($sql_2) === TRUE) {
        echo "<p>Registered successfully!</p>";
        echo "<a class='btn btn-full' href='login_test.php'>Continue to Login</a>"; 
    } else {
        echo "Error: " . $sql_2 . "<br>" . $conn->error;    }
    //---- end of data insert

}

echo "</div>";

require_once("cont/footer.php");
$conn->close();
?>
