<?php
    session_start();
?>
<?php require_once('cont/header.php'); ?>

<div class="alert-box">
<h1>Register</h1>
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
    <input class="btn btn-full" type="submit" value="Register">

</form>
</div>
<?php require_once('cont/footer.php'); ?>