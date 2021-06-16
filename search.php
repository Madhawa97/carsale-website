<?php
// session_start();

// require("connection.php");

$servername = "localhost";
$username = "root";
$pass = "root";
$dbname = "car_sale";

// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        
$sql = "SELECT DISTINCT brand FROM car_info ";
$result_set = $conn->query($sql);

$brand_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$brand_list .= "<option value=\"{$result['brand']}\">{$result['brand']}</option>";
	}
    //------------
    // echo $brand_list;

    //----------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        select:invalid { color: lightgray; }
    </style>
</head>
<body>
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
                    // console.log(brand);
                    // console.log(data);
                });
            });
        });
    </script>
</body>
</html>