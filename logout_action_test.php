<?php
session_start();
require_once("cont/header.php");
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "<div class=\"form\"><div class=\"title\">Logout Successful.</div>";
        echo "
            <form action=\"index.php\" method=\"GET\">
                <input class=\"submit ic1\" type=\"submit\" value=\"Browse Cars\">
            </form>";
        echo "</div>";
// echo "Logged out successfully!";

require_once("cont/footer.php");
?>