<?php
    session_start();
    require_once('cont/header.php'); 
?>
<form action="login_action_test.php" method="POST">
    email:
    <input type="text" name="email"><br><br>
    Password:
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Login">

</form>

<?php require_once('cont/footer.php'); ?>