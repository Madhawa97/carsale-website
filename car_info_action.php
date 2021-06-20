<?php
session_start();
require_once("cont/connection.php");
require_once("cont/header_strip.php");


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
        $sql_2 = "INSERT INTO car_info (car_member_id,brand,model,car_condition,price,description,image) VALUES($mem_id,'$_POST[brand]','$_POST[model]','$_POST[car_cond]','$_POST[price]','$_POST[description]', '$path')";

        if ($conn->query($sql_2) === TRUE) {

            //--------------------alert box needed------//

            echo "Car record added successfully!";
        } else {
            echo "Error adding Car: " . $sql . "<br>" . $conn->error;
        }

        if (isset($_POST['submit'])){

            // to see whats going on
            // echo '<pre>';
            // print_r($_FILES);
            // echo '</pre>';

            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $temp_name = $_FILES['image']['tmp_name'];

            $upload_to = 'images/';
            $path = $upload_to.$file_name;

            $file_uploaded = move_uploaded_file($temp_name, $upload_to.$file_name);

        } else {
            echo "incomplete form";
        }

} else {
    echo "Error getting member_ID";
}

require_once("cont/footer.php");
$conn->close();

?>