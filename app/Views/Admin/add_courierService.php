<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add CourierService Provider</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add Provider</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Destination List</button>

                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact" aria-selected="false">Dispatch List</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <form class="row g-3 needs-validation" action="<?= base_url('set_courierService'); ?>" method="post" novalidate>
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                   
                                    <!-- Courier Service Name -->
                                    <div class="col-md-6">
                                        <label for="courier_service_provider" class="form-label"> Name</label>
                                        <input type="text" class="form-control" id="courier_service_provider" name="courier_service_provider" value="<?php if(!empty($single_data)){ echo $single_data->provider_name; }?>" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Courier Service Provider Name.
                                        </div>
                                    </div>

                                    <!-- Mobile number Field -->
                                    <div class="col-md-6">
                                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" id="mobileNumber" name="mobile_number" minlength="10" maxlength="10"  pattern="\d{10}" value="<?php if(!empty($single_data)){ echo $single_data->mobile_number; }?>" required >
                                        <div class="invalid-feedback">
                                            Please provide a valid mobile number.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <!-- <input type="text" class="form-control" id="address" name="address" required> -->
                                        <textarea class="form-control" id="address" name="address" rows="4" cols="30" required><?php if(!empty($single_data)){ echo $single_data->address; }?></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid Address.
                                        </div>
                                    </div>
                                    <!-- Radio buttons for selecting location type -->
                                    <div class="col-md-6">
                                        <label class="form-label">Location Type</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="location_type" id="dispatch_location" value="dispatch" <?php if(!empty($single_data) && ($single_data->location_type=='dispatch'))echo 'checked'; ?> required>
                                            
                                            <label class="form-check-label" for="dispatch_location">Dispatch Location</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="location_type" id="destination_location" value="destination" <?php if(!empty($single_data) && ($single_data->location_type=='destination'))echo 'checked'; ?> required>
                                            <label class="form-check-label" for="destination_location">Destination Location</label>
                                        </div>
                                        <div class="invalid-feedback">Please select a location type.</div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                        <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"> Destination Courier Service</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php if (!empty($courier_data)) { 
                                                        $i = 1;
                                                        foreach ($courier_data as $courier):
                                                        if($courier->location_type==='destination'){ ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $courier->provider_name; ?></td>
                                                                <td><?php echo $courier->mobile_number; ?></td>
                                                                <td><?php echo $courier->address; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>edit_courier/<?= $courier->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($courier->id); ?>/tbl_courierservice" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                        }
                                                        endforeach; 
                                                    } ?>
                                                </tbody>
                                            
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                                aria-labelledby="pills-contact-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"> Dispatch Courier Service</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php if (!empty($courier_data)) { 
                                                        $i = 1;
                                                        foreach ($courier_data as $courier):
                                                        if($courier->location_type==='dispatch'){ ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $courier->provider_name; ?></td>
                                                                <td><?php echo $courier->mobile_number; ?></td>
                                                                <td><?php echo $courier->address; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>edit_courier/<?= $courier->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($courier->id); ?>/tbl_courierservice" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                        }
                                                        endforeach; 
                                                    } ?>
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

<?php include __DIR__.'/../Admin/footer.php'; ?>
