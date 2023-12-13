<?php
include 'db.php';

$departmentCounts = array();

$sql = "SELECT department FROM tbl_school_ids";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $department = $row["department"];
    if (isset($departmentCounts[$department])) {
        $departmentCounts[$department]++;
    } else {
        $departmentCounts[$department] = 1;
    }
}

$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($departmentCounts);
?>
