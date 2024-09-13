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
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Order List  </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Add Order</button>
                            </li>
                        
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php if (!empty($order_data)) { 
                                                            // print_r($order_data);exit(); 
                                                        $i = 1;
                                                        foreach ($order_data as $data): ?>
                                                     
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $data->username; ?></td>
                                                                <td><?php echo $data->mobile_number; ?></td>
                                                                <td><?php echo $data->quantity; ?></td>
                                                                <!-- <td><?php echo $data->mobile_number; ?></td> -->
                                                               
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                        endforeach; 
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Sr. No.</th>
                                                        <th> Name </th>
                                                        <th> Mobile Number </th>
                                                        <th> Action </th>
                                            
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                             
                            </div>

                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <form class="row g-3 needs-validation" action="<?= base_url('take_order'); ?>" method="post" enctype="multipart/form-data" novalidate>
                                        
                                        <!-- New Fields for Username and Mobile Number -->
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid username.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobileNumber" name="mobile_number" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid mobile number.
                                            </div>
                                        </div>
                                        <!-- End of New Fields -->

                                        <div class="col-md-6">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <select class="form-select" id="productName" name="product_name" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php foreach ($product as $item): ?>
                                                <option value="<?= $item->id; ?>" data-mrp="<?= $item->mrp_with_tax; ?>" data-unit="<?= $item->unit; ?>" data-unit_type="<?= $item->unit_type; ?>">
                                                    <?= $item->product_name; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid product name.
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="unit" class="form-label">Unit</label>
                                            <input type="text" class="form-control" id="unit" name="unit" readonly required>
                                            <div class="invalid-feedback">
                                                Please provide the unit.
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="unitType" class="form-label">Unit Type</label>
                                            <input type="text" class="form-control" id="unitType" name="unit_type" readonly required>
                                            <div class="invalid-feedback">
                                                Please provide the unit type.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid quantity.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="mrp" class="form-label">MRP</label>
                                            <input type="text" class="form-control" id="mrp" name="mrp" readonly required>
                                            <div class="invalid-feedback">
                                                Please provide the MRP.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="totalAmount" class="form-label">Total Amount</label>
                                            <input type="text" class="form-control" id="totalAmount" name="total_amount" readonly required>
                                            <div class="invalid-feedback">
                                                Please provide the total amount.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transactionId" class="form-label">Transaction ID</label>
                                            <input type="text" class="form-control" id="transactionId" name="transaction_id" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid transaction ID.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transactionScreenshot" class="form-label">Transaction Screenshot</label>
                                            <input type="file" class="form-control" id="transactionScreenshot" name="transaction_screenshot" required>
                                            <div class="invalid-feedback">
                                                Please upload a screenshot of the payment.
                                            </div>
                                        </div>

                                        <!-- New Fields -->
                                        <div class="col-md-6">
                                            <label for="pincode" class="form-label">Pincode</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid pincode.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                                    <label for="country" class="form-label">Country:</label>
                                                        <!-- <div class="col-sm-9"> -->
                                                            <select class="form-select choosen" id="country_id" name="Country">
                                                                <option value="">Please select country</option>
                                                                <?php if(!empty($country)){foreach($country as $country_result){?>
                                                                <option value="<?=$country_result->id?>"
                                                                    <?php if(!empty($single) && $single->country_id == $country_result->id){?>selected="selected"
                                                                    <?php }?>><?=$country_result->name?></option>
                                                                <?php } } ?>
                                                            </select>
                                            
                                            </div>
                                            <div class="col-md-6">
                                                <label for="state" class="form-label">State:</label>
                                                <!-- <div class="col-sm-9"> -->
                                                    <select class="form-select choosen" id="state_id" name="State">
                                                        <option value="">Please select state</option>
                                                        <?php if((!empty($single)) != "") {?>
                                                        <?php 
                                                            if(!empty($states)){
                                                            foreach($states as $state_result){                ?>
                                                        <option value="<?=$state_result->id?>"
                                                            <?php if(!empty($single) && $single->state_id == $state_result->id){?>selected="selected"
                                                            <?php }?>><?=$state_result->name?></option>
                                                        <?php } } ?>
                                                        <?php }?>
                                                    </select>
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-6">
                                                <label for="City" class="form-label">City:</label>
                                                <!-- <div class="col-sm-9"> -->
                                                    <select class="form-select choosen" id="city_id" name="City">
                                                        <option value="">Please select city</option>
                                                        <?php if((!empty($single)) != "") {?>
                                                        <?php if(!empty($citys)){foreach($citys as $city_result){?>
                                                        <option value="<?=$city_result->id?>"
                                                            <?php if(!empty($single) && $single->city_id == $city_result->id){?>selected="selected"
                                                            <?php }?>><?=$city_result->name?></option>
                                                        <?php } } ?>
                                                        <?php }?>
                                                    </select>
                                                <!-- </div> -->
                                            </div>
                                        <!-- <div class="col-md-6">
                                            <label for="tal" class="form-label">Tal</label>
                                            <input type="text" class="form-control" id="tal" name="tal" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Tal.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="district" class="form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid district.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid country.
                                            </div>
                                        </div> -->
                                        <div class="col-md-12">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                        </div>
                                        <!-- End of New Fields -->

                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Submit Order</button>
                                        </div>
                                    </form>
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
    // When product is selected
    $('#productName').change(function() {
        var selectedOption = $(this).find('option:selected');
        var mrp = selectedOption.data('mrp');
        var unit = selectedOption.data('unit');
        var unitType = selectedOption.data('unit_type');

        // Set the MRP, Unit, and Unit Type values
        $('#mrp').val(mrp);
        $('#unit').val(unit);
        $('#unitType').val(unitType);

        // Calculate the total amount if quantity is already entered
        var quantity = $('#quantity').val();
        if (quantity) {
            $('#totalAmount').val(mrp * quantity);
        }
    });

    // When quantity is entered
    $('#quantity').keyup(function() {
        var quantity = $(this).val();
        var mrp = $('#mrp').val();

        // Calculate and set the total amount
        if (quantity && mrp) {
            $('#totalAmount').val(mrp * quantity);
        } else {
            $('#totalAmount').val('');
        }
    });
});


$("#country_id").change(function() {



$.ajax({

    type: "post",

    url: "<?=base_url();?>get_state_name_location",

    data: {

        'country_id': $("#country_id").val()

    },

    success: function(data) {

        console.log(data);

        $('#state_id').empty();

        $('#state_id').append('<option value="">Choose ...</option>');

        var opts = $.parseJSON(data);

        $.each(opts, function(i, d) {

            $('#state_id').append('<option value="' + d.id + '">' + d.name +

                '</option>');

        });

        $('#state_id').trigger("chosen:updated");

    },

    error: function(jqXHR, textStatus, errorThrown) {

        console.log(textStatus, errorThrown);

    }

});

});

$("#state_id").change(function() {



$.ajax({

    type: "post",

    url: "<?=base_url();?>get_city_name_location",

    data: {

        'state_id': $("#state_id").val()

    },

    success: function(data) {

        console.log(data);

        $('#city_id').empty();

        $('#city_id').append('<option value="">Choose ...</option>');

        var opts = $.parseJSON(data);

        $.each(opts, function(i, d) {

            $('#city_id').append('<option value="' + d.id + '">' + d.name +

                '</option>');

        });

        $('#city_id').trigger("chosen:updated");

    },

    error: function(jqXHR, textStatus, errorThrown) {

        console.log(textStatus, errorThrown);

    }

});

})
</script>
