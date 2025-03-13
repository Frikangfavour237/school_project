<?php
session_start(); // Start the session before any HTML output
require('../config/db.php'); // Include your database connection file
?>
<?php require('./templates/header.php') ?>
<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">
    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Attendance Record</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Record</li>
                </ol>
             
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>Date and time</th>
                                <th>Status</th>
                                <th>Present</th>
                                <th>Absent</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>Date and time</th>
                                <th>Status</th>
                                <th>Present</th>
                                <th>Absent</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Check if the student ID is set in the session
                            if (isset($_SESSION['stud_id'])) {
                                $student_id = $_SESSION['stud_id'];

                                // Fetch attendance records for the logged-in student
                                $stmt = $conn->prepare("SELECT u.fullname, u.batch, ar.date, ar.status FROM attendance_requests ar JOIN users u ON ar.student_id = u.id WHERE ar.student_id = ?");
                                $stmt->bind_param("i", $student_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['batch']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                                    echo '<td>' . ($row['status'] == 'approved' ? 'Yes' : '') . '</td>';
                                    echo '<td>' . ($row['status'] == 'rejected' ? 'Yes' : '') . '</td>';
                                    echo '</tr>';
                                }

                                $stmt->close();
                            } else {
                                echo '<tr><td colspan="6">No attendance records found.</td></tr>';
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

<?php require('./templates/footer.php') ?>