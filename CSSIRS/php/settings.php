<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Settings - CHMSU Seized School ID Information Repository System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-custom">
        <a class="navbar-brand text-light" href="dashboard.php"><i class="fas fa-id-card"></i> CHMSU Seized School ID Information Repository System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Logged in as: <b><?php echo $_SESSION['username']; ?></b>&nbsp;<span style="padding:0 10px 0 20px;">|</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="settings.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Edit Account</h2>
                <form action="update_account.php" method="post">
                    <div class="form-group">
                        <label for="username">New Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Account</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
