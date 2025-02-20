<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
    .table-responsive { overflow-x: auto; }
    .btn-yellow { background-color: #9e5510; color: #fff; border: none; }
    .box-shadow { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .btn-icon { background: none; border: none; color: #9e5510;}
         .bg-custom {
        background-color:rgb(235, 239, 245);
    }
    
</style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-custom">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Students</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Student management</li>
                </ol>

                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for a student..." onkeyup="filterTable()">
                </div>

                <div class="table-responsive box-shadow p-3 mb-4 bg-white rounded">
                    <table class="table table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row -->
                            <tr>
                                <td>Jane Doe</td>
                                <td>456 Elm St</td>
                                <td>Biology</td>
                                <td>janedoe</td>
                                <td>
                                    <button class="btn-icon" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                                            <path d="M12 2C10.3431 2 9 3.34315 9 5C9 6.65685 10.3431 8 12 8C13.6569 8 15 6.65685 15 5C15 3.34315 13.6569 2 12 2ZM12 10C9.79086 10 8 11.7909 8 14V16H16V14C16 11.7909 14.2091 10 12 10ZM4 16V14C4 10.6863 6.68629 8 10 8H14C17.3137 8 20 10.6863 20 14V16H22V18H2V16H4Z"/>
                                        </svg>
                                    </button>
                                    <button class="btn-icon" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                                            <path d="M3 6H5H21V8H19L17.5 20.5C17.5 21.3284 16.8284 22 16 22H8C7.17157 22 6.5 21.3284 6.5 20.5L5 8H3V6ZM8 10V20H16V10H8ZM10 2H14V4H10V2Z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <button class="btn btn-yellow mt-3" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
                </div>
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addStudentForm" action="add_student.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="studentName">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="course" name="course" required>
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
        const tableRows = document.querySelectorAll('#studentTable tbody tr');

        tableRows.forEach(row => {
            const studentName = row.cells[0].textContent.toLowerCase();
            const address = row.cells[1].textContent.toLowerCase();
            const course = row.cells[2].textContent.toLowerCase();
            const username = row.cells[3].textContent.toLowerCase();

            const isMatch = studentName.includes(searchTerm) || address.includes(searchTerm) || course.includes(searchTerm) || username.includes(searchTerm);

            row.style.display = isMatch ? '' : 'none';
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>