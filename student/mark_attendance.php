<?php
require('../config/db.php'); // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    // Debugging: Check if student_id is set
    if (empty($student_id)) {
        echo "error: student_id is missing";
        exit;
    }

    // Debugging: Check if student_id is received correctly
    echo "Debug: student_id received: " . $student_id . "\n";

    // Check if the student has already marked attendance for today
   $stmt = $conn->prepare("SELECT * FROM attendance_requests WHERE student_id = ? AND DATE(created_at) = CURDATE()");
    if (!$stmt) {
        echo "error: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "already_marked";
    } else {
        // Insert the attendance request into the attendance_requests table
        $stmt = $conn->prepare("INSERT INTO attendance_requests (student_id, status) VALUES (?, 'pending')");
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
    }

    $stmt->close();
    $conn->close();
}
?>