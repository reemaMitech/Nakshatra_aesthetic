<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Packaging Material </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('add_packaging_material'); ?>" method="post" novalidate>
                        
                        <!-- Branch Name Field -->
                        <div class="col-md-6">
                            <label for="MaterialName" class="form-label">Material Name</label>
                            <input type="text" class="form-control" id="MaterialName" name="Material_Name" required>
                            <div class="invalid-feedback">
                                Please provide a valid Material name.
                            </div>
                        </div>

                        <!-- Branch Location Field -->
                        <div class="col-md-6">
                            <label for="Material_Quantity" class="form-label">Material Quantity</label>
                            <input type="text" class="form-control" id="Material_Quantity" name="Material_Quantity" required>
                            <div class="invalid-feedback">
                                Please provide a valid Quantity.
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
