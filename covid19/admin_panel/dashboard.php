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
                    <p>Edit Record For Myanmar</p>
                    <button class="adminBoxBtns" onclick="edit_myanmar_record()">Edit</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminBoxes">
                    <p>Edit Record For Myanmar</p>
                    <button class="adminBoxBtns" onclick="edit_myanmar_record()">Edit</button>
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
                    <form action="edited_confirm.php" method="post">
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
                    </form>
            </div>
        </div>
    </div>



    <!-- Admin dashboard JS -->
    <script src="../backend/js/admin_dashboard.js"></script>
</body>
</html>

<!-- End of dashboard. -->

<?php
} // End of scope for showDashboard.
?>