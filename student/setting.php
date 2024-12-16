<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
        
        .btn-yellow { background-color: #ffc107; color: #fff; border: none; }
        .section-title { margin-bottom: 15px; }

    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Inventory</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Inventory</li>
                </ol>
            </div>

            <div class="container-fluid">
        <div class="row">
            <div class="card m-5">
            <div class="card-body bg-white ">
                    <div class="col-md-6">
                        <h4 class="section-title">Diagnos</h4>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-view-details-tab" data-toggle="pill" href="#pills-view-details" role="tab" aria-controls="pills-view-details" aria-selected="true">View details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-pricing-tab" data-toggle="pill" href="#pills-pricing" role="tab" aria-controls="pills-pricing" aria-selected="false">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-billing-tab" data-toggle="pill" href="#pills-billing" role="tab" aria-controls="pills-billing" aria-selected="false">Billing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-transactions-tab" data-toggle="pill" href="#pills-transactions" role="tab" aria-controls="pills-transactions" aria-selected="false">Transactions</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-view-details" role="tabpanel" aria-labelledby="pills-view-details-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Vehicle types</td>
                                        <td>Online tools</td>
                                    </tr>
                                    <tr>
                                        <td>Product</td>
                                        <td>Code: 2948108</td>
                                    </tr>
                                    <tr>
                                        <td>Origin</td>
                                        <td>Customer</td>
                                    </tr>
                                    <tr>
                                        <td>Tax rate:</td>
                                        <td>12%</td>
                                    </tr>
                                    <tr>
                                        <td>Inventory level:</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Service</td>
                                        <td>AI diagnostics and inventory tracking</td>
                                    </tr>
                                    <tr>
                                        <td>Total cost</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>Available</td>
                                        <td>Percentage in stock: 80%</td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                    <label for="price-details">Price details</label>
                                    <input type="text" class="form-control" id="price-details" value="Standard cost">
                                </div>
                                <div class="form-group">
                                    <label for="inventory">Inventory</label>
                                    <input type="text" class="form-control" id="inventory" value="Not applicable">
                                </div>
                                <div class="form-group">
                                    <label for="billing-details">Billing details</label>
                                    <input type="text" class="form-control" id="billing-details" value="Not available">
                                </div>
                                <div class="form-group">
                                    <label for="product-code">Product code</label>
                                    <input type="text" class="form-control" id="product-code" value="Reference number: 8-">
                                </div>
                                <button class="btn btn-yellow mr-2">Edit Item</button>
                                <button class="btn btn-danger">Remove Item</button>
                            </div>
                            <div class="tab-pane fade" id="pills-pricing" role="tabpanel" aria-labelledby="pills-pricing-tab">Pricing Content</div>
                            <div class="tab-pane fade" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab">Billing Content</div>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>