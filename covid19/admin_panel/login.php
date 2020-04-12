<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareTech Admin Panel</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5">
                <?php 
                    // Login fail error report.
                    if(isset($_SESSION['auth']) && $_SESSION['auth'] == null) {
                        echo '<p class="text-danger text-center">Login Failed.</p>';
                    }

                ?>
                <form action="auth.php" method="post" class="p-5">
                    <div class="form-group">
                        <label for="auth_id">Login ID:</label>
                        <input class="form-control" type="text" name="auth_id" id="auth_id">
                    </div>
                    <div class="form-group">
                        <label for="auth_password">Login Password:</label>
                        <input class="form-control" type="password" name="auth_password" id="auth_password">
                    </div>

                    <button class="btn btn-info" type="submit">Login</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>