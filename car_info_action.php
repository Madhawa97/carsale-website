<?php
// session_start();
require_once("cont/connection.php");
require_once("cont/header_strip.php");


$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql = "SELECT member_id FROM car_owners WHERE email='$user_email' AND password ='$user_password'";
$result = $conn->query($sql);


if (isset($_POST['submit'])){

    // to see whats going on
    // echo '<pre>';
    // print_r($_FILES);
    // print_r($_POST);
    // echo '</pre>';

    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    $temp_name = $_FILES['image']['tmp_name'];

    $upload_to = 'image/';
    $path = $upload_to.$file_name;

    $file_uploaded = move_uploaded_file($temp_name, $upload_to.$file_name);

    if ($result -> num_rows > 0) {
            // output data of each row
            while ($row = $result -> fetch_assoc()) {
                $mem_id = $row['member_id'];
            }
            //-----------add slashes before quotes----------------
            $description = addslashes($_POST["description"]);
            $model = addslashes($_POST["model"]);
            $brand = addslashes($_POST["brand"]);

            // $sql_2 = "INSERT INTO car_info (car_member_id,brand,model,car_condition,price,description,image) VALUES($mem_id,'$_brand','$_model','$_POST[car_cond]','$_POST[price]','$_description', '$path')";
            $sql_2 = "INSERT INTO car_info (car_member_id,brand,model,car_condition,price,description,image) VALUES($mem_id,'$brand','$model','$_POST[car_cond]','$_POST[price]','$description', '$path')";

            if ($conn->query($sql_2) === TRUE) {
                echo "<div class=\"form\"><div class=\"title\">Information added successfully.</div>";
                echo "
                    <form action=\"list_to_member.php\" method=\"GET\">
                        <input class=\"submit ic1\" type=\"submit\" value=\"View List\">
                    </form>";
                echo "</div>";
                // echo "Car record added successfully!";
            } else {
                echo "<div class=\"form\"><div class=\"title\">Invalid Input, Try again.</div>";
                echo "
                    <div class=\"subtitle\">Make sure you don't have any quotation marks inserted.</div>
                    <form action=\"car_info.php\" method=\"GET\">
                        <input class=\"submit ic1\" type=\"submit\" value=\"Go Back\">
                    </form>";
                echo "</div>";
                // echo "Error adding Car: " . $sql . "<br>" . $conn->error;
            }

    } else {
        echo "<div class=\"form\"><div class=\"title\">Error with user info, Try Login in again.</div>";
        echo "
            <form action=\"login_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Login\">
            </form>";
        echo "</div>";
        // echo "Error getting member_ID";
    }

} else {
    echo "<div class=\"form\"><div class=\"title\">Invalid form, Try again.</div>";
    echo "
        <form action=\"car_info.php\" method=\"GET\">
            <input class=\"submit ic1\" type=\"submit\" value=\"Try Again\">
        </form>";
    echo "</div>";
    // echo "incomplete form";
}


require_once("cont/footer.php");
$conn->close();

?>