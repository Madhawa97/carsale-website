<?php
// session_start();

require_once("cont/connection.php");
require_once("cont/header.php");

//--- see if the user is exists
// $temp_email = $_POST["email"];
$first_name = addslashes($_POST["first_name"]);
$last_name = addslashes($_POST["last_name"]);
$nic = addslashes($_POST["nic"]);
$city = addslashes($_POST["city"]);
// $email = addslashes($email_temp);
$password = addslashes($_POST["password"]);
$email = addslashes($_POST["email"]);

$sql = "SELECT email from car_owners WHERE email = '$email' " ; 
$result = $conn->query($sql);

echo "<div class='alert-box' >";

if ($result -> num_rows > 0) {
    echo "<div class=\"form\"><div class=\"title\">Couldn't create an account. E-mail address is already registered.</div>";
        echo "
            <form action=\"reg_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Try Again\">
            </form>";
        echo "</div>";
    // echo "Couldn't create account. You're already registered with this email.";
    
} else {
    //---- data insert part-----------------------------
    // $first_name_temp = $_POST["first_name"];
    // $last_name_temp = $_POST["last_name"];
    // $nic_temp = $_POST["nic"];
    // $city_temp = $_POST["city"];
    // // $email_temp = $_POST["email"];
    // $password_temp = $_POST["password"];

    // $first_name = addslashes($_POST["first_name"]);
    // $last_name = addslashes($_POST["last_name"]);
    // $nic = addslashes($_POST["nic"]);
    // $city = addslashes($_POST["city"]);
    // // $email = addslashes($email_temp);
    // $password = addslashes($_POST["password"]);

    $sql_2 = "INSERT INTO car_owners (f_name,l_name,nic,city,email,password) VALUES('$first_name','$last_name','$nic','$city','$email','$password')";
    // $sql_2 = "INSERT INTO car_owners (f_name,l_name,nic,city,email,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[nic]','$_POST[city]','$_POST[email]','$_POST[password]')";


    if ($conn->query($sql_2) === TRUE) {
        echo "<div class=\"form\"><div class=\"title\">Account Created.</div>";
        echo "
            <form action=\"login_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Login\">
            </form>";
        echo "</div>";
        // echo "<p>Registered successfully!</p>";
        // echo "<a class='btn btn-full' href='login_test.php'>Continue to Login</a>"; 
    } else {
        echo "<div class=\"form\"><div class=\"title\">Failed to create an Account.</div>";
        echo "
            <form action=\"reg_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Try Again\">
            </form>";
        echo "</div>";
        // echo "Error: " . $sql_2 . "<br>" . $conn->error;    
    }
    //---- end of data insert

}

echo "</div>";

require_once("cont/footer.php");
$conn->close();
?>
