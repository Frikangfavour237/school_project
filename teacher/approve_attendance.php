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

    // Check if the student has already marked attendance for today
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE student_id = ? AND DATE(date) = CURDATE()");
    if (!$stmt) {
        echo "error: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "error: already marked";
    } else {
        // Insert the approved attendance into the attendance table
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, NOW(), 'present')");
        if (!$stmt) {
            echo "error: " . $conn->error;
            exit;
        }
        $stmt->bind_param("i", $student_id);
        if (!$stmt->execute()) {
            echo "error: " . $stmt->error;
            exit;
        }
        $stmt->close();

        // Update the status of the attendance request
        $stmt = $conn->prepare("UPDATE attendance_requests SET status = 'approved' WHERE student_id = ? AND DATE(date) = CURDATE()");
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
    }

    $conn->close();
}
?>