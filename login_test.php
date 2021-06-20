<?php
    session_start();
    require_once('cont/header.php'); 
?>
<div class="form">
<div class="title">Welcome</div>
<div class="subtitle">Log in : </div>
<form action="login_action_test.php" method="POST">
    <div class="input-container ic1">
        <input name="email" id="email" class="input" type="text" placeholder=" " />
        <label for="email" class="placeholder">E-mail</label>
    </div>
    <div class="input-container ic2">
        <input name="password" id="password" class="input" type="password" placeholder=" " />
        <label for="password" class="placeholder">Password</label>
    </div>
    <input class="submit" type="submit" value="Login">

</form>
</div>

<?php require_once('cont/footer.php'); ?>