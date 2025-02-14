<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Attendance Record</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Record</li>
                </ol>
             
                <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Date and time</th>
                                    <th>Status</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                    <th>Number</th>
                                    <th>Username</th>
                                    <th>Order date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Customers</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Frikang</td>
                                    <td>swe</td>
                                    <td>10-08-2024</td>
                                    <td>Pending</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>