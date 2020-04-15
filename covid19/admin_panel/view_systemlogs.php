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
    <link rel="stylesheet" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">

</head>
<body>
    <div class="container systemLog" id="system_log">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">System Logs for Admin Panel</h4>
            </div>
            <div class="col-md-8 systemLogBox">
                
                <div id="logTable">
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
                <br>
                <div>
                    <button class="systemLogBtn" onclick="removeLogs()">
                        Remove Logs
                    </button>
                    <br>
                    <a id="backtodash" href="dashboard.php">Back to Dashboard</a>
                        
                </div>
            </div>
        </div>
    </div>


    <!-- Remove Log Confirm Alert -->
    <div class="container" id="remove_log_alert">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="card col-md-6 text-center">
              <div class="card-body">
                <h5 class="card-title text-danger">Please confirm to remove System Logs!</h5>
                <hr>

                <form class="bg-light p-5" action="remove_syslogs_confirm.php" method="POST">
                    <input class="removeBtn" type="submit" name="confirm" value="Yes, Confirm.">
                    <br><br>
                    <a href="" class="removeDiscard">Discard</a>
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
