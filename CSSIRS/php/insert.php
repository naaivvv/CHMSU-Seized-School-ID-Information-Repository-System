<?php
// Include your database connection file here
require 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $chmsu_idnumber = $_POST['chmsu_idnumber'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $remarks = $_POST['remarks'];

    // Prepare an insert statement
    $sql = "INSERT INTO tbl_school_ids (chmsu_idnumber, name, department, course, address, remarks) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $chmsu_idnumber, $name, $department, $course, $address, $remarks);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Records created successfully. Redirect to landing page
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
