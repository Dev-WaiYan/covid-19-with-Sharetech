<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showGlobalnewsEditView();
    } else {
        header('Location: auth.php');
    }
}


function showGlobalnewsEditView() {
    if(isset($_POST['news_id'])) {
        $news_id = $_POST['news_id'];
    } else {
        header('Location: globalnews_edit_list.php');
    }

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM global_news WHERE id = :news_id");
    $stmt->bindParam(':news_id',$news_id);
    if($stmt->execute()) {
        $result = $stmt->fetch();
    }

?>

<!-- Start showGlobalnewsEditView function. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">

</head>
<body>
    <div class="container localGlobalEdit">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Global News Setting</h4>
            </div>
            <div class="col-md-8 localGlobalEditBox">
                <div class="m-4">    
                    <a class="text-primary" onclick="(function(){ window.history.back(); }) ();">Back to list</a>
                </div>

                <div>
                    <form id="form" action='globalnews_edited_confirm.php' method="POST" enctype="multipart/form-data">
                        <div id="edit_typebox"></div>

                        <div class="form-group">
                            <img class="img-thumbnail localGlobalImg" src="../globalnews_img/<?php echo $result['img'] ?>" alt="">
                        </div>

                        <div class="globalImgClick">
                            Browse...
                        </div>

                        <div class="form-group localGlobalImgBtn">
                            <input type="file" name="globalnews_main_photo" id="globalnews_main_photo">
                        </div>

                        <div class="form-group">
                            <label for="news_title">Current News Title:</label>
                            <input class="form-control" type="text" name="news_title" id="news_title" value="<?php echo $result['news_title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="news_body">Current News Body:</label>
                            <textarea class="form-control" name="news_body" id="news_body" cols="30" rows="10"><?php echo $result['news_body'] ?></textarea>
                        </div>
                        
                    </form>
                   <div>    
                        <button class="localGlobalEditBtn" onclick="update()">Update</button>
                        <button class="localGlobalEditBtn" onclick="remove()">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.globalImgClick').click(function() {
            $('#globalnews_main_photo').click();
        });
    });
</script>

<!-- Scripts -->
<script>
    function update() {
        document.getElementById('edit_typebox').innerHTML += '<input type="hidden" name="news_id" value="' + <?php echo $result['id'] ?> + '">';
        document.getElementById('edit_typebox').innerHTML += '<input type="hidden" name="edit_type" value="update">';
        document.getElementById('form').submit(); 
    }

    function remove() {
        document.getElementById('edit_typebox').innerHTML += '<input type="hidden" name="news_id" value="' + <?php echo $result['id'] ?> + '">';
        document.getElementById('edit_typebox').innerHTML += '<input type="hidden" name="edit_type" value="remove">';
        document.getElementById('form').submit(); 
    }
</script>


</body>
</html>


<?php

} // End of showGlobalnewsEditView function.
?>
