<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Manage Stocks</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Stocks</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Transfer Stocks</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Contact</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Add Stocks Form -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <form class="row g-3 needs-validation mt-3" action="<?= base_url('add_stocksin'); ?>"
                                    method="post" novalidate>
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
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            required>
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

                                    <!-- Branch Name Field -->
                                    <div class="col-md-4">
                                        <label for="branchName" class="form-label">Branch Name</label>
                                        <select class="form-select" id="branchName" name="branch_name" required>
                                            <option selected disabled value="">Choose...</option>
                                            <?php foreach ($branch as $item): ?>
                                            <option value="<?= $item->id; ?>">
                                                <?= $item->branch_name; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a branch name.
                                        </div>
                                    </div>

                                    <!-- Use By Date Field -->
                                    <div class="col-md-4">
                                        <label for="useByDate" class="form-label">Use By Date</label>
                                        <input type="date" class="form-control" id="useByDate" name="use_by_date"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid use by date.
                                        </div>
                                    </div>

                                    <!-- Expiry Date Field -->
                                    <div class="col-md-4">
                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiryDate" name="Expiry_date"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid expiry date.
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Transfer Branch Quantity</h4>
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" action="<?= base_url('transfer_branch_quantity'); ?>" method="post" novalidate>
                
                <!-- Select Branch Field -->
                <div class="col-md-6">
                    <label for="selectBranch" class="form-label">Select Branch</label>
                    <select class="form-select" id="selectBranch" name="select_branch" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($branch as $item): ?>
                            <option value="<?= $item->id; ?>" data-stock='<?= json_encode($item->stock_quantity); ?>'>
                                <?= $item->branch_name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a branch.
                    </div>
                </div>

                <!-- Select Product Field -->
                <div class="col-md-6">
                    <label for="selectProduct" class="form-label">Select Product</label>
                    <select class="form-select" id="selectProduct" name="select_product" required disabled>
                        <option selected disabled value="">Choose a branch first...</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a product.
                    </div>
                </div>

                <!-- Quantity Available Field -->
                <div class="col-md-6">
                    <label for="branchQuantity" class="form-label">Quantity Available</label>
                    <input type="text" class="form-control" id="branchQuantity" name="branch_quantity" readonly>
                </div>

                <!-- Transfer Branch Quantity Field -->
                <div class="col-md-6">
                    <label for="transferQuantity" class="form-label">Transfer Branch Quantity</label>
                    <input type="number" class="form-control" id="transferQuantity" name="transfer_quantity" required>
                    <div class="invalid-feedback">
                        Please provide a valid transfer quantity.
                    </div>
                </div>

                <!-- Transfer To Branch Field -->
                <div class="col-md-6">
                    <label for="Transfer_branch" class="form-label">Transfer To Branch</label>
                    <select class="form-select" id="Transfer_branch" name="Transfer_branch" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($branch as $item): ?>
                            <option value="<?= $item->id; ?>"><?= $item->branch_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a branch.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Transfer</button>
                </div>

            </form>
        </div>
    </div>
</div>



                            <!-- Contact Tab Content -->
                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                                aria-labelledby="pills-contact-tab1">
                                <!-- Contact content can be added here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
<script>
document.getElementById('selectBranch').addEventListener('change', function () {
    var selectedOption = this.options[this.selectedIndex];
    var stockData = JSON.parse(selectedOption.getAttribute('data-stock'));
    var productDropdown = document.getElementById('selectProduct');
    
    // Clear previous options
    productDropdown.innerHTML = '<option selected disabled value="">Choose a product...</option>';

    if (stockData && stockData.length > 0) {
        productDropdown.disabled = false;
        
        // Populate product dropdown
        stockData.forEach(function (stock) {
            var option = document.createElement('option');
            option.value = stock.id;
            option.text = stock.product_name + ' (' + stock.size + stock.unit + ')';
            option.setAttribute('data-quantity', stock.quantity);
            productDropdown.appendChild(option);
        });
    } else {
        productDropdown.disabled = true;
        productDropdown.innerHTML = '<option selected disabled value="">No products available</option>';
    }

    // Clear the quantity field
    document.getElementById('branchQuantity').value = '';
});

// Update quantity when a product is selected
document.getElementById('selectProduct').addEventListener('change', function () {
    var selectedOption = this.options[this.selectedIndex];
    var quantity = selectedOption.getAttribute('data-quantity');
    
    // Display the quantity in the read-only input field
    document.getElementById('branchQuantity').value = quantity + ' units';
});

</script>