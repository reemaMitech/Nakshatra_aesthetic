<?php include __DIR__.'/../Admin/header.php'; ?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Access Level</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('access_level'); ?>" method="post" enctype="multipart/form-data" novalidate>
                        
                        <!-- New Field for URL Name -->
                        <div class="col-md-6">
                            <label for="menu_name" class="form-label">URL Name</label>
                            <input type="text" class="form-control" id="menu_name" name="menu_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid URL name.
                            </div>
                        </div>

                        <!-- New Field for URL -->
                        <div class="col-md-6">
                            <label for="url_location" class="form-label">URL</label>
                            <input type="url_location" class="form-control" id="url_location" name="url_location" required>
                            <div class="invalid-feedback">
                                Please provide a valid URL.
                            </div>
                        </div>
                        <!-- End of New Fields -->

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>
