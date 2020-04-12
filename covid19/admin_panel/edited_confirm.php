<?php
session_start();
ini_set('display_errors', 1);

require('log.php');

// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        confirmEdited();
    } else {
        header('Location: auth.php');
    }
}


function confirmEdited() {
    $stmt = $GLOBALS['conn']->prepare("INSERT INTO country_myanmar (new_case, active_case, serious_case, total_case, total_death, total_recovered, recorded_time, am_pm)
        VALUES (:new_case, :active_case, :serious_case, :total_case, :total_death, :total_recovered, :recorded_time, :am_pm)");
    $stmt->bindParam(':new_case',$_POST['new_case']);
    $stmt->bindParam(':active_case',$_POST['active_case']);
    $stmt->bindParam(':serious_case',$_POST['serious_case']);
    $stmt->bindParam(':total_case',$_POST['total_case']);
    $stmt->bindParam(':total_death',$_POST['total_death']);
    $stmt->bindParam(':total_recovered',$_POST['total_recovered']);
    $stmt->bindParam(':recorded_time',$recorded_time);
    $stmt->bindParam(':am_pm',$am_pm);
    
    
    $recorded_time = date('Y-m-d H:i:s');
    $am_pm = date('a');
    
    if($stmt->execute()) {
        setLogMyanmarRecordUpdate();
        echo "<script>
            alert('Record updated successfully.');
            window.history.back();
            </script>";
    }
    
}


?>