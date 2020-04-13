<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Required variable
$uploaded_time = time();


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        confirmRecorded();
    } else {
        header('Location: auth.php');
    }
}


function confirmRecorded() {
    global $uploaded_time;

    // Firstly check in uploading photo is successful or NOT.
    if( uploadNewsPhoto() ) {
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO global_news (img, news_title, news_body, recorded_time, am_pm, created_time)
        VALUES (:img, :news_title, :news_body, :recorded_time, :am_pm, :created_time)");
        
        $stmt->bindParam(':img',$img);
        $stmt->bindParam(':news_title',$_POST['globalnews_title']);
        $stmt->bindParam(':news_body',$_POST['globalnews_body']);
        $stmt->bindParam(':recorded_time',$recorded_time);
        $stmt->bindParam(':am_pm',$am_pm);
        $stmt->bindParam(':created_time',$created_time);
        
        $img = $uploaded_time . '_' . basename($_FILES["globalnews_main_photo"]["name"]);
        $recorded_time = date('Y-m-d h:i:s');
        $am_pm = date('a');
        $created_time = date('Y-m-d H:i:s');
        
        if($stmt->execute()) {
            setLogGlobalnewsRecorded();
            echo "<script>
                alert('Recorded successfully.');
                window.location.href = 'dashboard.php';
                </script>";
        }
        
    } else {
        echo "<script>
            alert('Failed to record global news.');
            window.location.href = 'dashboard.php';
        </script>";
    }
}

function uploadNewsPhoto() {
    global $uploaded_time;
    $target_dir = "../globalnews_img/";
    $target_file = $target_dir . $uploaded_time . '_' . basename($_FILES["globalnews_main_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["confirm_upload"])) {
        $check = getimagesize($_FILES["globalnews_main_photo"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size (Later use.)
    // if ($_FILES["localnews_main_photo"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["globalnews_main_photo"]["tmp_name"], $target_file)) {
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}