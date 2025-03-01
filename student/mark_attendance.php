<?php
require('../config/db.php'); // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    // Insert the attendance request into the temporary table
    $stmt = $conn->prepare("INSERT INTO attendance_requests (student_id, status) VALUES (?, 'pending')");
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>