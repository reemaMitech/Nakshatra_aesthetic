<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Row Materials</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Row Materials</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Row Materials Stock</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="balance-stock-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-balance-stock" type="button" role="tab"
                                    aria-controls="balance-stock" aria-selected="false">Closing stock</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Add Stocks Form -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="card-header">
                                    <h4 class="card-title">Add Row Materials</h4>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3 needs-validation"
                                        action="<?= base_url('save_row_Materials'); ?>" method="post" novalidate>
                                        <div class="col-md-4">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="productName" name="product_name"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide a valid product name.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unit" class="form-label">Unit</label>
                                            <input type="text" class="form-control" id="unit" name="unit" required>
                                            <div class="invalid-feedback">
                                                Please provide the unit.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="unitType" class="form-label">Unit Type</label>
                                            <select class="form-select" id="unitType" name="unit_type" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="gm">Grams (gm)</option>
                                                <option value="kg">Kilograms (kg)</option>
                                                <option value="ml">Milliliters (ml)</option>
                                                <option value="ltr">Liters (ltr)</option>
                                                <option value="NOS">NOS</option>
                                                <!-- Add more unit types as needed -->
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select the unit type.
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-3">
                                            <label for="containerType" class="form-label">Type of Container</label>
                                            <select class="form-select" id="containerType" name="container_type"
                                                required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="Bottle">Bottle</option>
                                                <option value="Can">Can</option>
                                                <option value="Box">Box</option>
                                                <option value="Pouch">Pouch</option>
                                                <option value="Jar">Jar</option> -->
                                        <!-- Add more container types as needed -->
                                        <!-- </select>
                                            <div class="invalid-feedback">
                                                Please select the type of container.
                                            </div> -->
                                        <!-- </div> -->

                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel"
                                aria-labelledby="pills-profile-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Row Materials Stock</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product Name</th>
                                                    <th>Unit</th>

                                                    <th>Container Type</th>
                                                    <!-- <th>Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($row_materials)): ?>
                                                <?php foreach($row_materials as $material): ?>
                                                <tr>
                                                    <td><?= $material->id; ?></td>
                                                    <td><?= $material->product_name; ?></td>
                                                    <td><?= $material->unit; ?> <?= $material->unit_type; ?></td>

                                                    <td><?= $material->container_type; ?></td>

                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td colspan="6">No row materials found.</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-balance-stock" role="tabpanel"
                                aria-labelledby="balance-stock-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Closing Stock</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?= base_url('edit_row_Materials'); ?>">
                                            <!-- Adjust action URL as needed -->
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Product Name</th>
                                                        <th>Remaining Units</th>
                                                        <th>Used Materials</th> <!-- New Column Header -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($row_materials)): ?>
                                                    <?php foreach ($row_materials as $material): ?>
                                                    <tr>
                                                        <td><?= $material->id; ?></td>
                                                        <td><?= $material->product_name; ?></td>
                                                        <td><?= $material->unit; ?> <?= $material->unit_type; ?></td>
                                                        <td>
                                                            <input type="text"
                                                                name="used_materials"
                                                                placeholder="Enter used materials"
                                                                class="form-control" />
                                                        </td>
                                                        <input type="hidden"
                                                                name="materialunits" value="<?= $material->unit; ?>"
                                                                />
                                                                <input type="hidden"
                                                                name="materialid" value="<?= $material->id; ?>"
                                                                />
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="4">No row materials found.</td>
                                                        <!-- Adjust colspan to match number of columns -->
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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

<?php include __DIR__.'/../Admin/footer.php'; ?>