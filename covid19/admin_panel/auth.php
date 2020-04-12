<?php
session_start();
ini_set('display_errors', 1);

require('log.php');

if(isset($_POST['auth_id']) && isset($_POST['auth_password'])) {
    if($_POST['auth_id'] == "2020-007" && $_POST['auth_password'] == "share@#tech@#007") {
        $_SESSION['auth'] = true;
        setLogLogin();
    } else {
        $_SESSION['auth'] = false;
    }
}

if(isset($_SESSION['auth'])) {
    if($_SESSION['auth']) {
        header('Location: dashboard.php');
    } else if($_SESSION['auth'] == null) {
        require('login.php');
    }
}

if(!isset($_SESSION['auth'])) {
    require('login.php');
}

?>