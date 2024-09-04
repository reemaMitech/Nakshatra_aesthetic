<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Stocks</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('add_stocksin'); ?>" method="post" novalidate>

                        <!-- Product Name Field -->
                        <div class="col-md-4">
                            <label for="productName" class="form-label">Product Name</label>
                            <select class="form-select" id="productName" name="product_name" required>
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($product as $item): ?>
                                <option value="<?= $item->id; ?>">
                                    <?= $item->product_name; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid product name.
                            </div>
                        </div>

                        <!-- Quantity Field -->
                        <div class="col-md-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                            <div class="invalid-feedback">
                                Please provide a valid quantity.
                            </div>
                        </div>

                        <!-- Size of Product Field -->
                        <div class="col-md-3">
                            <label for="size" class="form-label">Size of Product</label>
                            <input type="text" class="form-control" id="size" name="size" required>
                            <div class="invalid-feedback">
                                Please provide a valid size.
                            </div>
                        </div>

                        <!-- Unit of Measurement Dropdown -->
                        <div class="col-md-2">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-select" id="unit" name="unit" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="ml">ml</option>
                                <option value="kg">kg</option>
                                <option value="gm">gm</option>
                                <option value="litre">litre</option>
                                <option value="pcs">pcs</option>
                                <!-- Add more options as needed -->
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid unit.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
