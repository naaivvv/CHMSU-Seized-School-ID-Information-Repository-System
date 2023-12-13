<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // start the session and redirect to a different page
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
    } else {
        session_start(); // Start the session before setting the error message
        $_SESSION['error_message'] = "Invalid username or password.";
        header('Location: ../index.php');
    }
}
?>
