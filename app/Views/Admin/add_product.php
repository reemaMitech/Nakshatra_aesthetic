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
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Product</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Product List</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Add Stocks Form -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="card-header">
                                    <h4 class="card-title">Add Product</h4>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3 needs-validation" action="<?= base_url('save_product'); ?>"
                                        method="post" novalidate>
                                        <input type="hidden" name="id" class="form-control" id="id"
                                  value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                        <div class="col-md-3">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="productName"
                                                value="<?php if(!empty($single_data)){ echo $single_data->product_name; }?>"
                                                name="product_name" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid product name.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="unit" class="form-label">Size(weight)</label>
                                            <input type="text" class="form-control" id="unit" name="unit"
                                                value="<?php if(!empty($single_data)){ echo $single_data->unit; }?>"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide the unit.
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="unitType" class="form-label">Unit Type</label>
                                            <select class="form-select" id="unitType" name="unit_type" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="gm"
                                                    <?php if (!empty($single_data) && $single_data->unit_type == 'gm') echo 'selected'; ?>>
                                                    Grams (gm)</option>
                                                <option value="kg"
                                                    <?php if (!empty($single_data) && $single_data->unit_type == 'kg') echo 'selected'; ?>>
                                                    Kilograms (kg)</option>
                                                <option value="ml"
                                                    <?php if (!empty($single_data) && $single_data->unit_type == 'ml') echo 'selected'; ?>>
                                                    Milliliters (ml)</option>
                                                <option value="ltr"
                                                    <?php if (!empty($single_data) && $single_data->unit_type == 'ltr') echo 'selected'; ?>>
                                                    Liters (ltr)</option>
                                                <!-- Add more unit types as needed -->
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select the unit type.
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="containerType" class="form-label">Type of Container</label>
                                            <select class="form-select" id="containerType" name="container_type"
                                                required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="Bottle"
                                                    <?php if (!empty($single_data) && $single_data->container_type == 'Bottle') echo 'selected'; ?>>
                                                    Bottle</option>
                                                <option value="Can"
                                                    <?php if (!empty($single_data) && $single_data->container_type == 'Can') echo 'selected'; ?>>
                                                    Can</option>
                                                <option value="Box"
                                                    <?php if (!empty($single_data) && $single_data->container_type == 'Box') echo 'selected'; ?>>
                                                    Box</option>
                                                <option value="Pouch"
                                                    <?php if (!empty($single_data) && $single_data->container_type == 'Pouch') echo 'selected'; ?>>
                                                    Pouch</option>
                                                <option value="Jar"
                                                    <?php if (!empty($single_data) && $single_data->container_type == 'Jar') echo 'selected'; ?>>
                                                    Jar</option>
                                                <!-- Add more container types as needed -->
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select the type of container.
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="ingredients" class="form-label">Ingredients</label>
                                            <textarea class="form-control" id="ingredients" name="ingredients"
                                                rows="3"><?php if(!empty($single_data)){ echo $single_data->ingredients; }?></textarea>
                                            <div class="invalid-feedback">
                                                Please provide the ingredients.
                                            </div>
                                        </div>

                                        <!-- New Fields for Unit and Unit Type -->

                                        <div class="col-md-4">
                                            <label for="mrpWithTax" class="form-label">MRP</label>
                                            <input type="text" class="form-control" id="mrpWithTax"
                                                value="<?php if(!empty($single_data)){ echo $single_data->mrp; }?>"
                                                name="mrp" required>
                                            <div class="invalid-feedback">
                                                Please provide the MRP including tax.
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="containerType" class="form-label">Tax</label>
                                            <select class="form-select" name="tax_id" id="tax_id" required>
                                                <option selected disabled value=""> Select Tax</option>
                                                <?php foreach ($tax_data as $data): ?>
                                                <option value="<?= $data->id; ?>"
                                                    <?php if (!empty($single_data)) { echo ($single_data->tax_id == $data->id) ? 'selected="selected"' : ''; } ?>>
                                                    <?= $data->tax; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <div class="invalid-feedback">
                                                Please select the type of Tax.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tax_ammount" class="form-label">Tax Ammount</label>
                                            <input type="text" class="form-control"
                                                value="<?php if(!empty($single_data)){ echo $single_data->tax_ammount; }?>"
                                                id="tax_ammount" name="tax_ammount" required>
                                            <div class="invalid-feedback">
                                                Please provide the tax Ammount.
                                            </div>
                                        </div>
                                        <!-- <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Add Product</button>
                                        </div> -->
                                        <div class="col-12">
                            <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel"
                                aria-labelledby="pills-profile-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>MRP</th>
                                                        <th>Tax Ammount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (is_array($Product) || is_object($Product)): 
                                                        $i = 1; 
                                                         foreach ($Product as $Product):
                                                             ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $Product->product_name ?>
                                                        </td>
                                                        <td><?php echo $Product->unit; ?></td>
                                                        <td><?php echo $Product->mrp; ?></td>
                                                        <td><?php echo $Product->tax_ammount; ?></td>
                                                        <td>
                                                            <a
                                                                href="<?= base_url(); ?>edit_product/<?= $Product->id; ?>"><i
                                                                    class="far fa-edit me-2"></i></a>
                                                            <a href="<?= base_url(); ?>delete/<?= base64_encode($Product->id); ?>/tbl_product"
                                                                onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i
                                                                    class="far fa-trash-alt me-2"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $i++; 
                                                         endforeach; ?>
                                                    <?php else: ?>
                                                    <p>No employees found.</p>
                                                    <?php endif; ?>
                                                </tbody>

                                            </table>
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
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>