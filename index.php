<?php
// session_start();
require_once("cont/connection.php");

$sql = "SELECT DISTINCT brand FROM car_info ";
$result_set = $conn->query($sql);

$brand_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$brand_list .= "<option value=\"{$result['brand']}\">{$result['brand']}</option>";
	}
?>

<?php 

if (isset($_SESSION["u_email"])){
    $user_email = $_SESSION["u_email"];
    $user_password = $_SESSION["u_password"];

    $sql = "SELECT email, password FROM admins WHERE email='$user_email' AND password='$user_password' ";
    $result = $conn->query($sql);

    $sql_2 = "SELECT email, password FROM car_owners WHERE email='$user_email' AND password='$user_password' ";
    $result_2 = $conn->query($sql_2);

    if ($result -> num_rows > 0) {
        require_once('cont/header_admin.php');
    } else {
        if ($result_2 -> num_rows > 0) {
            require_once('cont/header_strip.php');
        } else {
            require_once('cont/header.php');
        }
    }
} else {
    require_once('cont/header.php');
}


?>
    <section class="hero-container">
        <div class="hero">
            <h1>Find your dream<br><span>Car.</span></h1>
            <div class="form" id="front-page-search">
                <div class="section-title" id="search-title-top" >Search Cars</div>
                <form action="get_select_action.php" method="post">
                    <div class="select ic1" id="select-dropdown">
                    <!-- <div class="select"> -->
                        <!-- <label for="brand">Select Brand:</label> -->
                        <select required name="brand" id="brand">
                            <option value="" disabled selected hidden>Select Brand</option>
                            <?php echo $brand_list; ?>
                        </select>
                    <!-- </div> -->
                    </div>
                    <div class="select ic2" id="select-dropdown">
                        <!-- <label for="model">Select Model:</label> -->
                        <select required name="model" id="model">
                            <option value="" disabled selected hidden>Select Model</option>
                            
                        </select>
                    </div>
                    <input id="search-submit" class="submit" type="submit" value="Search">
                </form>
            </div>
        </div>
        <a href="#card-container-main" id="hero-button" > 
        <div class="hero-button">
            <div>
            
            <!-- <i class="fa fa-angle-down" aria-hidden="true"></i> -->
            <!-- <i class='fas fa-angle-double-down' style='font-size:48px;color:red'></i> -->
            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </div>
        </div>
        </a>
        <div class="separator"></div>
    </section>

    <br><br>
    <div class="card-container-main" id="card-container-main">
    <?php require_once('auto_car_list.php'); ?>
    <div class="separator"></div>
    </div>
    
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
        $("#hero-button").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#card-container-main").offset().top
            }, 2000);
        });
    </script>
<?php require_once('cont/footer.php');
$conn->close();
?>
