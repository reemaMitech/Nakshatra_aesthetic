<?php include __DIR__.'/../Admin/header.php'; ?>


<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Packaging Material Master</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Packaging Material</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Packaging Material List</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Add Stocks Form -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="card-header">
                                    <h4 class="card-title">Add Packaging Material</h4>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3 needs-validation"
                                        action="<?= base_url('add_packaging_material'); ?>" method="post" novalidate>
                                        <input type="hidden" class="form-control" id="id"
                                                value="<?php if(!empty($single_data)){ echo $single_data->id; }?>"
                                                name="id">
                                        <!-- Branch Name Field -->
                                        <div class="col-md-6">
                                            <label for="MaterialName" class="form-label">Material Name</label>
                                            <input type="text" class="form-control" id="MaterialName"
                                                value="<?php if(!empty($single_data)){ echo $single_data->Material_Name; }?>"
                                                name="Material_Name" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Material name.
                                            </div>
                                        </div>

                                        <!-- Branch Location Field -->
                                        <div class="col-md-6">
                                            <label for="Material_Quantity" class="form-label">Material Quantity</label>
                                            <input type="text" class="form-control" id="Material_Quantity"
                                                value="<?php if(!empty($single_data)){ echo $single_data->Material_Quantity; }?>"
                                                name="Material_Quantity" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Quantity.
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <button type="submit" value="" name="Save" id="submit"
                                                class="btn btn-lg btn-success">
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
                                        <h4 class="card-title">Packaging Material List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>MaterialName</th>
                                                        <th>Quantity</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (is_array($packaging_material) || is_object($packaging_material)): 
                                                        $i = 1; 
                                                         foreach ($packaging_material as $Product):
                                                             ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $Product->Material_Name ?>
                                                        </td>
                                                        <td><?php echo $Product->Material_Quantity; ?></td>

                                                        <td>
                                                            <a
                                                                href="<?= base_url(); ?>edit_Packaging_Material/<?= $Product->id; ?>"><i
                                                                    class="far fa-edit me-2"></i></a>
                                                            <a href="<?= base_url(); ?>delete/<?= base64_encode($Product->id); ?>/tbl_packaging_material"
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