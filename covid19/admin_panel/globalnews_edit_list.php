<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showGlobalnewsList();
    } else {
        header('Location: auth.php');
    }
}


function showGlobalnewsList() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM global_news ORDER BY id DESC");
    if($stmt->execute()) {
        $result = $stmt->fetchAll();
    }

?>

<!-- Start showGlobalnewsList function. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">

</head>
<body>
    <div class="container systemLog" id="system_log">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Global News List</h4>
            </div>
            <div class="col-md-8 systemLogBox">
                <div class="m-4">    
                    <a id="backtodash" href="dashboard.php">Back to Dashboard</a>
                </div>
                <div id="logTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>News ID</th>
                                <th>News Title</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
            
                            <?php
                                foreach($result as $row) {
                                    echo "
                                        <tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['news_title'] . "</td>
                                            <td>
                                                <form action='globalnews_edit.php' method='POST'>
                                                    <input name='news_id' type='hidden' value='" . $row['id'] . "'>
                                                    <input type='submit' class='btn btn-light' value='Edit'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>


<?php

} // End of showGlobalnewsList function.
?>
