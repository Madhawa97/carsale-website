<?php
session_start();
require_once("cont/connection.php");
require_once("cont/header_strip.php");
// ------------------------------------------------------------------------


$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql_2 = "SELECT * FROM car_info JOIN car_owners ON car_member_id = member_id WHERE email='$user_email' AND password='$user_password' ";
$result_2 = $conn->query($sql_2);


echo "<div class=\"section-title\"><div>My Car List</div></div>";
echo "<div class='card-container' >";
if ($result_2 -> num_rows > 0) {
    // output data of each row
    while ($row = $result_2 -> fetch_assoc()) {
        echo "<div class='card' >";
        echo "  <div class='card-image'>";
        echo "    <img src='". $row['image'] ."' alt='car_image'>";
        echo "  </div>";
        echo "  <div class='card-text'>";
        echo "      <span>" . $row['car_condition']. "</span>" ;
        echo "      <h2>" . $row['brand']. " " . $row['model']. "</h2>" ;
        echo "      <p>" . $row['description']. "</p>" ;
        echo "  </div>";
        echo "  <div class='card-stats'>";
        echo "      <p>Rs : " . $row['price']. "</p>" ;
        echo "  </div>";
        echo "</div>";
    }
} else {
    echo "<div class=\"form\"><div class=\"title\">You haven't added any cars.</div>";
    echo "
        <form action=\"car_info.php\" method=\"GET\">
            <input class=\"submit ic1\" type=\"submit\" value=\"Add a Car\">
        </form>";
    echo "</div>";
    // echo "
    //     <div class=\"title ic1\">No Cars Listed</div>";
}
echo "</div>";

require_once("cont/footer.php");
$conn->close();
?>