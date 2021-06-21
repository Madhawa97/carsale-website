<?php
// session_start();
require_once('cont/connection.php');



if (isset($_SESSION["u_email"])){
    $user_email = $_SESSION["u_email"];
    $user_password = $_SESSION["u_password"];

    $sql = "SELECT email, password FROM admins WHERE email='$user_email' AND password='$user_password' ";
    $result = $conn->query($sql);

    $sql_2 = "SELECT email, password FROM car_owners WHERE email='$user_email' AND password='$user_password' ";
    $result_2 = $conn->query($sql_2);

    if ($result -> num_rows > 0) {
        require_once('cont/header_admin.php');
    } else {
        if ($result_2 -> num_rows > 0) {
            require_once('cont/header_strip.php');
        } else {
            require_once('cont/header.php');
        }
    }
} else {
    require_once('cont/header.php');
}

// require_once('cont/header.php');
// ------------------------------------------------------------------------

$_SESSION["brand"] = $_POST["brand"];
$_SESSION["model"] = $_POST["model"];

$user_brand = $_SESSION["brand"];
$user_model = $_SESSION["model"];

$sql = "SELECT * FROM car_info JOIN car_owners ON car_member_id = member_id WHERE brand='$user_brand' AND model='$user_model' ";
$result = $conn->query($sql);

echo "<div class=\"section-title\"><div>Search Results : </div></div>";
echo "<div class='card-container' >";
if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        echo "<div class='card' >";
        echo "  <div class='card-image'>";
        echo "    <img src='". $row['image'] ."' alt='car_image'>";
        echo "  </div>";
        echo "  <div class='card-text'>";
        echo "      <span>" . $row['car_condition']. "</span>" ;
        echo "      <h2>" . $row['brand']. " " . $row['model']. "</h2>" ;
        echo "      <p>" . $row['description']. "</p>" ;
        echo "      <p> Owned by : " . $row['f_name']. " ". $row['l_name']. "</p>" ;
        echo "      <p>" . $row['email']. "</p>" ;
        echo "  </div>";
        echo "  <div class='card-stats'>";
        echo "      <p>Rs : " . $row['price']. "</p>" ;
        echo "  </div>";
        echo "</div>";
    }
} else {
    // echo "<div class=\"form\"><div class=\"title\">No cars listed.</div>";
    // echo "
    //     <form action=\"login_test.php\" method=\"GET\">
    //         <input class=\"submit ic1\" type=\"submit\" value=\"Login\">
    //     </form>";
    // echo "</div>";
    echo "<div class=\"form\"><div class=\"title\">No cars listed.</div>";
    echo "
        <form action=\"index.php\" method=\"GET\">
            <input class=\"submit ic1\" type=\"submit\" value=\"Search Again\">
        </form>";
    echo "</div>";
    // echo "Error getting car_info";
}
echo "</div>";

require_once('cont/footer.php');
$conn->close();
?>