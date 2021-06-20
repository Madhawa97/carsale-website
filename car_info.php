<?php
    session_start();
?>
<?php require_once('cont/header_strip.php'); 

?>

<div class="form" >
<div class="title">Car Details</div>
    <div class="subtitle">Enter your car details below : </div>

<form action="car_info_action.php" method="POST" enctype="multipart/form-data">
    
    <div class="input-container ic1">
        <input name="brand" id="brand" class="input" type="text" placeholder=" " />
        <label for="brand" class="placeholder">Brand</label>
    </div>
    <div class="input-container ic2">
        <input name="model" id="model" class="input" type="text" placeholder=" " />
        <label for="model" class="placeholder">Model</label>
    </div>
    <div class="input-container ic2">
        <!-- <input name="condition" id="condition" class="input" type="text" placeholder=" " /> -->
        <!-- <label for="car_cond" class="placeholder">condition</label> -->
        <select name="car_cond" class="input" >
            <option value="" disabled selected hidden>Condition</option>
            <option value="Brand New">Brand New</option>
            <option value="Registered">Registered</option>
            <option value="Unregistered">Unregistered</option>
            <option value="Used">Used</option>
        </select>
    </div>
    <div class="input-container ic2">
        <input name="price" id="price" class="input" type="text" placeholder=" " />
        <label for="price" class="placeholder">Price</label>
    </div>
    <div class="input-container ic2">
        <input name="description" id="description" class="input" type="text" placeholder=" " />
        <label for="description" class="placeholder">Description</label>
    </div>
    <div class="input-container ic2">
        <input name="image" id="image" class="input" type="file" placeholder=" " />
        <label for="image" class="placeholder">image</label>
    </div>

    <input class="submit" name="submit" type="submit" value="submit">

</form>
</div>
<?php require_once('cont/footer.php'); ?>