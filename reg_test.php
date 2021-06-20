<?php
    session_start();
?>
<?php require_once('cont/header.php'); ?>

<div class="form">
    <div class="title">Welcome</div>
    <div class="subtitle">Create your account : </div>
    <form action="reg_action_test.php" method="POST">
        <div class="input-container ic1">
            <input required name="first_name" id="first_name" class="input" type="text" placeholder=" " maxlength="30"/>
            <label for="first_name" class="placeholder">First name</label>
        </div>
        <div class="input-container ic2">
            <input required name="last_name" id="last_name" class="input" type="text" placeholder=" " maxlength="30"/>
            <label for="last_name" class="placeholder">Last name</label>
        </div>
        <div class="input-container ic2">
            <input required name="nic" id="nic" class="input" type="text" placeholder=" " maxlength="20"/>
            <label for="nic" class="placeholder">NIC</label>
        </div>
        <div class="input-container ic2">
            <input required name="city" id="city" class="input" type="text" placeholder=" " maxlength="30"/>
            <label for="city" class="placeholder">City</label>
        </div>
        <div class="input-container ic2">
            <input required name="email" id="email" class="input" type="text" placeholder=" " maxlength="30"/>
            <label for="email" class="placeholder">E-mail</label>
        </div>
        <div class="input-container ic2">
            <input required name="password" id="password" class="input" type="password" placeholder=" " maxlength="20"/>
            <label for="password" class="placeholder">Password</label>
        </div>
        <input class="submit" type="submit" value="Register">
    </form>
</div>
<?php require_once('cont/footer.php'); ?>