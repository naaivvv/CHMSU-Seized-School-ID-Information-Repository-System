<?php
include 'db.php';

$departmentCounts = array();
$courseCounts = array();

$sql = "SELECT department, course FROM tbl_school_ids";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $department = $row["department"];
        $course = $row["course"];

        // Count department occurrences
        if (isset($departmentCounts[$department])) {
            $departmentCounts[$department]++;
        } else {
            $departmentCounts[$department] = 1;
        }

        // Count course occurrences
        if (isset($courseCounts[$course])) {
            $courseCounts[$course]++;
        } else {
            $courseCounts[$course] = 1;
        }
    }
}

$data = array("departments" => $departmentCounts, "courses" => $courseCounts);
echo json_encode($data);

$conn->close();
?>
