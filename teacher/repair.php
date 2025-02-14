<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
        .table-responsive { overflow-x: auto; }
        .btn-yellow { background-color: #ffc107; color: #fff; border: none; }
    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Repair Tracker</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Repair Tracker</li>
                </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="card mx-5 my-2">
                <div class="card-body bg-white">
            <div class="col-md-3 sidebar">
                </div> <div class="col-md-9 main-content">
                <div class="form-inline mb-3">
                    <input type="text" class="form-control mr-2" id="searchInput" placeholder="Search by Vehicle ID, Customer, or Issue">
                    <select class="form-control mr-2" id="statusFilter">
                        <option value="">All Statuses</option>
                        <option value="In progress">In progress</option>
                        <option value="Completed">Completed</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <button class="btn btn-primary" onclick="filterTable()">Filter</button>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="repairTable">
                        <thead>
                            <tr>
                                <th>Vehicle ID</th>
                                <th>Customer Name</th>
                                <th>Issue Description</th>
                                <th>Date Received</th>
                                <th>Status</th>
                                <th>Technician</th>
                                <th>Estimated Completion</th>
                                <th>Actual Completion</th>
                                <th>Parts Required</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12345</td>
                                <td>John Doe</td>
                                <td>Engine trouble</td>
                                <td>2024-03-08</td>
                                <td>In progress</td>
                                <td>Technician A</td>
                                <td>2024-03-15</td>
                                <td></td>
                                <td>Spark plugs, oil filter</td>
                                <td>$500</td>
                            </tr>
                            <tr>
                                <td>67890</td>
                                <td>Jane Smith</td>
                                <td>Brake issue</td>
                                <td>2024-03-10</td>
                                <td>Completed</td>
                                <td>Technician B</td>
                                <td>2024-03-12</td>
                                <td>2024-03-12</td>
                                <td>Brake pads, rotors</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <td>13579</td>
                                <td>Peter Jones</td>
                                <td>Tire change</td>
                                <td>2024-03-11</td>
                                <td>Pending</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>New tires</td>
                                <td>$200</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-yellow mt-3">Add New Repair</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const tableRows = document.querySelectorAll('#repairTable tbody tr');

            tableRows.forEach(row => {
                const vehicleId = row.cells[0].textContent.toLowerCase();
                const customerName = row.cells[1].textContent.toLowerCase();
                const issueDesc = row.cells[2].textContent.toLowerCase();
                const status = row.cells[4].textContent.toLowerCase();

                const isMatchSearch = searchTerm === '' || vehicleId.includes(searchTerm) || customerName.includes(searchTerm) || issueDesc.includes(searchTerm);
                const isMatchStatus = statusFilter === '' || status === statusFilter;

                row.style.display = isMatchSearch && isMatchStatus ? '' : 'none';
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>