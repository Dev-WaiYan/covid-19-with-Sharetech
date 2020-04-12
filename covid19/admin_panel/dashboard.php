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

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
</head>
<body>
    <!-- Main Dashboard Panel -->
    <div class="container" id="main_dashboard">
        <div class="row my-5">
            <div class="col-md-12 text-center m-4"><p>Admin Dashboard Panel</p></div>
            <div class="col-md-3">
                <div class="bg-info text-white p-5 text-center">
                    <p>Edit Record For Myanmar.</p>
                    <button class="btn btn-light" onclick="edit_myanmar_record()">Edit</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Record Myanmar Dashboard Panel -->
    <div class="container" id="edit_myanmar_panel">
        <div class="row my-5">
            <div class="col-md-12 text-center m-4"><p>Edit Myanmar Record Panel</p></div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="bg-info text-white p-5 text-center">
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
                            <button name="edit-confirm" class="btn btn-success" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
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