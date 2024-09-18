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
                                <button class="nav-link" id="balance-stock-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-balance-stock" type="button" role="tab"
                                    aria-controls="balance-stock" aria-selected="false">Balance Stock</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Add Stocks Form -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="home-tab">
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

                            <!-- Transfer Stocks Form -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Transfer Branch Quantity</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation"
                                            action="<?= base_url('transfer_branch_quantity'); ?>" method="post"
                                            novalidate>

                                            <!-- Select Branch Field -->
                                            <div class="col-md-6">
                                                <label for="selectBranch" class="form-label">Select Branch</label>
                                                <select class="form-select" id="selectBranch" name="select_branch"
                                                    required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php foreach ($branch as $item): ?>
                                                    <option value="<?= $item->id; ?>"
                                                        data-stock='<?= json_encode($item->stock_quantity); ?>'>
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
                                                <select class="form-select" id="selectProduct" name="select_product"
                                                    required disabled>
                                                    <option selected disabled value="">Choose a branch first...</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a product.
                                                </div>
                                            </div>

                                            <!-- Quantity Available Field -->
                                            <div class="col-md-6">
                                                <label for="branchQuantity" class="form-label">Quantity
                                                    Available</label>
                                                <input type="text" class="form-control" id="branchQuantity"
                                                    name="branch_quantity" readonly>
                                            </div>

                                            <!-- Transfer Branch Quantity Field -->
                                            <div class="col-md-6">
                                                <label for="transferQuantity" class="form-label">Transfer Branch
                                                    Quantity</label>
                                                <input type="number" class="form-control" id="transferQuantity"
                                                    name="transfer_quantity" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid transfer quantity.
                                                </div>
                                            </div>

                                            <!-- Transfer To Branch Field -->
                                            <div class="col-md-6">
                                                <label for="Transfer_branch" class="form-label">Transfer To
                                                    Branch</label>
                                                <select class="form-select" id="Transfer_branch" name="Transfer_branch"
                                                    required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php foreach ($branch as $item): ?>
                                                    <option value="<?= $item->id; ?>">
                                                        <?= $item->branch_name; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a transfer branch.
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

                            <!-- Balance Stock Tab -->
                            <div class="tab-pane fade" id="pills-balance-stock" role="tabpanel"
                                aria-labelledby="balance-stock-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Stock Balance</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php if (!empty($branch)): ?>
                                        <?php foreach ($branch as $branchItem): ?>
                                        <h5>Branch: <?= esc($branchItem->branch_name); ?>
                                            (<?= esc($branchItem->branch_location); ?>)</h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Unit</th>
                                                    <th scope="col">Stock Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; if (!empty($branchItem->stock_quantity)): ?>
                                                <?php foreach ($branchItem->stock_quantity as $stock): ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= esc($stock->product_name); ?></td>
                                                    <td><?= esc($stock->size); ?></td>
                                                    <td><?= esc($stock->unit); ?></td>
                                                    <td><?= esc($stock->quantity); ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No stocks available</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <hr />
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <p>No branches available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript to handle branch and product selection -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const branchSelect = document.getElementById('selectBranch');
    const productSelect = document.getElementById('selectProduct');
    const branchQuantityInput = document.getElementById('branchQuantity');
    const transferQuantityInput = document.getElementById('transferQuantity');

    branchSelect.addEventListener('change', function() {
        const selectedBranch = this.options[this.selectedIndex];
        const products = selectedBranch.getAttribute('data-stock');

        if (products) {
            const stock = JSON.parse(products);
            productSelect.innerHTML = '<option selected disabled value="">Choose...</option>';
            stock.forEach(item => {
                productSelect.innerHTML +=
                    `<option value="${item.product_id}">${item.product_name}</option>`;
            });
            productSelect.disabled = false;
        } else {
            productSelect.innerHTML =
                '<option selected disabled value="">Choose a branch first...</option>';
            productSelect.disabled = true;
        }
    });

    productSelect.addEventListener('change', function() {
        const selectedBranch = branchSelect.options[branchSelect.selectedIndex];
        const stock = JSON.parse(selectedBranch.getAttribute('data-stock'));
        const selectedProductId = this.value;
        const selectedProduct = stock.find(item => item.product_id === selectedProductId);

        if (selectedProduct) {
            branchQuantityInput.value = selectedProduct.quantity;
        } else {
            branchQuantityInput.value = '';
        }
    });

    transferQuantityInput.addEventListener('input', function() {
        if (parseInt(this.value) > parseInt(branchQuantityInput.value)) {
            this.setCustomValidity('Transfer quantity cannot be more than available stock.');
        } else {
            this.setCustomValidity('');
        }
    });
});
</script>

<?php include __DIR__.'/../Admin/footer.php'; ?>