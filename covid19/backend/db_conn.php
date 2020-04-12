<?php

// Set default time-zone at Yangon - Myanmar.
date_default_timezone_set('Asia/Yangon');

// Connection Establish.
$servername = "localhost";
$username = "root";
$password = "root";

try {
        $conn = new PDO("mysql:host=$servername;dbname=covid", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>