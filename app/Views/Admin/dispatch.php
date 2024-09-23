<?php include __DIR__.'/../Admin/header.php'; ?>

<div class="container-fluid content-inner mt-n5 py-0">

    <?php if (session()->getFlashdata('message')): ?>
    <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Dispatch Form</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Dispatch Form</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Dispatch List</button>
                            </li>
                           
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
                            <form class="row g-3 needs-validation" action="<?= base_url('dispatch_details'); ?>" method="post" id="dispatch_form" novalidate>
                                    <!-- Hidden ID Field -->
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                    
                                    <!-- Courier Provider -->
                                    <div class="col-md-4">
                                        <label for="courier_provider" class="form-label">Courier Name</label>
                                        <select class="form-select" id="courier_provider" name="courier_provider" required>
                                            <option value="" selected disabled>Select a provider</option>
                                            <?php foreach ($courier_services as $service): ?>
                                                <option value="<?= esc($service['provider_name']); ?>" <?= (!empty($single_data) && $single_data->courier_provider == $service['provider_name']) ? 'selected' : ''; ?>>
                                                    <?= esc($service['provider_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a courier provider.
                                        </div>
                                    </div>

                                    <!-- Courier Mobile Number -->
                                    <div class="col-md-4">
                                        <label for="courier_mobile" class="form-label">Courier Mobile Number</label>
                                        <input type="text" class="form-control" id="courier_mobile" name="courier_mobile"
                                            value="<?php if(!empty($single_data)){ echo $single_data->courier_mobile; } ?>" readonly />
                                        <div class="invalid-feedback">
                                            Courier mobile number will be populated based on the selected provider.
                                        </div>
                                    </div>

                                    <!-- Courier Date -->
                                    <div class="col-md-4">
                                        <label for="courier_date" class="form-label">Courier Date</label>
                                        <input type="date" class="form-control" id="courier_date" name="courier_date" required
                                            min="<?= date('Y-m-d'); ?>"
                                            value="<?php if(!empty($single_data)){ echo $single_data->courier_date; } ?>">
                                        <div class="invalid-feedback">
                                            Please provide a courier date.
                                        </div>
                                    </div>

                                    <!-- Bill Number -->
                                    <div class="col-md-4">
                                        <label for="bill_number" class="form-label">Our Bill Number</label>
                                        <input type="text" class="form-control" id="bill_number" name="bill_number" required
                                            value="<?php if(!empty($single_data)){ echo $single_data->bill_number; } ?>">
                                        <div class="invalid-feedback">
                                            Please enter a bill number.
                                        </div>
                                    </div>

                                    <!-- Customer Name -->
                                    <div class="col-md-4">
                                        <label for="customer_name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" readonly
                                            value="<?php if(!empty($single_data)){ echo $single_data->customer_name; } ?>">
                                        <div class="invalid-feedback">
                                            Customer name will be populated based on the bill number.
                                        </div>
                                    </div>

                                    <!-- Customer Mobile Number -->
                                    <div class="col-md-4">
                                        <label for="customer_mobile" class="form-label">Customer Mobile Number</label>
                                        <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" readonly
                                            value="<?php if(!empty($single_data)){ echo $single_data->customer_mobile; } ?>">
                                        <div class="invalid-feedback">
                                            Customer mobile number will be populated based on the bill number.
                                        </div>
                                    </div>

                                    <!-- Delivery Address -->
                                    <div class="col-md-4">
                                        <label for="delivery_address" class="form-label">Delivery Address</label>
                                        <textarea class="form-control" id="delivery_address" name="delivery_address" rows="3" readonly><?php if(!empty($single_data)){ echo $single_data->delivery_address; } ?></textarea>
                                        <div class="invalid-feedback">
                                            Delivery address will be populated based on the bill number.
                                        </div>
                                    </div>

                                    <!-- Tracking ID -->
                                    <div class="col-md-4">
                                        <label for="tracking_id" class="form-label">Tracking ID</label>
                                        <input type="text" class="form-control" id="tracking_id" name="tracking_id" required
                                            value="<?php if(!empty($single_data)){ echo $single_data->tracking_id; } ?>">
                                        <div class="invalid-feedback">
                                            Please enter a tracking ID.
                                        </div>
                                    </div>

                                    <!-- Courier Price -->
                                    <div class="col-md-4">
                                        <label for="courier_price" class="form-label">Courier Price</label>
                                        <input type="text" class="form-control" id="courier_price" name="courier_price" required
                                            value="<?php if(!empty($single_data)){ echo $single_data->courier_price; } ?>">
                                        <div class="invalid-feedback">
                                            Please enter the courier price.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                            <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"> Dispatch List</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Courier Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Courier Date</th>
                                                        <th>Tracking ID</th>
                                                        <th>Bill Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php if (!empty($dispatch_data)) { 
                                                        $i = 1;
                                                        foreach ($dispatch_data as $dispatch):
                                                        // print_r($dispatch);die;?>
                                                       
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $dispatch->courier_provider; ?></td>
                                                                <td><?php echo $dispatch->courier_mobile; ?></td>
                                                                <td><?php echo $dispatch->courier_date; ?></td>
                                                                <td><?php echo $dispatch->tracking_id; ?></td>
                                                                <td><?php echo $dispatch->bill_number; ?></td>
                                                                <!-- <td><?php echo $dispatch->courier_date; ?></td> -->
                                                                <td>
                                                                       <!-- Invoice with Tooltip -->
                                                                       <a href="challan/<?=$dispatch->id; ?>" target="_blank" data-toggle="tooltip" title="View Challan">
                                                                       <i class='fas fa-receipt me-2'></i>
                                                                        </a>
                                                                    <a href="<?= base_url(); ?>edit_dispatch/<?= $dispatch->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($dispatch->id); ?>/tbl_dispatch" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                      
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

<?php include __DIR__.'/../Admin/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch mobile number based on selected provider
    $('#courier_provider').on('change', function() {
        var providerName = $(this).val();
        var courierMobile = $('#courier_mobile');

        if (providerName) {
            $.ajax({
                url: 'getCourierMobile',
                type: 'GET',
                data: {
                    provider_name: providerName
                },
                success: function(response) {
                    if (response && response.mobile_number) {
                        courierMobile.val(response.mobile_number);
                    } else {
                        courierMobile.val(''); // Clear the mobile number if not found
                    }
                },
                error: function() {
                    console.error('Error fetching courier mobile number.');
                    courierMobile.val(''); // Clear the mobile number on error
                }
            });
        } else {
            courierMobile.val('');
        }
    });

    // Fetch customer data based on bill number (invoiceNo)
    $('#bill_number').on('blur', function() {
        var invoiceNo = $(this).val();

        if (invoiceNo) {
            $.ajax({
                url: 'getCustomerData', // Ensure this URL is correctly routed in your application
                type: 'GET',
                data: {
                    invoice_no: invoiceNo
                },
                success: function(response) {
                    if (response) {
                        $('#customer_name').val(response.customer_name || 'N/A');
                        $('#customer_mobile').val(response.contact_no || 'N/A');
                        $('#delivery_address').val(response.delivery_address || 'N/A');
                    } else {
                        $('#customer_name').val('N/A');
                        $('#customer_mobile').val('N/A');
                        $('#delivery_address').val('N/A');
                    }
                },
                error: function() {
                    console.error('Error fetching customer data.');
                    $('#customer_name').val('N/A');
                    $('#customer_mobile').val('N/A');
                    $('#delivery_address').val('N/A');
                }
            });
        } else {
            $('#customer_name').val('N/A');
            $('#customer_mobile').val('N/A');
            $('#delivery_address').val('N/A');
        }
    });

    // Open date picker on focus
    $('#courier_date').on('focus', function() {
        $(this).click();
    });

    // Show success message and auto-hide after 3 seconds
    if ($('#flash-message').length) {
        setTimeout(function() {
            $('#flash-message').fadeOut('slow');
        }, 3000);
    }
});
</script>
