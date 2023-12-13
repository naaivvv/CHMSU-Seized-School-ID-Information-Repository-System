<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $chmsu_idnumber = $_POST['chmsu_idnumber'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $remarks = $_POST['remarks'];

    // Prepare an update statement
    $sql = "UPDATE tbl_school_ids SET name=?, department=?, course=?, address=?, remarks=? WHERE chmsu_idnumber=?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $name, $department, $course, $address, $remarks, $chmsu_idnumber);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Records updated successfully. Redirect to landing page
            header("location: dashboard.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

