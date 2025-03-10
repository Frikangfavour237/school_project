<?php
session_start();
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start the session and store user information
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // If the user is a student, add an attendance request
            if ($user['role'] == 'student') {
                // Check if the student has already marked attendance for today
                $stmt = $conn->prepare("SELECT * FROM attendance_requests WHERE student_id = ? AND DATE(created_at) = CURDATE()");
                if (!$stmt) {
                    echo "error: " . $conn->error;
                    exit;
                }
                $stmt->bind_param("i", $user['id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    // Insert the attendance request into the attendance_requests table
                    $stmt = $conn->prepare("INSERT INTO attendance_requests (student_id, status) VALUES (?, 'pending')");
                    if (!$stmt) {
                        echo "error: " . $conn->error;
                        exit;
                    }
                    $stmt->bind_param("i", $user['id']);

                    if (!$stmt->execute()) {
                        echo "error: " . $stmt->error;
                        exit;
                    }
                    $stmt->close();
                }
            }

            // Redirect to the appropriate dashboard based on the role
            if ($user['role'] == 'student') {
                header("Location: ../student/index.php");
            } elseif ($user['role'] == 'teacher') {
                header("Location: ../teacher/index.php");
            } elseif ($user['role'] == 'admin') {
                header("Location: ../admin/index.php");
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $stmt->close();
    $conn->close();
}
?>