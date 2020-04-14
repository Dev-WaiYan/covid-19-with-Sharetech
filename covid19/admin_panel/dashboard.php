<?php
session_start();
ini_set('display_errors', 1);

// Check and redirect to 'Login' if unauthorized.

if(!isset($_SESSION['auth'])) {
    header('Location :auth.php');
} else if (isset($_SESSION['auth'])) {
    if($_SESSION['auth'] == true) {
        showDashboard();
    } else {
        header('Location: auth.php');
    }
}


function showDashboard() {

?>

<!-- Dashboard is at the following. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">
</head>
<body>
    <!-- Main Dashboard Panel -->
    <div class="container" id="main_dashboard">
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <h4>Admin Dashboard Panel</h4>
            </div>


            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>Edit Record For Myanmar</p>
                    <button class="adminBoxBtns" onclick="edit_myanmar_record()">Edit</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>Local News Panel</p>
                    <button class="adminBoxBtns mr-3" onclick="call_localnews_panel()">Add</button>
                    <a href="localnews_edit_list.php"><button class="adminBoxBtns">Edit</button></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>Global News Panel</p>
                    <button class="adminBoxBtns mr-3" onclick="call_globalnews_panel()">Add</button>
                    <a href="globalnews_edit_list.php"><button class="adminBoxBtns">Edit</button></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>View System Logs</p>
                    <a href="view_systemlogs.php"><button class="adminBoxBtns">View</button></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>View Website Traffic</p>
                    <a href="view_site_traffic.php"><button class="adminBoxBtns">View</button></a>
                </div>
            </div>


        </div>
    </div>


    <!-- Edit Record Myanmar Dashboard Panel -->
    <div class="container" id="edit_myanmar_panel">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Edit Record For Myanmar Cases</h4>
            </div>
            <div class="col-lg-6 col-md-8 col-10 myanmarCaseBox">
                    <form action="myanmar_recorded_confirm.php" method="post">
                        <div class="form-group">
                            <label for="new_case">New Case:</label>
                            <input class="form-control" type="text" name="new_case" id="new_case" required>
                        </div>

                        <div class="form-group">
                            <label for="active_case">Active Case:</label>
                            <input class="form-control" type="text" name="active_case" id="active_case" required>
                        </div>

                        <div class="form-group">
                            <label for="serious_case">Serious Case:</label>
                            <input class="form-control" type="text" name="serious_case" id="serious_case" required>
                        </div>

                        <div class="form-group">
                            <label for="total_case">Total Case:</label>
                            <input class="form-control" type="text" name="total_case" id="total_case" required>
                        </div>

                        <div class="form-group">
                            <label for="total_death">Total Death:</label>
                            <input class="form-control" type="text" name="total_death" id="total_death" required>
                        </div>

                        <div class="form-group">
                            <label for="total_recovered">Total Recovered:</label>
                            <input class="form-control" type="text" name="total_recovered" id="total_recovered" required>
                        </div>

                        <div class="form-group">
                            <button name="edit-confirm" class="myanmarCaseBtn" type="submit">Confirm</button>
                        </div>

                        <div class="myanmarCaseBtn">
                            <a href="">Discard</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <!-- Local News Dashboard Panel -->
    <div class="container" id="localnews_panel">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Local News Control Panel</h4>
            </div>
            <div class="col-md-8 localGlobal">
                <div>
                    <form action="localnews_recorded_confirm.php" method="post" enctype="multipart/form-data">
                        <div id="localImg">
                            Browse a image...
                        </div>
                        <div class="form-group">
                            <label for="localnews_title">News Title:</label>
                            <input class="form-control" type="text" name="localnews_title" id="localnews_title" required>
                        </div>
                        <div class="form-group">
                            <label for="localnews_body">News Body:</label>
                            <textarea class="form-control" name="localnews_body" id="localnews_body" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group" id="localImgClick">
                            <label for="localnews_main_photo">Photo Select:</label>
                            <input type="file" name="localnews_main_photo" id="localnews_main_photo" required>
                        </div>
                        <div class="form-group">
                            <input name="confirm_upload" class="localGlobalBtn" type="submit" value="Confirm Upload">
                        </div>

                        <div class="localGlobalBtn">
                            <a href="">Discard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Global News Dashboard Panel -->
    <div class="container" id="globalnews_panel">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Global News Control Panel</h4>
            </div>
            <div class="col-md-8 localGlobal">
                <div>
                    <form action="globalnews_recorded_confirm.php" method="post" enctype="multipart/form-data">
                        <div id="globalImg">
                            Browse a image...
                        </div>
                        <div class="form-group">
                            <label for="globalnews_title">News Title:</label>
                            <input class="form-control" type="text" name="globalnews_title" id="globalnews_title" required>
                        </div>
                        <div class="form-group">
                            <label for="globalnews_body">News Body:</label>
                            <textarea class="form-control" name="globalnews_body" id="globalnews_body" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group" id="globalImgClick">
                            <label for="globalnews_main_photo">Photo Select:</label>
                            <input type="file" name="globalnews_main_photo" id="globalnews_main_photo" required>
                        </div>
                        <div class="form-group">
                            <input name="confirm_upload" class="localGlobalBtn" type="submit" value="Confirm Upload">
                        </div>

                        <div class="localGlobalBtn">
                            <a href="">Discard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <!-- Admin dashboard JS -->
    <script src="../backend/js/admin_dashboard.js"></script>
</body>
</html>

<!-- End of dashboard. -->

<?php
} // End of scope for showDashboard.
?>