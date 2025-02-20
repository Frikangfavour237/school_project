<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
    .bg-custom {
        background-color:rgb(235, 239, 245);
    }
    .feedback {
        margin-bottom: 1rem;
        background-color:rgb(225, 216, 216); /* Set the background color */
        padding: 1rem;
        border-radius: 5px;
    }
    .feedback-actions {
        display: flex;
        gap: 1rem;
    }
    .btn-icon {
        background: none;
        border: none;
        color: #9e5510;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-icon i {
        font-size: 1.25rem;
    }
    .feedback-box {
        border-top: 1px solid #ddd;
        padding-top: 1rem;
        margin-top: 1rem;
    }
    .btn-yellow {
        background-color: #9e5510;
        color: #fff;
        border: none;
    }
</style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-custom">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Feedback Analysis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Feedback Analysis</li>
                </ol>

                <!-- Add Feedback Form -->
                <div class="card bg-white shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Add Feedback</h5>
                        <form id="addFeedbackForm" action="add_feedback.php" method="POST">
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-yellow">Submit Feedback</button>
                        </form>
                    </div>
                </div>

                <!-- Feedback Box -->
                <div class="card bg-white shadow mb-4">
                    <div class="card-body">
                        <div class="feedback-box">
                            <?php
                            require('../config/db.php'); // Include your database connection file

                            // Fetch feedback from the database
                            $result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");

                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="feedback" data-feedback-id="' . $row['id'] . '">';
                                echo '<p><strong>Student Feedback:</strong> ' . htmlspecialchars($row['comment']) . '</p>';
                                echo '<div class="feedback-actions">';
                                echo '<button class="btn-icon" onclick="likeFeedback(this)">';
                                echo '<i class="fas fa-thumbs-up"></i> <span class="like-count">' . $row['likes'] . '</span>';
                                echo '</button>';
                                echo '<button class="btn-icon" onclick="dislikeFeedback(this)">';
                                echo '<i class="fas fa-thumbs-down"></i> <span class="dislike-count">' . $row['dislikes'] . '</span>';
                                echo '</button>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function likeFeedback(button) {
        const feedbackElement = button.closest('.feedback');
        const feedbackId = feedbackElement.getAttribute('data-feedback-id');
        const likeCountSpan = button.querySelector('.like-count');

        fetch('like_feedback.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'feedback_id=' + feedbackId,
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                let likeCount = parseInt(likeCountSpan.textContent);
                likeCount++;
                likeCountSpan.textContent = likeCount;
                button.disabled = true;
                button.nextElementSibling.disabled = true;
            } else if (data === 'already_voted') {
                alert('You have already voted on this feedback.');
            } else {
                console.error('Error liking feedback');
            }
        });
    }

    function dislikeFeedback(button) {
        const feedbackElement = button.closest('.feedback');
        const feedbackId = feedbackElement.getAttribute('data-feedback-id');
        const dislikeCountSpan = button.querySelector('.dislike-count');

        fetch('dislike_feedback.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'feedback_id=' + feedbackId,
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                let dislikeCount = parseInt(dislikeCountSpan.textContent);
                dislikeCount++;
                dislikeCountSpan.textContent = dislikeCount;
                button.disabled = true;
                button.previousElementSibling.disabled = true;
            } else if (data === 'already_voted') {
                alert('You have already voted on this feedback.');
            } else {
                console.error('Error disliking feedback');
            }
        });
    }
</script>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>