<?php include __DIR__.'/../Admin/header.php'; ?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Branch Master</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Branch</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Branch List</button>
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
                                    <form class="row g-3 needs-validation" action="<?= base_url('add_branches'); ?>"
                                        method="post" novalidate>
                                        <input type="hidden" class="form-control" id="id"
                                                value="<?php if(!empty($single_data)){ echo $single_data->id; }?>"
                                                name="id">
                                        <!-- Branch Name Field -->
                                        <div class="col-md-6">
                                            <label for="branchName" class="form-label">Branch Name</label>
                                            <input type="text" class="form-control"  value="<?php if(!empty($single_data)){ echo $single_data->branch_name; }?>" id="branchName" name="branch_name"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide a valid branch name.
                                            </div>
                                        </div>

                                        <!-- Branch Location Field -->
                                        <div class="col-md-6">
                                            <label for="branchLocation" class="form-label">Branch Location</label>
                                            <input type="text" class="form-control"  value="<?php if(!empty($single_data)){ echo $single_data->branch_location; }?>" id="branchLocation"
                                                name="branch_location" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid branch location.
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
                                        <h4 class="card-title">Branch List</h4>
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
                                                    <?php if (is_array($branch) || is_object($branch)): 
                                                        $i = 1; 
                                                         foreach ($branch as $branch):
                                                             ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $branch->branch_name ?>
                                                        </td>
                                                        <td><?php echo $branch->branch_location; ?></td>

                                                        <td>
                                                            <a
                                                                href="<?= base_url(); ?>edit_branch/<?= $branch->id; ?>"><i
                                                                    class="far fa-edit me-2"></i></a>
                                                            <a href="<?= base_url(); ?>delete/<?= base64_encode($branch->id); ?>/tbl_branch"
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