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
                                <p class="card-text" style="font-size: 1.25rem; color: #9e5510;">85%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Average Daily Attendance</h5>
                                <p class="card-text" style="font-size: 1.25rem; color: #9e5510;">90%</p>
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
                                    <!-- Placeholder for frequent absentees -->
                                    <p>Frequent absentees content goes here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Top Attendees</h5>
                                <div id="topAttendees">
                                    <!-- Placeholder for top attendees -->
                                    <p>Top attendees content goes here...</p>
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
    // Data for attendance graph
    const attendanceGraphData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Attendance Percentage',
            data: [85, 88, 90, 87, 92, 95],
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
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
        datasets: [{
            label: 'Attendance Trend',
            data: [85, 87, 90, 88, 92, 94],
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