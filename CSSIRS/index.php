<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CHMSU Seized School ID Information Repository System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-page">
    <div class="container">
        <div class="row login-row">
            <div class="col-md-6 header-col">
                <h2 class="header-h2"><strong>CHMSU Seized School ID Information Repository System</strong></h2>
                <img src="img/id.png" alt="ID Image" width="256px" class="login-page-img">
            </div>
            <div class="col-md-6">
                <div class="login-container">
                    <h2 class="login-h2">Login</h2>
                    <form action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-login">Login</button>
                        <?php
                        if (isset($_SESSION['error_message'])) {
                            echo "<p class='error-message'>".$_SESSION['error_message']."</p>";
                            unset($_SESSION['error_message']);
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
