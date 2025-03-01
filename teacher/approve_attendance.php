<?php
require('../config/db.php'); // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];

    // Fetch the student_id from the attendance_requests table
    $stmt = $conn->prepare("SELECT student_id FROM attendance_requests WHERE id = ?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $stmt->bind_result($student_id);
    $stmt->fetch();
    $stmt->close();

    // Insert the approved attendance into the final attendance table
    $stmt = $conn->prepare("INSERT INTO attendance (student_id, date) VALUES (?, NOW())");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $stmt->close();

    // Update the status of the attendance request
    $stmt = $conn->prepare("UPDATE attendance_requests SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $request_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>