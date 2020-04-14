<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        if(isset($_POST['traffic_time'])) {
            showSiteTrafficByTime();
        } else {
            header('Location: auth.php');
        }
    } else {
        header('Location: auth.php');
    }
}


function showSiteTrafficByTime() {
    global $conn;

    // GET time from selection box.
    $traffic_time = $_POST['traffic_time'];

    // statement for total site-traffic by TIME.
    $stmt = $conn->prepare("SELECT COUNT(id) FROM site_traffic WHERE active_date = :traffic_date");

    $stmt->bindParam(':traffic_date',$traffic_time);
    if($stmt->execute()) {
        $total_traffic = $stmt->fetch();
    }


?>

<!-- Start showSiteTrafficByTime function. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - System Logs</title>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">

</head>
<body>
    <div class="container traffic" id="system_log">
        <div class="row">
            <div class="col-md-12"><h4 class="text-center">Website Traffics</h4></div>
            <div class="col-md-2"></div>
            <div class="col-md-8 trafficDay">

                <div class="text-center">
                    <p>Total Traffics in <?php echo $_POST['traffic_time']; ?> is </p>
                    <h3><?php echo $total_traffic[0]; ?></h3>
                </div>
                <br>

                <a class="backtraffic" href="view_site_traffic.php">Back to Total Traffics</a>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>



</body>
</html>


<?php

} // End of showSiteTrafficByTime function.
?>