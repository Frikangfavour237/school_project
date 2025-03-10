<?php
require('../config/db.php'); // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    // Debugging: Check if student_id is received correctly
    if (empty($student_id)) {
        echo "error: student_id is missing";
        exit;
    }

    // Debugging: Output the received student_id
    echo "Debug: student_id received: " . $student_id . "\n";

    // Update the status of the attendance request to 'rejected'
    $stmt = $conn->prepare("UPDATE attendance_requests SET status = 'rejected' WHERE student_id = ? AND DATE(date) = CURDATE()");
    if (!$stmt) {
        echo "error: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>