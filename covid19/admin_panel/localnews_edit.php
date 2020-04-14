<?php
session_start();
ini_set('display_errors', 1);

require('log.php');


// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showLocalnewsEditView();
    } else {
        header('Location: auth.php');
    }
}


function showLocalnewsEditView() {
    if(isset($_POST['news_id'])) {
        $news_id = $_POST['news_id'];
    } else {
        header('Location: localnews_edit_list.php');
    }

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM local_news WHERE id = :news_id");
    $stmt->bindParam(':news_id',$news_id);
    if($stmt->execute()) {
        $result = $stmt->fetch();
    }

?>

<!-- Start showLocalnewsEditView function. -->
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
    <div class="container systemLog" id="system_log">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Local News Setting</h4>
            </div>
            <div class="col-md-8 systemLogBox">
                <div class="m-4">    
                    <a id="backtodash" href="dashboard.php">Back to Dashboard</a>
                    <a class="text-primary ml-4" onclick="(function(){ window.history.back(); }) ();">Back to list</a>
                </div>

                <div class="m-4">    
                    <button class="my-3 form-control btn btn-success" onclick="update()">Update</button>
                    <button class="my-3 form-control btn btn-danger" onclick="remove()">Remove</button>
                </div>

                <div>
                    <form id="form" action='localnews_edited_confirm.php' method="POST" enctype="multipart/form-data">
                        <div id="edit_typebox"></div>

                        <div class="form-group">
                            <label for="news_title">Current News Title:</label>
                            <input class="form-control" type="text" name="news_title" id="news_title" value="<?php echo $result['news_title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="news_body">Current News Body:</label>
                            <textarea class="form-control" name="news_body" id="news_body" cols="30" rows="10"><?php echo $result['news_body'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <p>Current News Photo: <img class="ml-5 img-thumbnail" width="200px" height="200px" src="../localnews_img/<?php echo $result['img'] ?>" alt=""></p>
                        </div>
                        <div class="form-group mt-5">
                            <label for="localnews_main_photo">News Photo : <span class="text-info">(Optional)</span></label>
                            <input type="file" name="localnews_main_photo" id="localnews_main_photo">
                        </div>
                    </form>
                    <button class="my-3 form-control btn btn-success" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </div>


   



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

} // End of showLocalnewsEditView function.
?>
