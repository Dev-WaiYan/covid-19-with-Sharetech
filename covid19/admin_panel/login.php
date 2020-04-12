<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareTech Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/library/bootstrap/css/bootstrap.min.css">
    <!-- Style_admin CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-10 loginBox">
                <h3>Login Form</h3>
                <?php 
                    // Login fail error report.
                    if(isset($_SESSION['auth']) && $_SESSION['auth'] == null) {
                        echo '<p class="text-danger text-center loginErrorAlert">
                        <b>Login Failed.</b>
                        </p>';
                    }

                ?>
                <br><br>
                <form action="auth.php" method="post">
                    <div class="form-group">
                        <label for="auth_id">Login ID:</label>
                        <input class="form-control" type="text" name="auth_id" id="auth_id">
                    </div>
                    <div class="form-group">
                        <label for="auth_password">Login Password:</label>
                        <input class="form-control" type="password" name="auth_password" id="auth_password">
                    </div>

                    <button type="submit" class="loginBtn">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>