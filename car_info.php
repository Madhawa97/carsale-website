<?php
    session_start();
?>
<h1>Enter car details</h1>
<form action="car_info_action.php" method="POST" enctype="multipart/form-data">
    brand:
    <input type="text" name="brand"><br><br>
    model:
    <input type="text" name="model"><br><br>
    car condition:
    <select name="car_cond">
        <option value="Brand New">Brand New</option>
        <option value="Registered">Registered</option>
        <option value="Unregistered">Unregistered</option>
        <option value="Used">Used</option>
    </select>
    <!-- <input type="text" name="car_cond"> --><br><br>
    price:
    <input type="text" name="price"><br><br>
    description:
    <textarea name="description"></textarea><br><br>
    image:
    <input type="file" name="image">
    <button type="submit" name="submit">Upload</button>
    <br><br>
    <!-- <input type="submit" value="Submit"> -->
</form>