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