<?php
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['firstname'];
    $username = $_POST['lastname'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isadmin = 1; // 1 for teachers

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Validate password (at least one uppercase letter, one lowercase letter, and one number)
    /*if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
        die("Password must include at least one uppercase letter, one lowercase letter, and one number.");
    }*/

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username or email already exists");
    }

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES ($username, $password, $email, 'teacher')");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        // Insert the teacher into the teachers table
        $stmt = $conn->prepare("INSERT INTO teachers (name, subject) VALUES (?, ?)");
        $stmt->bind_param("ss", $fullname, $subject);
        $stmt->execute();

        echo "Signup successful!";
        header("Location: ../signup&signin/Signin.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>