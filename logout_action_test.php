<?php
session_start();
require_once("cont/header.php");
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "Logged out successfully!";

require_once("cont/footer.php");
?>