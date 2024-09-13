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
                    <form class="row g-3 needs-validation" action="<?= base_url('dispatch_details'); ?>" method="post"
                        id="dispatch_form" novalidate>

                        <!-- Courier Provider -->
                        <div class="col-md-4">
                            <label for="courier_provider" class="form-label">Courier Name</label>
                            <select class="form-select" id="courier_provider" name="courier_provider" required>
                                <option value="" selected disabled>Select a provider</option>
                                <?php foreach ($courier_services as $service): ?>
                                <option value="<?= esc($service['provider_name']); ?>">
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
                                readonly />
                            <div class="invalid-feedback">
                                Courier mobile number will be populated based on the selected provider.
                            </div>
                        </div>

                        <!-- Courier Date -->
                        <div class="col-md-4">
                            <label for="courier_date" class="form-label">Courier Date</label>
                            <input type="date" class="form-control" id="courier_date" name="courier_date" required
                                min="<?= date('Y-m-d'); ?>">
                            <div class="invalid-feedback">
                                Please provide a courier date.
                            </div>
                        </div>

                        <!-- Bill Number -->
                        <div class="col-md-4">
                            <label for="bill_number" class="form-label">Our Bill Number</label>
                            <input type="text" class="form-control" id="bill_number" name="bill_number" required>
                            <div class="invalid-feedback">
                                Please enter a bill number.
                            </div>
                        </div>
                        
                        <!-- Customer Name -->
                        <div class="col-md-4">
                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" readonly />
                            <div class="invalid-feedback">
                                Customer name will be populated based on the bill number.
                            </div>
                        </div>

                        <!-- Customer Mobile Number -->
                        <div class="col-md-4">
                            <label for="customer_mobile" class="form-label">Customer Mobile Number</label>
                            <input type="text" class="form-control" id="customer_mobile" name="customer_mobile"
                                readonly />
                            <div class="invalid-feedback">
                                Customer mobile number will be populated based on the bill number.
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="col-md-4">
                            <label for="delivery_address" class="form-label">Delivery Address</label>
                            <textarea class="form-control" id="delivery_address" name="delivery_address" rows="3"
                                readonly></textarea>
                            <div class="invalid-feedback">
                                Delivery address will be populated based on the bill number.
                            </div>
                        </div>
                        <!-- Tracking ID -->
                        <div class="col-md-4">
                            <label for="tracking_id" class="form-label">Tracking ID</label>
                            <input type="text" class="form-control" id="tracking_id" name="tracking_id" required>
                            <div class="invalid-feedback">
                                Please enter a tracking ID.
                            </div>
                        </div>
                        <!-- Courier Price -->
                        <div class="col-md-4">
                            <label for="courier_price" class="form-label">Courier Price</label>
                            <input type="text" class="form-control" id="courier_price" name="courier_price" required>
                            <div class="invalid-feedback">
                                Please enter the courier price.
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-lg btn-success">
                                Submit
                            </button>
                        </div>
                    </form>
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
