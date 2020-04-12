<?php

// Check for API update.
include_once('check_api_update.php');


// Error log
ini_set('display_errors', 1);

// Call DB connection.
include('db_conn.php');

// Get user public IP.
$public_ip = "1.1.0.0";

// Helper
$actived_date = array();
$notregistered_ip = true;

// Checking user_ip has actived or not at today.
$stmt = $GLOBALS['conn']->prepare("SELECT * FROM site_traffic");
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row) {
   if($row['user_ip'] == $public_ip) {
       $actived_date[] = $row['active_date'];
   }
}

for($i = 0; $i < count($actived_date); $i++) {
    // Checking same user IP has entered at the same day or not.
    if(date('Y-m-d') == $actived_date[$i]) {
        $notregistered_ip = false;
        break;
    }
}

if($notregistered_ip) {
    setNewTraffic($public_ip);
}


function setNewTraffic($public_ip) {
    // // Call DB connection.
    require('db_conn.php');

    // prepare sql and bind parameters to insert 'Traffic Data'.
    $stmt = $conn->prepare("INSERT INTO site_traffic (user_ip, active_time, am_pm, active_date)
    VALUES (:user_ip, :active_time, :am_pm, :active_date)");

    $stmt->bindParam(':user_ip', $user_ip);
    $stmt->bindParam(':active_time', $active_time);
    $stmt->bindParam(':am_pm', $am_pm);
    $stmt->bindParam(':active_date', $active_date);

    // Insert 'Traffic Data'.
    $user_ip = $public_ip;
    $active_time = date("Y-m-d h:i:s");
    $am_pm = date("a");
    $active_date = date("Y-m-d");
    $stmt->execute();
}

?>