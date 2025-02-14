<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Documents</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" style="color:#9e5510;">Documents</li>
                </ol>

                <div class="row">
                    <!-- Example document 1 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Document Title 1</h5>
                                <p class="card-text">Description of the document.</p>
                                <div class="document-actions">
                                    <a href="path/to/document1.pdf" target="_blank" class="btn-icon" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                                        </svg>
                                    </a>
                                    <a href="path/to/document1.pdf" download class="btn-icon" title="Download">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                            <path d="M5 20h14v-2H5v2zm7-18L7.41 6.59 8.83 8l3.17-3.17L15.17 8l1.41-1.41L12 2zm0 6v8h2V8h-2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Example document 2 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <h5 class="card-title">Document Title 2</h5>
                                <p class="card-text">Description of the document.</p>
                                <div class="document-actions">
                                    <a href="path/to/document2.pdf" target="_blank" class="btn-icon" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                                        </svg>
                                    </a>
                                    <a href="path/to/document2.pdf" download class="btn-icon" title="Download">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                            <path d="M5 20h14v-2H5v2zm7-18L7.41 6.59 8.83 8l3.17-3.17L15.17 8l1.41-1.41L12 2zm0 6v8h2V8h-2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add more document cards as needed -->
                </div>
            </div>
        </main>
        <?php require('./templates/footer.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>

<style>
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
    .document-actions {
        display: flex;
        gap: 1rem;
    }
</style>