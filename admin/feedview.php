<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
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
                            <!-- Example feedback 1 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> John Doe is a great teacher who explains concepts clearly.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">10</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">2</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Example feedback 2 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> Sometimes the pace is too fast.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">5</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">3</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Example feedback 3 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> Jane Smith makes the subject very interesting.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">8</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">1</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Example feedback 4 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> Needs to provide more examples.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">4</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">2</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Example feedback 5 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> Mark Johnson is very knowledgeable and helpful.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">12</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">0</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Example feedback 6 -->
                            <div class="feedback">
                                <p><strong>Student Feedback:</strong> Sometimes the lectures are too long.</p>
                                <div class="feedback-actions">
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-up"></i> <span class="like-count">6</span>
                                    </button>
                                    <button class="btn-icon" disabled>
                                        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">1</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Add more feedback as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>

<style>
    .feedback {
        margin-bottom: 1rem;
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

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>