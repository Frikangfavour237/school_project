<?php
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacherName = $_POST['teacherName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $username = $_POST['username'];

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, role) VALUES (?, ?, ?, 'teacher')");
    $stmt->bind_param("sss", $teacherName, $email, $username);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;

        // Insert into teachers table
        $stmt = $conn->prepare("INSERT INTO teachers (user_id, subject) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $subject);

        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'teacher' => [
                    'fullname' => $teacherName,
                    'email' => $email,
                    'subject' => $subject,
                    'username' => $username
                ]
            ];
        } else {
            $response = ['success' => false];
        }
    } else {
        $response = ['success' => false];
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>