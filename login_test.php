<?php
    session_start();
?>

<form action="login_action_test.php" method="POST">
    email:
    <input type="text" name="email"><br><br>
    Password:
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Login">

</form>