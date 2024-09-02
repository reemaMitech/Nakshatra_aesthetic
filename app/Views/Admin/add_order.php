<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Order</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="productName" class="form-label">Product Name</label>
                            <select class="form-select" id="productName" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Product1">Product 1</option>
                                <option value="Product2">Product 2</option>
                                <option value="Product3">Product 3</option>
                                <!-- Add more product options as needed -->
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid product name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" required>
                            <div class="invalid-feedback">
                                Please provide a valid quantity.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="transactionId" class="form-label">Transaction ID</label>
                            <input type="text" class="form-control" id="transactionId" required>
                            <div class="invalid-feedback">
                                Please provide a valid transaction ID.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="transactionScreenshot" class="form-label">Transaction Screenshot</label>
                            <input type="file" class="form-control" id="transactionScreenshot" required>
                            <div class="invalid-feedback">
                                Please upload a screenshot of the payment.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="mrp" class="form-label">MRP</label>
                            <input type="text" class="form-control" id="mrp" required>
                            <div class="invalid-feedback">
                                Please provide the MRP.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="deliveryCharges" class="form-label">Delivery Charges</label>
                            <input type="text" class="form-control" id="deliveryCharges" required>
                            <div class="invalid-feedback">
                                Please provide the delivery charges.
                            </div>
                        </div>
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
