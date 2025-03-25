<?php
session_start(); // Start the session before any HTML output
require('../config/db.php'); // Include your database connection file

// Function to generate an array of dates between two dates, excluding weekends
function getDatesFromRange($start, $end) {
    $dates = [];
    $current = strtotime($start);
    $end = strtotime($end);

    while ($current <= $end) {
        $dayOfWeek = date('N', $current); // Get the day of the week (1 = Monday, 7 = Sunday)
        if ($dayOfWeek < 6) { // Skip weekends (Saturday and Sunday)
            $dates[] = date('Y-m-d', $current);
        }
        $current = strtotime('+1 day', $current);
    }

    return $dates;
}
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
                                <th>Date</th>
                                <th>Day</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Check if the student ID is set in the session
                            if (isset($_SESSION['stud_id'])) {
                                $student_id = $_SESSION['stud_id'];

                                // Define the date range (e.g., the current semester)
                                $start_date = '2025-03-01'; // Replace with the actual start date
                                $end_date = date('Y-m-d'); // Current date

                                // Generate all dates within the range, excluding weekends
                                $all_dates = getDatesFromRange($start_date, $end_date);

                                // Fetch attendance records for the logged-in student
                                $stmt = $conn->prepare("SELECT date, status FROM attendance WHERE student_id = ?");
                                $stmt->bind_param("i", $student_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Store attendance records in an associative array
                                $attendance_records = [];
                                while ($row = $result->fetch_assoc()) {
                                    $attendance_records[$row['date']] = $row['status'];
                                }

                                // Display attendance records for each date in the range
                                foreach ($all_dates as $date) {
                                    $dayOfWeek = date('l', strtotime($date)); // Get the day of the week
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($date) . '</td>';
                                    echo '<td>' . htmlspecialchars($dayOfWeek) . '</td>';
                                    if (isset($attendance_records[$date])) { // Check if there is an attendance record for this date
                                        echo '<td>present</td>'; // Display "present" if the record exists
                                    } else {
                                        echo '<td>absent</td>'; // Display "absent" if the record does not exist
                                    }
                                    echo '</tr>';
                                }

                                $stmt->close();
                            } else {
                                echo '<tr><td colspan="3">No attendance records found.</td></tr>';
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