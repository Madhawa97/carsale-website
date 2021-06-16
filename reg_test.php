<?php
    session_start();
?>
<h1>Register for Members</h1>
<form action="reg_action_test.php" method="POST">
    first name:
    <input type="text" name="first_name"><br><br>
    last name:
    <input type="text" name="last_name"><br><br>
    nic:
    <input type="text" name="nic"><br><br>
    city:
    <input type="text" name="city"><br><br>
    email:
    <input type="text" name="email"><br><br>
    Password:
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Register">

</form>