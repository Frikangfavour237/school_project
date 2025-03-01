<?php require('./templates/header.php') ?>
<?php require('./templates/navbar.php') ?>
<style>
    .table-responsive { overflow-x: auto; }
    .btn-yellow1 { background-color: #28a745; color: #fff; border: none; } /* Green button */
    .btn-yellow2 { background-color: #dc3545; color: #fff; border: none; } /* Red button */
    .box-shadow { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .btn-icon { background: none; border: none; color: #9e5510;}
    .bg-custom { background-color:rgb(235, 239, 245); }
</style>

<div id="layoutSidenav">
    <?php require('./templates/sidebar.php') ?>
    <div id="layoutSidenav_content" class="bg-custom">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Students</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Student management</li>
                </ol>

                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for a student..." onkeyup="filterTable()">
                </div>

                <div class="table-responsive box-shadow p-3 mb-4 bg-white rounded">
                    <table class="table table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Batch</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('../config/db.php'); // Include your database connection file

                            // Fetch students from the database
                            $result = $conn->query("SELECT * FROM users WHERE role = 'student'");

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['batch']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>';
                                echo '<button class="btn btn-yellow1" onclick="approveAttendance(' . $row['id'] . ')">Approve</button>';
                                echo '<button class="btn btn-yellow2" onclick="rejectAttendance(' . $row['id'] . ')">Reject</button>';
                                echo '</td>';
                                echo '</tr>';
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <button class="btn btn-yellow mt-3" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
                </div>

                <h2 class="mt-4">Attendance Requests</h2>
                <div class="table-responsive box-shadow p-3 mb-4 bg-white rounded">
                    <table class="table table-striped" id="attendanceTable">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('../config/db.php'); // Include your database connection file

                            // Fetch attendance requests from the database
                            $result = $conn->query("SELECT ar.id, u.fullname, ar.status FROM attendance_requests ar JOIN users u ON ar.student_id = u.id WHERE ar.status = 'pending'");

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                                echo '<td>';
                                echo '<button class="btn btn-yellow1" onclick="approveAttendance(' . $row['id'] . ')">Approve</button>';
                                echo '<button class="btn btn-yellow2" onclick="rejectAttendance(' . $row['id'] . ')">Reject</button>';
                                echo '</td>';
                                echo '</tr>';
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addStudentForm" action="add_student.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="studentName">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Batch</label>
                        <input type="text" class="form-control" id="address" name="batch" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="course" name="course" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-yellow" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-yellow">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const tableRows = document.querySelectorAll('#studentTable tbody tr');

        tableRows.forEach(row => {
            const studentName = row.cells[0].textContent.toLowerCase();
            const batch = row.cells[1].textContent.toLowerCase();
            const gender = row.cells[2].textContent.toLowerCase();
            const email = row.cells[3].textContent.toLowerCase();

            const isMatch = studentName.includes(searchTerm) || batch.includes(searchTerm) || gender.includes(searchTerm) || email.includes(searchTerm);

            row.style.display = isMatch ? '' : 'none';
        });
    }

    function approveAttendance(requestId) {
        fetch('approve_attendance.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'request_id=' + requestId,
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                alert('Attendance approved successfully.');
                location.reload();
            } else {
                alert('Error approving attendance.');
            }
        });
    }

    function rejectAttendance(requestId) {
        fetch('reject_attendance.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'request_id=' + requestId,
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                alert('Attendance rejected successfully.');
                location.reload();
            } else {
                alert('Error rejecting attendance.');
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>