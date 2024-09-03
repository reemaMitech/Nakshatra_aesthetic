<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product Master</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('save_product'); ?>" method="post" novalidate>
                        <div class="col-md-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid product name.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" required>
                            <div class="invalid-feedback">
                                Please provide the unit.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="unitType" class="form-label">Unit Type</label>
                            <select class="form-select" id="unitType" name="unit_type" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="gm">Grams (gm)</option>
                                <option value="kg">Kilograms (kg)</option>
                                <option value="ml">Milliliters (ml)</option>
                                <option value="ltr">Liters (ltr)</option>
                                <!-- Add more unit types as needed -->
                            </select>
                            <div class="invalid-feedback">
                                Please select the unit type.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="containerType" class="form-label">Type of Container</label>
                            <select class="form-select" id="containerType" name="container_type" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Bottle">Bottle</option>
                                <option value="Can">Can</option>
                                <option value="Box">Box</option>
                                <option value="Pouch">Pouch</option>
                                <option value="Jar">Jar</option>
                                <!-- Add more container types as needed -->
                            </select>
                            <div class="invalid-feedback">
                                Please select the type of container.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="ingredients" class="form-label">Ingredients</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Please provide the ingredients.
                            </div>
                        </div>

                        <!-- New Fields for Unit and Unit Type -->
                       
                        <div class="col-md-6">
                            <label for="mrpWithTax" class="form-label">MRP (With Tax)</label>
                            <input type="text" class="form-control" id="mrpWithTax" name="mrp_with_tax" required>
                            <div class="invalid-feedback">
                                Please provide the MRP including tax.
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
