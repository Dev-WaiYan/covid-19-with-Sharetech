<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        if(isset($_POST['confirm'])) {
            deleteLogs();
        } else {
            header('Location: auth.php');
        }
    } else {
        header('Location: auth.php');
    }
}


function deleteLogs() {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM auth_log");
    if($stmt->execute()) {
        echo "
            <script>
                alert('System Logs are removed.');
                window.location.href = 'dashboard.php';
            </script>
        ";
    }
}


?>