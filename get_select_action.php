<?php
session_start();
require_once('cont/connection.php');
require_once('cont/header.php');
// ------------------------------------------------------------------------

$_SESSION["brand"] = $_POST["brand"];
$_SESSION["model"] = $_POST["model"];

$user_brand = $_SESSION["brand"];
$user_model = $_SESSION["model"];

$sql = "SELECT * FROM car_info JOIN car_owners ON car_member_id = member_id WHERE brand='$user_brand' AND model='$user_model' ";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        echo "<div>";
        echo "<p>" . $row['brand']. "</p>" ;
        echo "<p>" . $row['model']. "</p>" ;
        echo "<p>" . $row['car_condition']. "</p>" ;
        echo "<p>" . $row['price']. "</p>" ;
        echo "<p>" . $row['description']. "</p>" ;
        echo "<p>" . $row['image']. "</p>" ;
        echo "<img src='". $row['image'] ."' alt='car_image'>";
        echo "<p>" . $row['f_name']. " ". $row['l_name']. "</p>" ;
        // echo "<p>" . $row['l_name']. "</p>" ;
        echo "<p>" . $row['email']. "</p>" ;
        echo "</div>";
        
    }
} else {
    echo "Error getting car_info";
}

require_once('cont/footer.php');
$conn->close();
?>