<?php
session_start();
require('../config/db.php'); // Include your database connection file

// Fetch teachers from the database
$query = "
    SELECT users.fullname, users.email, users.username, teachers.subject 
    FROM users 
    JOIN teachers ON users.id = teachers.id 
    WHERE users.role = 'teacher'
";
$result = $conn->query($query);
?>

<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
    .table-responsive { overflow-x: auto; }
    .btn-yellow { background-color: #9e5510; color: #fff; border: none; }
    .box-shadow { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .btn-icon { background: none; border: none; color: #9e5510; }
</style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Teacher management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Teachers</li>
                </ol>

                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for a teacher..." onkeyup="filterTable()">
                </div>

                <div class="table-responsive box-shadow p-3 mb-4 bg-white rounded">
                    <table class="table table-striped" id="teacherTable">
                        <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['subject']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                                echo '<td>';
                                echo '<button class="btn-icon" title="Edit" onclick="editTeacher(this)">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">';
                                echo '<path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zm2.92-2.92L14.06 6.19l1.41 1.41L7.33 15.75H5.92v-1.42zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>';
                                echo '</svg>';
                                echo '</button>';
                                echo '<button class="btn-icon" title="Delete" onclick="deleteTeacher(this)">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">';
                                echo '<path d="M3 6H5H21V8H19L17.5 20.5C17.5 21.3284 16.8284 22 16 22H8C7.17157 22 6.5 21.3284 6.5 20.5L5 8H3V6ZM8 10V20H16V10H8ZM10 2H14V4H10V2Z"/>';
                                echo '</svg>';
                                echo '</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <button class="btn btn-yellow mt-3" data-toggle="modal" data-target="#addTeacherModal">Add Teacher</button>
                </div>
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<!-- Add Teacher Modal -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeacherModalLabel">Add Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addTeacherForm" action="add_teacher.php" method="POST" onsubmit="return addTeacher(event)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="teacherName">Teacher Name</label>
                        <input type="text" class="form-control" id="teacherName" name="teacherName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-yellow" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-yellow">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const tableRows = document.querySelectorAll('#teacherTable tbody tr');

        tableRows.forEach(row => {
            const teacherName = row.cells[0].textContent.toLowerCase();
            const email = row.cells[1].textContent.toLowerCase();
            const course = row.cells[2].textContent.toLowerCase();
            const username = row.cells[3].textContent.toLowerCase();

            const isMatch = teacherName.includes(searchTerm) || email.includes(searchTerm) || course.includes(searchTerm) || username.includes(searchTerm);

            row.style.display = isMatch ? '' : 'none';
        });
    }

    function deleteTeacher(button) {
        const row = button.closest('tr');
        row.remove();
    }

    function editTeacher(button) {
        const row = button.closest('tr');
        const cells = row.querySelectorAll('td');
        const teacherName = cells[0].textContent;
        const email = cells[1].textContent;
        const course = cells[2].textContent;
        const username = cells[3].textContent;

        // Populate the form with the current values
        document.getElementById('teacherName').value = teacherName;
        document.getElementById('email').value = email;
        document.getElementById('subject').value = subject;
        document.getElementById('username').value = username;

        // Show the modal
        $('#addTeacherModal').modal('show');

        // Update the form action to handle the edit
        document.getElementById('addTeacherForm').action = 'edit_teacher.php';
    }

    function addTeacher(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch('add_teacher.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const table = document.getElementById('teacherTable').getElementsByTagName('tbody')[0];
                const newRow = table.insertRow();
                newRow.innerHTML = `
                    <td>${data.teacher.fullname}</td>
                    <td>${data.teacher.email}</td>
                    <td>${data.teacher.subject}</td>
                    <td>${data.teacher.username}</td>
                    <td>
                        <button class="btn-icon" title="Edit" onclick="editTeacher(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zm2.92-2.92L14.06 6.19l1.41 1.41L7.33 15.75H5.92v-1.42zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
                            </svg>
                        </button>
                        <button class="btn-icon" title="Delete" onclick="deleteTeacher(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                                <path d="M3 6H5H21V8H19L17.5 20.5C17.5 21.3284 16.8284 22 16 22H8C7.17157 22 6.5 21.3284 6.5 20.5L5 8H3V6ZM8 10V20H16V10H8ZM10 2H14V4H10V2Z"/>
                            </svg>
                        </button>
                    </td>
                `;
                $('#addTeacherModal').modal('hide');
                form.reset();
            } else {
                alert('Failed to add teacher');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
