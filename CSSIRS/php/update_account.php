<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];
    $currentUser = $_SESSION['username'];

    // Update user's account information in the database
    $sql = "UPDATE tbl_user SET username=?, password=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $newUsername, $newPassword, $currentUser);

    if ($stmt->execute()) {
        // Update successful, set the new username in the session
        $_SESSION['username'] = $newUsername;

        // Close the prepared statement
        $stmt->close();

        // Display a JavaScript alert
        echo '<script>';
        echo 'alert("Account updated successfully!");';
        echo 'window.location.href = "settings.php";';  // Redirect to the edit account page
        echo '</script>';
        exit();
    } else {
        // Handle the case where the update fails
        echo '<script>';
        echo 'alert("Error updating account. Please try again.");';
        echo 'window.location.href = "settings.php";';  // Redirect to the edit account page
        echo '</script>';
        exit();
    }
}
?>
