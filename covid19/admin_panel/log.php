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


// Log will save while admin makes local news.
function setLogLocalnewsRecorded() {
    $log = "Local news recorded at " . date("Y-m-d h:i:sa");
    help($log);
}


// Log will save while admin edits local news.
function setLogLocalnewsUpdated($newsID) {
    $log = "Local news updated at " . date("Y-m-d h:i:sa") . ". News ID is -> " . $newsID;
    help($log);
} 


// Log will save while admin edits local news.
function setLogLocalnewsDeleted($newsTitle) {
    $log = "Local news removed at " . date("Y-m-d h:i:sa") . ". News Title is -> " . $newsTitle;
    help($log);
}


// Log will save while admin edits global news.
function setLogGlobalnewsUpdated($newsID) {
    $log = "Global news updated at " . date("Y-m-d h:i:sa") . ". News ID is -> " . $newsID;
    help($log);
}


// Log will save while admin edits global news.
function setLogGlobalnewsDeleted($newsTitle) {
    $log = "Global news removed at " . date("Y-m-d h:i:sa") . ". News Title is -> " . $newsTitle;
    help($log);
}



// Log will save while admin makes global news.
function setLogGlobalnewsRecorded() {
    $log = "Global news recorded at " . date("Y-m-d h:i:sa");
    help($log);
}

// Log will save while admin views system logs.
function setLogViewSysLogs() {
    $log = "System logs are viewed at " . date("Y-m-d h:i:sa");
    help($log);
}


// Log will save while admin views site-traffic.
function setLogViewSiteTraffic() {
    $log = "Site traffics are viewed at " . date("Y-m-d h:i:sa");
    help($log);
}

?>