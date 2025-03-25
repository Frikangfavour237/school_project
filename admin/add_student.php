<?php
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];
    $username = $_POST['username'];

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, batch, username, role) VALUES (?, ?, ?, ?, 'student')");
    $stmt->bind_param("ssss", $studentName, $email, $batch, $username);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'student' => [
                'fullname' => $studentName,
                'email' => $email,
                'batch' => $batch,
                'username' => $username
            ]
        ];
    } else {
        $response = ['success' => false];
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>