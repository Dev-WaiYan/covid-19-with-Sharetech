<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showSiteTraffic();
    } else {
        header('Location: auth.php');
    }
}


function showSiteTraffic() {
    setLogViewSiteTraffic();
    global $conn;

    // statement for total site-traffic.
    $stmt = $conn->prepare("SELECT COUNT(id) FROM site_traffic");
    if($stmt->execute()) {
        $total_traffic = $stmt->fetch();
    }

    // statement for selection box contents.
    $stmt = $conn->prepare("SELECT DISTINCT active_date FROM site_traffic ORDER BY active_date DESC");
    if($stmt->execute()) {
        $traffic_date = $stmt->fetchAll();
    }


?>

<!-- Start showSiteTraffic function. -->
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
            <div class="col-md-12">
                <h4 class="text-center">Website Traffics</h4>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 trafficBox">

                <div>
                    <h5>Total Traffics = <?php echo $total_traffic[0]; ?></h5>
                </div> 
                <hr>
                <br><br>

                <div class="text-center">
                    <h4>Traffic Analyse By Day</h4>
                    <form action="view_site_traffic_bytime.php" method="post">
                        <select class="form-control my-3" name="traffic_time" size="7" required>
                            <?php
                               foreach($traffic_date as $row) {
                                   echo "<option value='" . $row['active_date'] . "'>" . $row['active_date'] . "</option>";
                               }
                            ?>
                        </select>
                        <input class="viewTraffic" type="submit" value="View Traffic">
                    </form>
                </div>

                <a class="backdash" href="dashboard.php">Back to Dashboard</a>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>



</body>
</html>


<?php

} // End of showSiteTraffic function.
?>