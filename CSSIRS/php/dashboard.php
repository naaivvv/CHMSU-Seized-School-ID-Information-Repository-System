<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="container mt-4 text-center">
        <div class="chart-content mx-auto">
            <canvas id="departmentChart" width="400" height="200"></canvas>
        </div>
    </div>
<div class="container mt-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertModal">
            Insert Information
            </button>
    <div class="dashboard-content mt-4">
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel">Insert New Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insertForm" method="post" action="insert.php">
                    <div class="form-group">
                        <label for="chmsu_idnumber">CHMSU ID Number</label>
                        <input type="text" class="form-control" id="chmsu_idnumber" name="chmsu_idnumber">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department">
                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                            <option value="College of Business and Management Accountancy">College of Business and Management Accountancy</option>
                            <option value="College of Computer Studies">College of Computer Studies</option>
                            <option value="College of Criminal Justice">College of Criminal Justice</option>
                            <option value="College of Engineering">College of Engineering</option>
                            <option value="College of Education">College of Education</option>
                            <option value="College of Fisheries">College of Fisheries</option>
                            <option value="College of Industrial Technology">College of Industrial Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" id="course" name="course">
                            <option value="Bachelor of Arts in English Language">Bachelor of Arts in English Language</option>
                            <option value="Bachelor of Arts in Social Science">Bachelor of Arts in Social Science</option>
                            <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
                            <option value="Bachelor of Science in Applied Mathematics">Bachelor of Science in Applied Mathematics</option>
                            <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                            <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                            <option value="Bachelor of Science in Business Administration major in Financial Management">Bachelor of Science in Business Administration major in Financial Management</option>
                            <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Management Accounting">Bachelor of Science in Management Accounting</option>
                            <option value="Bachelor of Science in Office Administration">Bachelor of Science in Office Administration</option>
                            <option value="Bachelor of Science in Information Systems">Bachelor of Science in Information Systems</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                            <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                            <option value="Bachelor of Secondary Education with major in English">Bachelor of Secondary Education with major in English</option>
                            <option value="Bachelor of Secondary Education with major in Filipino">Bachelor of Secondary Education with major in Filipino</option>
                            <option value="Bachelor of Secondary Education with major in Mathematics">Bachelor of Secondary Education with major in Mathematics</option>
                            <option value="Bachelor of Secondary Education with major in Science">Bachelor of Secondary Education with major in Science</option>
                            <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option>
                            <option value="Bachelor of Technology and Livelihood Education major in Home Economics">Bachelor of Technology and Livelihood Education major in Home Economics</option>
                            <option value="Bachelor of Technology and Livelihood Education major in Home Industrial Arts">Bachelor of Technology and Livelihood Education major in Home Industrial Arts</option>
                            <option value="Bachelor of Technical Vocational Teacher Education major in Electrical Technology">Bachelor of Technical Vocational Teacher Education major in Electrical Technology</option>
                            <option value="Bachelor of Technical Vocational Teacher Education major in Electronics Technology">Bachelor of Technical Vocational Teacher Education major in Electronics Technology</option>
                            <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                            <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                            <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Drafting Technology">Bachelor of Science in Industrial Technology major in Architectural Drafting Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Automotive Technology">Bachelor of Science in Industrial Technology major in Architectural Automotive Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Computer Technology">Bachelor of Science in Industrial Technology major in Architectural Computer Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Electrical Technology">Bachelor of Science in Industrial Technology major in Architectural Electrical Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Electronics Technology">Bachelor of Science in Industrial Technology major in Architectural Electronics Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Fashion and Apparel Technology">Bachelor of Science in Industrial Technology major in Architectural Fashion and Apparel Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Food Trades Technology">Bachelor of Science in Industrial Technology major in Architectural Food Trades Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Architectural Mechanical Technology">Bachelor of Science in Industrial Technology major in Architectural Mechanical Technology</option>
                            <option value="Bachelor of Science in Industrial Technology major in Refrigeration and Air-conditioning Technology">Bachelor of Science in Industrial Technology major in Refrigeration and Air-conditioning Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm" method="post" action="update.php">
                                <div class="form-group">
                                    <label for="update_chmsu_idnumber">CHMSU ID Number</label>
                                    <input type="text" class="form-control" id="update_chmsu_idnumber" name="chmsu_idnumber" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="update_name">Name</label>
                                    <input type="text" class="form-control" id="update_name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                                        <option value="College of Business and Management Accountancy">College of Business and Management Accountancy</option>
                                        <option value="College of Computer Studies">College of Computer Studies</option>
                                        <option value="College of Criminal Justice">College of Criminal Justice</option>
                                        <option value="College of Engineering">College of Engineering</option>
                                        <option value="College of Education">College of Education</option>
                                        <option value="College of Fisheries">College of Fisheries</option>
                                        <option value="College of Industrial Technology">College of Industrial Technology</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select class="form-control" id="course" name="course">
                                        <option value="Bachelor of Arts in English Language">Bachelor of Arts in English Language</option>
                                        <option value="Bachelor of Arts in Social Science">Bachelor of Arts in Social Science</option>
                                        <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
                                        <option value="Bachelor of Science in Applied Mathematics">Bachelor of Science in Applied Mathematics</option>
                                        <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                                        <option value="Bachelor of Science in Business Administration major in Financial Management">Bachelor of Science in Business Administration major in Financial Management</option>
                                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                                        <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                                        <option value="Bachelor of Science in Management Accounting">Bachelor of Science in Management Accounting</option>
                                        <option value="Bachelor of Science in Office Administration">Bachelor of Science in Office Administration</option>
                                        <option value="Bachelor of Science in Information Systems">Bachelor of Science in Information Systems</option>
                                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                                        <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                                        <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
                                        <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                                        <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                                        <option value="Bachelor of Secondary Education with major in English">Bachelor of Secondary Education with major in English</option>
                                        <option value="Bachelor of Secondary Education with major in Filipino">Bachelor of Secondary Education with major in Filipino</option>
                                        <option value="Bachelor of Secondary Education with major in Mathematics">Bachelor of Secondary Education with major in Mathematics</option>
                                        <option value="Bachelor of Secondary Education with major in Science">Bachelor of Secondary Education with major in Science</option>
                                        <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option>
                                        <option value="Bachelor of Technology and Livelihood Education major in Home Economics">Bachelor of Technology and Livelihood Education major in Home Economics</option>
                                        <option value="Bachelor of Technology and Livelihood Education major in Home Industrial Arts">Bachelor of Technology and Livelihood Education major in Home Industrial Arts</option>
                                        <option value="Bachelor of Technical Vocational Teacher Education major in Electrical Technology">Bachelor of Technical Vocational Teacher Education major in Electrical Technology</option>
                                        <option value="Bachelor of Technical Vocational Teacher Education major in Electronics Technology">Bachelor of Technical Vocational Teacher Education major in Electronics Technology</option>
                                        <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                                        <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Drafting Technology">Bachelor of Science in Industrial Technology major in Architectural Drafting Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Automotive Technology">Bachelor of Science in Industrial Technology major in Architectural Automotive Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Computer Technology">Bachelor of Science in Industrial Technology major in Architectural Computer Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Electrical Technology">Bachelor of Science in Industrial Technology major in Architectural Electrical Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Electronics Technology">Bachelor of Science in Industrial Technology major in Architectural Electronics Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Fashion and Apparel Technology">Bachelor of Science in Industrial Technology major in Architectural Fashion and Apparel Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Food Trades Technology">Bachelor of Science in Industrial Technology major in Architectural Food Trades Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Architectural Mechanical Technology">Bachelor of Science in Industrial Technology major in Architectural Mechanical Technology</option>
                                        <option value="Bachelor of Science in Industrial Technology major in Refrigeration and Air-conditioning Technology">Bachelor of Science in Industrial Technology major in Refrigeration and Air-conditioning Technology</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="update_address">Address</label>
                                    <input type="text" class="form-control" id="update_address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="update_remarks">Remarks</label>
                                    <input type="text" class="form-control" id="update_remarks" name="remarks">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">CHMSU ID Number</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Course</th>
                <th scope="col">Address</th>
                <th scope="col">Remarks</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'db.php';

        $sql = "SELECT chmsu_idnumber, name, department, course, address, remarks FROM tbl_school_ids";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["chmsu_idnumber"]. "</td>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["department"]. "</td>";
                echo "<td>" . $row["course"]. "</td>";
                echo "<td>" . $row["address"]. "</td>";
                echo "<td>" . $row["remarks"]. "</td>";
                echo '<td width="200px">
                        <button class="btn btn-primary update-btn" data-toggle="modal" data-target="#updateModal" data-chmsu-id="' . $row["chmsu_idnumber"] . '">Update</button>&nbsp;
                        <form method="post" action="delete.php" style="display:inline;">
                            <input type="hidden" name="chmsu_idnumber" value="' . $row["chmsu_idnumber"] . '">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>';
                echo "</tr>";
            }
        }
        $conn->close();
        ?>
        </tbody>
    </table>
    </div>
</div>
<script>
$(document).ready(function () {
    // AJAX request to fetch department and course counts
    $.ajax({
        url: 'chart_data.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Prepare data for Chart.js
            var departmentLabels = Object.keys(data.departments);
            var departmentData = Object.values(data.departments);

            var courseLabels = Object.keys(data.courses);
            var courseData = Object.values(data.courses);

            // Render the bar chart
            var ctx = document.getElementById('departmentChart').getContext('2d');
            var departmentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: departmentLabels,
                    datasets: [{
                        label: 'Department Counts',
                        data: departmentData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Course Counts',
                        data: courseData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (error) {
            console.error('Error fetching department and course data:', error);
        }
    });

        $('.update-btn').click(function(){
            var chmsuId = $(this).data('chmsu-id');
            var name = $(this).closest('tr').find('td:eq(1)').text();
            var department = $(this).closest('tr').find('td:eq(2)').text();
            var course = $(this).closest('tr').find('td:eq(3)').text();
            var address = $(this).closest('tr').find('td:eq(4)').text();
            var remarks = $(this).closest('tr').find('td:eq(5)').text();

            $('#update_chmsu_idnumber').val(chmsuId);
            $('#update_name').val(name);
            $('#update_department').val(department);
            $('#update_course').val(course);
            $('#update_address').val(address);
            $('#update_remarks').val(remarks);
        });

});


</script>
</body>
</html>
