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
        cursor: not-allowed;
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
                                echo '<button class="btn-icon" disabled>';
                                echo '<i class="fas fa-thumbs-up"></i> <span class="like-count">' . $row['likes'] . '</span>';
                                echo '</button>';
                                echo '<button class="btn-icon" disabled>';
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

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>