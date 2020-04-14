<?php

// Check APIs are needed to update or Not.
$file = fopen("backend/json/api_updated_time.json", "r") or die("Unable to open file 01!");
$getTime = fgets($file);
$diffTime = time() - $getTime;

fclose($file);

// API won't update until 10 minutes after have been updated.
if($diffTime >= 600) {
    include_once('api_updated.php');
}
?>