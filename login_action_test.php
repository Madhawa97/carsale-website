<?php
// session_start();
require_once("cont/connection.php");
require_once("cont/header.php");


function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location=\''.$url.'\';</script‌​>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}

$_SESSION["u_email"]=$_POST["email"];
$_SESSION["u_password"]=$_POST["password"];

$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql = "SELECT * FROM car_owners WHERE email='$user_email' AND password='$user_password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Logged as a Member !!!";
    redirect("list_to_member.php");
}else {
    $sql_2 = "SELECT * FROM admins WHERE email='$user_email' AND password='$user_password' ";
    $result_2 = $conn->query($sql_2);

    if ($result_2->num_rows > 0){
        echo "Logged as an admin !!!";
        redirect("list_to_admin.php");
    } else {
        echo "<div class=\"form\"><div class=\"title\">Login Failed, Try again.</div>";
        echo "
            <form action=\"login_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Try Again\">
            </form>";
        echo "</div>";
    }
    
}

require_once("cont/footer.php");
$conn->close();
?>