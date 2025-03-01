<?php
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $batch = $_POST['batch'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'student'; // Default role for students

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
    $stmt = $conn->prepare("SELECT * FROM users WHERE  email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username or email already exists");
    }

    // Insert the new user into the users table
    $stmt = $conn->prepare("INSERT INTO users (fullname, username, batch, gender, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $username, $batch, $gender, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // Insert the new user into the students table
        $stmt = $conn->prepare("INSERT INTO students (fullname, batch, gender, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullname, $batch, $gender, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Signup successful!";
            header("Location: ../signup&signin/Signin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>