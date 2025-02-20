<?php
require('../config/db.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];

    // Insert the feedback into the database
    $stmt = $conn->prepare("INSERT INTO feedback (comment) VALUES (?)");
    $stmt->bind_param("s", $comment);

    if ($stmt->execute()) {
        header("Location: feedview.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>