<?php
session_start();
require_once("cont/connection.php");

$sql = "SELECT DISTINCT brand FROM car_info ";
$result_set = $conn->query($sql);

$brand_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$brand_list .= "<option value=\"{$result['brand']}\">{$result['brand']}</option>";
	}
?>

<?php require_once('cont/header.php'); ?>
    <section>
        <form action="get_select_action.php" method="post">
            <div>
                <label for="brand">Select Brand:</label>
                <select required name="brand" id="brand">
                    <option value="" disabled selected hidden>Select Brand</option>
                    <?php echo $brand_list; ?>
                </select>
            </div>
            <div>
                <label for="model">Select Model:</label>
                <select required name="model" id="model">
                    <option value="" disabled selected hidden>Select Model</option>
                    
                </select>
            </div>
            <input type="submit" value="Search">
        </form>
    </section>

    <br><br>
    <?php require_once('auto_car_list.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>	
    <script>
        $(document).ready(function(){
            $('#brand').on("change", function(){
                var brand = $("#brand").val();
                var getURL = "get_model.php?brand=" + brand;
                // var getURL = "shit.php?brand=" + brand;
                // console.log(getURL);
                $.get(getURL, function(data, status){
                    console.log(data);
                    $('#model').html(data);
                });
            });
        });
    </script>
<?php require_once('cont/footer.php');
$conn->close();
?>
