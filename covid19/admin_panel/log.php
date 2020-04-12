<?php
ini_set('display_errors', 1);

require('../backend/db_conn.php');

// Default prepare statement for saving logs.
function help($log) {
    $stmt = $GLOBALS['conn']->prepare("INSERT INTO auth_log (log, created_time)
        VALUES (:log, :created_time)");
    $stmt->bindParam(':log',$log);
    $stmt->bindParam(':created_time',$created_time);

    $created_time = date('Y-m-d H:i:s');
    $stmt->execute();
}

// Log will save when admin panel opens.
function setLogLogin() {
    $log = "Logged in at " . date("Y-m-d h:i:sa");
    help($log);
}

// Log will save while admin records for myanmar.
function setLogMyanmarRecordUpdate() {
    $log = "Record for Myanmar is updated at " . date("Y-m-d h:i:sa");
    help($log);
}

?>