<?php
// session_start();
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

if (isset($_GET['brand'])){
    $brand_name = mysqli_real_escape_string($conn, $_GET['brand']);

    $sql = "SELECT DISTINCT model FROM car_info WHERE brand = '$brand_name' ";
    $result_set = $conn->query($sql);
    
    $model_list = "";
    while ( $result = mysqli_fetch_assoc($result_set) ) {
        $model_list .= "<option value=\"{$result['model']}\">{$result['model']}</option>";
	}
    echo $model_list;
} else {
    echo "<option>no models found</option>";
}
?>