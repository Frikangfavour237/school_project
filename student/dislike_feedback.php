<?php
require('../config/db.php'); // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $feedback_id = $_POST['feedback_id'];
    $student_id = $_SESSION['user_id']; // Assuming student ID is stored in session

    // Check if the student has already liked or disliked the feedback
    $stmt = $conn->prepare("SELECT action FROM feedback_likes WHERE feedback_id = ? AND student_id = ?");
    $stmt->bind_param("ii", $feedback_id, $student_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "already_voted";
    } else {
        // Insert the dislike action into the feedback_likes table
        $stmt = $conn->prepare("INSERT INTO feedback_likes (feedback_id, student_id, action) VALUES (?, ?, 'dislike')");
        $stmt->bind_param("ii", $feedback_id, $student_id);
        $stmt->execute();

        // Update the dislikes count in the feedback table
        $stmt = $conn->prepare("UPDATE feedback SET dislikes = dislikes + 1 WHERE id = ?");
        $stmt->bind_param("i", $feedback_id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
    }

    $stmt->close();
    $conn->close();
}
?>