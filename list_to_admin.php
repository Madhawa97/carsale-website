<?php
session_start();
require_once("cont/connection.php");
require_once("cont/header_admin.php");
// ------------------------------------------------------------------------

$user_email = $_SESSION["u_email"];
$user_password = $_SESSION["u_password"];

$sql = "SELECT email, password FROM admins WHERE email='$user_email' AND password='$user_password' ";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {

    $sql_2 = "SELECT * FROM car_owners";
    $result_2 = $conn->query($sql_2);

    if ($result_2 -> num_rows > 0) {
        // output data of each row
        echo "<table border = 1>
        <tr>
        <th>Id</th>
        <th>First name</th>
        <th>Last Name</th>
        <th>NIC Number</th>
        <th>City</th>
        <th>Email</th>
        </tr>";


        while ($row = $result_2 -> fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>". $row['member_id'] ."</td>";
            echo "<td>". $row['f_name'] ."</td>";
            echo "<td>". $row['l_name'] ."</td>";
            echo "<td>". $row['nic'] ."</td>";
            echo "<td>". $row['city'] ."</td>";
            echo "<td>". $row['email'] ."</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "<div class=\"form\"><div class=\"title\">Error getting member list.</div>";
        echo "
            <div class=\"subtitle\">Database may be empty.</div>
            <form action=\"login_test.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Login\">
            </form>";
        echo "</div>";
        // echo "Error getting member's list";
    }

} else {
    echo "<div class=\"form\"><div class=\"title\">Admin authentication error.</div>";
    echo "
        <form action=\"login_test.php\" method=\"GET\">
            <input class=\"submit ic1\" type=\"submit\" value=\"Login\">
        </form>";
    echo "</div>";
    // echo "Admin authentication error";
}

require_once("cont/footer.php");
$conn->close();

?>