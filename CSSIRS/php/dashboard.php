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
                        <input type="text" class="form-control" id="department" name="department">
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="course" name="course">
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
                                    <label for="update_department">Department</label>
                                    <input type="text" class="form-control" id="update_department" name="department">
                                </div>
                                <div class="form-group">
                                    <label for="update_course">Course</label>
                                    <input type="text" class="form-control" id="update_course" name="course">
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
                echo '<td>
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

    $(document).ready(function(){
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
