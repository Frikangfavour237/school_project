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

// Define the date range (e.g., the current semester)
$start_date = '2025-03-01'; // Replace with the actual start date
$end_date = date('Y-m-d'); // Current date

// Generate all dates within the range, excluding weekends
$all_dates = getDatesFromRange($start_date, $end_date);

// Total number of classes
$total_classes = count($all_dates);

// Fetch attendance records for the logged-in student
$student_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT date, status FROM attendance WHERE student_id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

// Store attendance records in an associative array
$attendance_records = [];
while ($row = $result->fetch_assoc()) {
    $attendance_records[$row['date']] = $row['status'];
}

// Calculate the number of classes attended and missed
$classes_attended = 0;
$classes_missed = 0;
foreach ($all_dates as $date) {
    if (isset($attendance_records[$date]) && $attendance_records[$date] == 'present') {
        $classes_attended++;
    } else {
        $classes_missed++;
    }
}

$stmt->close();
$conn->close();
?>

<?php require('./templates/header.php') ?>
<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-#c8e6f0">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <span>Manage</span>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <!-- Mark Present Section -->
        
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-4">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#9e5510" fill="none">
                                    <path d="M16 14C16 14.8284 16.6716 15.5 17.5 15.5C18.3284 15.5 19 14.8284 19 14C19 13.1716 18.3284 12.5 17.5 12.5C16.6716 12.5 16 13.1716 16 14Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M18.9 8C18.9656 7.67689 19 7.34247 19 7C19 4.23858 16.7614 2 14 2C11.2386 2 9 4.23858 9 7C9 7.34247 9.03443 7.67689 9.10002 8" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M7 7.99324H16C18.8284 7.99324 20.2426 7.99324 21.1213 8.87234C22 9.75145 22 11.1663 22 13.9961V15.9971C22 18.8269 22 20.2418 21.1213 21.1209C20.2426 22 18.8284 22 16 22H10C6.22876 22 4.34315 22 3.17157 20.8279C2 19.6557 2 17.7692 2 13.9961V11.9952C2 8.22211 2 6.33558 3.17157 5.16344C4.11466 4.2199 5.52043 4.03589 8 4H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg> Total classes: <?php echo $total_classes; ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="arecord.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-4">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#9e5510" fill="none">
                                    <path d="M17 2V5M7 2V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13 3.5H11C7.22876 3.5 5.34315 3.5 4.17157 4.67157C3 5.84315 3 7.72876 3 11.5V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C21 19.6569 21 17.7712 21 14V11.5C21 7.72876 21 5.84315 19.8284 4.67157C18.6569 3.5 16.7712 3.5 13 3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3.5 8.5H20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 15.5C9 15.5 10.5 16 11 17.5C11 17.5 13.1765 13.5 16 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> Classes Attended: <?php echo $classes_attended; ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="arecord.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-5">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#9e5510" fill="none">
                                    <path d="M5.5 3.5L5.5 14.5C5.5 18.2133 8.18503 21 12 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M18.5 20.5L18.5 9.5C18.5 5.78672 15.815 3 12 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21 18C21 18 19.1588 20.5 18.5 20.5C17.8412 20.5 16 18 16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 5.50022C8 5.50022 6.15878 3.00025 5.49998 3.00024C4.84118 3.00024 3 5.50024 3 5.50024" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> Classes Missed: <?php echo $classes_missed; ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="arecord.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>


<?php require('./templates/footer.php') ?>

