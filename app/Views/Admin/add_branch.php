<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Branch</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('add_branches'); ?>" method="post" novalidate>
                        
                        <!-- Branch Name Field -->
                        <div class="col-md-6">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" name="branch_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid branch name.
                            </div>
                        </div>

                        <!-- Branch Location Field -->
                        <div class="col-md-6">
                            <label for="branchLocation" class="form-label">Branch Location</label>
                            <input type="text" class="form-control" id="branchLocation" name="branch_location" required>
                            <div class="invalid-feedback">
                                Please provide a valid branch location.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Add Branch</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
