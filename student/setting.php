<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
    .form-control {
        margin-bottom: 1rem;
    }
    .btn-yellow {
        background-color: #9e5510;
        color: #fff;
        border: none;
    }
    .icon {
        margin-right: 0.5rem;
    }
</style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Settings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Settings</li>
                </ol>

                <div class="card bg-white shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 2C10.3431 2 9 3.34315 9 5C9 6.65685 10.3431 8 12 8C13.6569 8 15 6.65685 15 5C15 3.34315 13.6569 2 12 2ZM12 10C9.79086 10 8 11.7909 8 14V16H16V14C16 11.7909 14.2091 10 12 10ZM4 16V14C4 10.6863 6.68629 8 10 8H14C17.3137 8 20 10.6863 20 14V16H22V18H2V16H4Z"/>
                            </svg>
                            Edit Profile
                        </h5>
                        <form id="editProfileForm" action="update_profile.php" method="POST">
                            <div class="form-group">
                                <label for="adminName">Name</label>
                                <input type="text" class="form-control" id="adminName" name="adminName"  required>
                            </div>
                            <div class="form-group">
                                <label for="adminUsername">Username</label>
                                <input type="text" class="form-control" id="adminUsername" name="adminUsername"  required>
                            </div>
                            <div class="form-group">
                                <label for="adminEmail">Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="adminEmail"  required>
                            </div>
                            <button type="submit" class="btn btn-yellow">Save Changes</button>
                        </form>
                    </div>
                </div>

                <div class="card bg-white shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M10 2C10 0.895431 10.8954 0 12 0C13.1046 0 14 0.895431 14 2H10ZM4 2C4 0.895431 4.89543 0 6 0C7.10457 0 8 0.895431 8 2H4ZM16 2C16 0.895431 16.8954 0 18 0C19.1046 0 20 0.895431 20 2H16ZM2 4H22V22H2V4ZM4 6V20H20V6H4Z"/>
                            </svg>
                            Logout
                        </h5>
                        <a href="logout.php" class="btn btn-yellow">Logout</a>
                    </div>
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>