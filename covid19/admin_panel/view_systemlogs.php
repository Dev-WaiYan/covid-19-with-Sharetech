<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showSystemLogs();
    } else {
        header('Location: auth.php');
    }
}


function showSystemLogs() {
    setLogViewSysLogs();
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM auth_log ORDER BY id DESC");
    if($stmt->execute()) {
        $result = $stmt->fetchAll();
    }

?>

<!-- Start showSystemLogs function. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - System Logs</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">

</head>
<body>
    <div class="container" id="system_log">
        <div class="row my-5">
            <div class="col-md-12 my-5"><h5 class="text-center">System Logs for Admin Panel</h5></div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="m-4">
                    <button class="btn btn-danger" onclick="removeLogs()">Remove Logs</button>
                    <a class="btn btn-warning ml-5" href="dashboard.php">Back to Dashboard</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Log No.</th>
                            <th>System Logs</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 0;
                            foreach($result as $row) {
                                $count++;
                                echo "
                                    <tr>
                                        <td>" . $count . "</td>
                                        <td>" . $row['log'] . "</td>
                                        <td>" . $row['created_time'] . "</td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!-- Remove Log Confirm Alert -->
    <div class="container" id="remove_log_alert">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="my-5 text-center">
                    <form class="bg-light p-5" action="remove_syslogs_confirm.php" method="POST">
                        <p class="text-danger">Please confirm to remove 'System Logs'!</p> <hr>
                        <input class="form-control btn btn-success" type="submit" name="confirm" value="Yes, Confirm.">
                        <br><br>
                        <a class="form-control btn btn-warning" href="">Discard</a>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



<!-- Scripts -->
<script>
    function removeLogs() {
        document.getElementById('system_log').style.display = 'none';
        document.getElementById('remove_log_alert').style.display = 'initial';
    }
</script>

</body>
</html>


<?php

} // End of showSystemLogs function.
?>
