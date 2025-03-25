<?php require('./templates/header.php') ?>
<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">
    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Attendance Analysis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Attendance Analysis</li>
                </ol>

                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Overall Attendance for Semester</h5>
                                <p class="card-text" style="font-size: 1.25rem; color: #9e5510;">
                                    <?php
                                    require('../config/db.php'); // Include your database connection file

                                    // Fetch overall attendance percentage
                                    $stmt = $conn->prepare("
                                        SELECT (SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) / COUNT(*)) * 100 AS overall_attendance
                                        FROM attendance
                                    ");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $row = $result->fetch_assoc();
                                    echo round($row['overall_attendance'], 2) . '%';

                                    $stmt->close();
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Average Daily Attendance</h5>
                                <p class="card-text" style="font-size: 1.25rem; color: #9e5510;">
                                    <?php
                                    // Fetch average daily attendance percentage
                                    $stmt = $conn->prepare("
                                        SELECT (SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) / COUNT(*)) * 100 AS daily_attendance
                                        FROM attendance
                                        GROUP BY date
                                    ");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $total_attendance = 0;
                                    $days = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $total_attendance += $row['daily_attendance'];
                                        $days++;
                                    }
                                    echo round($total_attendance / $days, 2) . '%';

                                    $stmt->close();
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Attendance Graphs</h5>
                                <div id="attendanceGraphs">
                                    <canvas id="attendanceGraphCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Attendance Trends</h5>
                                <div id="attendanceTrends">
                                    <canvas id="attendanceTrendCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Frequent Absentees</h5>
                                <div id="frequentAbsentees">
                                    <?php
                                    // Fetch students with the smallest number of presents
                                    $stmt = $conn->prepare("
                                        SELECT u.fullname, COUNT(a.status) AS presents
                                        FROM users u
                                        LEFT JOIN attendance a ON u.id = a.student_id AND a.status = 'present'
                                        GROUP BY u.id
                                        ORDER BY presents ASC
                                        LIMIT 5
                                    ");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    echo '<table class="table table-striped">';
                                    echo '<thead><tr><th>Full Name</th><th>Presents</th></tr></thead>';
                                    echo '<tbody>';
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['presents']) . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';

                                    $stmt->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Top Attendees</h5>
                                <div id="topAttendees">
                                    <?php
                                    // Fetch students with the highest number of presents
                                    $stmt = $conn->prepare("
                                        SELECT u.fullname, COUNT(a.status) AS presents
                                        FROM users u
                                        LEFT JOIN attendance a ON u.id = a.student_id AND a.status = 'present'
                                        GROUP BY u.id
                                        ORDER BY presents DESC
                                        LIMIT 5
                                    ");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    echo '<table class="table table-striped">';
                                    echo '<thead><tr><th>Full Name</th><th>Presents</th></tr></thead>';
                                    echo '<tbody>';
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['presents']) . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';

                                    $stmt->close();
                                    $conn->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php
    // Fetch data for attendance graph
    require('../config/db.php'); // Include your database connection file
    $stmt = $conn->prepare("
        SELECT date, (SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) / COUNT(*)) * 100 AS daily_attendance
        FROM attendance
        GROUP BY date
        ORDER BY date
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $dates = [];
    $attendancePercentages = [];
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['date'];
        $attendancePercentages[] = round($row['daily_attendance'], 2);
    }
    $stmt->close();
    $conn->close();
    ?>

    // Data for attendance graph
    const attendanceGraphData = {
        labels: <?php echo json_encode($dates); ?>,
        datasets: [{
            label: 'Daily Attendance Percentage',
            data: <?php echo json_encode($attendancePercentages); ?>,
            backgroundColor: 'rgba(158, 85, 16, 0.2)',
            borderColor: '#9e5510',
            borderWidth: 1
        }]
    };

    // Config for attendance graph
    const attendanceGraphConfig = {
        type: 'bar',
        data: attendanceGraphData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Render attendance graph
    const attendanceGraphCanvas = document.getElementById('attendanceGraphCanvas');
    new Chart(attendanceGraphCanvas, attendanceGraphConfig);

    // Data for attendance trend
    const attendanceTrendData = {
        labels: <?php echo json_encode($dates); ?>,
        datasets: [{
            label: 'Attendance Trend',
            data: <?php echo json_encode($attendancePercentages); ?>,
            backgroundColor: 'rgba(158, 85, 16, 0.2)',
            borderColor: '#9e5510',
            borderWidth: 1,
            fill: false,
            tension: 0.1
        }]
    };

    // Config for attendance trend
    const attendanceTrendConfig = {
        type: 'line',
        data: attendanceTrendData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Render attendance trend
    const attendanceTrendCanvas = document.getElementById('attendanceTrendCanvas');
    new Chart(attendanceTrendCanvas, attendanceTrendConfig);
</script>

<?php require('./templates/footer.php') ?>