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
        if(isset($_POST['edit_type'])) {
            // Check type of Edition.
            switch($_POST['edit_type']) {
                case 'update' :
                    confirmUpdate();
                break;
                case 'remove' :
                    confirmRemove();
                break;
            }
        } else {
            header('Location: auth.php');
        }
    } else {
        header('Location: auth.php');
    }
}


function confirmUpdate() {
    global $conn;
    if($_FILES['localnews_main_photo']['name'] != '') {
        if(uploadNewsPhoto()) {
            global $uploaded_time;
            $stmt = $conn->prepare("UPDATE local_news SET img=:img,news_title=:news_title, news_body=:news_body WHERE id=:news_id");
            
            $stmt->bindParam(':img',$img);
            $stmt->bindParam(':news_title',$_POST['news_title']);
            $stmt->bindParam(':news_body',$_POST['news_body']);
            $stmt->bindParam(':news_id',$_POST['news_id']);

            $img = $uploaded_time . '_' . basename($_FILES["localnews_main_photo"]["name"]);
        }
    }
    else {
        $stmt = $conn->prepare("UPDATE local_news SET news_title=:news_title, news_body=:news_body WHERE id=:news_id");
        $stmt->bindParam(':news_title',$_POST['news_title']);
        $stmt->bindParam(':news_body',$_POST['news_body']);
        $stmt->bindParam(':news_id',$_POST['news_id']);
    }
    
    if($stmt->execute()) {
        setLogLocalnewsUpdated($_POST['news_id']);
        echo "
            <script>
                alert('Updated News.');
                window.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "Fail to Update! Something went wrong.";
    }
}



function confirmRemove() {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM local_news WHERE id = :id");
    $stmt->bindParam(':id',$_POST['news_id']);
    if($stmt->execute()) {
        setLogLocalnewsDeleted($_POST['news_title']);
        echo "
            <script>
                alert('Successfully Removed.');
                window.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "Fail to Remove! Something went wrong.";
    }
}



// Function will work while updating new photo.
function uploadNewsPhoto() {
    global $uploaded_time;
    $target_dir = "../localnews_img/";
    $target_file = $target_dir . $uploaded_time . '_' . basename($_FILES["localnews_main_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["confirm_upload"])) {
        $check = getimagesize($_FILES["localnews_main_photo"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["localnews_main_photo"]["tmp_name"], $target_file)) {
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



?>