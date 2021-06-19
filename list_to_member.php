<?php
session_start();
require_once("cont/connection.php");
require_once("cont/header_strip.php");
// ------------------------------------------------------------------------


$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql_2 = "SELECT * FROM car_info JOIN car_owners ON car_member_id = member_id WHERE email='$user_email' AND password='$user_password' ";
$result_2 = $conn->query($sql_2);

if ($result_2 -> num_rows > 0) {
    // output data of each row
    echo "<h1>My Car List</h1>";
    while ($row = $result_2 -> fetch_assoc()) {
        echo "<div>";
        echo "<table style='border : 1px solid black'>";
        echo "<tr>";
        echo "<td>". $row['brand'] ."</td>";
        echo "<td>". $row['model'] ."</td>";
        echo "<td>". $row['car_condition'] ."</td>";
        echo "<td>". $row['price'] ."</td>";
        echo "<td>". $row['description'] ."</td>";
        echo "<td><img src='". $row['image'] ."' alt='car_image'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }
} else {
    echo "Error getting your car list";
}


require_once("cont/footer.php");
$conn->close();
?>