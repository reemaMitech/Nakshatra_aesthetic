<?php include __DIR__.'/../Admin/header.php'; ?>


<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product Enquiry</h4>
                    </div>
                </div>
                
                
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true"> Product Enquiry Form </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Enquiry List</button>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Contact</button>
                            </li> -->
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
                                <form class="row g-3 needs-validation" action="<?= base_url('product_enquiry_details'); ?>" method="post" id="product_enquiry_form" novalidate>
                                    <!-- <div class="row"> -->
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                        <div class="col-md-4">
                                            <!-- <div class="form-group"> -->
                                            <label class="form-label" for="enquiry_date"> Enquiry Date </label>
                                            <input type="date" class="form-control" id="enquiry_date"  name="enquiry_date" value="<?php if(!empty($single_data)){ echo $single_data->enquiry_date; }?>"  >
                                            <div class="invalid-feedback">
                                                Please provide an enquiry date.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="custname" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="custname" name="custname" value="<?php if(!empty($single_data)){ echo $single_data->cust_name; }?>"required>
                                            <div class="invalid-feedback">
                                                Please provide a valid customer name.
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobileNumber" name="mobile_number" value="<?php if(!empty($single_data)){ echo $single_data->mob_no; }?>" required >
                                            <div class="invalid-feedback">
                                                Please provide a valid mobile number.
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                    <!-- <div class="row"> -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country" class="form-label">Country:</label>
                                                    <!-- <div class="col-sm-9"> -->
                                                        <select class="form-select choosen" id="country_id" name="Country">
                                                            <option value="">Please select country</option>
                                                            <?php if(!empty($country)){foreach($country as $country_result){?>
                                                            <option value="<?=$country_result->id?>"
                                                                <?php if(!empty($single_data) && $single_data->country == $country_result->id){?>selected="selected"
                                                                <?php }?>><?=$country_result->name?></option>
                                                            <?php } } ?>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="state" class="form-label">State:</label>
                                            <!-- <div class="col-sm-9"> -->
                                                <select class="form-select choosen" id="state_id" name="State">
                                                    <option value="">Please select state</option>
                                                   
                                                    <?php 
                                                        if(!empty($states)){
                                                        foreach($states as $state_result){                ?>
                                                    <option value="<?=$state_result->id?>"
                                                        <?php if(!empty($single_data) && $single_data->state == $state_result->id){?>selected="selected"
                                                        <?php }?>><?=$state_result->name?></option>
                                                    <?php } } ?>
                                                 
                                                </select>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <label for="City" class="form-label">City:</label>
                                            <!-- <div class="col-sm-9"> -->
                                                <select class="form-select choosen" id="city_id" name="City">
                                                    <option value="">Please select city</option>
                                                    
                                                    <?php if(!empty($citys)){foreach($citys as $city_result){?>
                                                    <option value="<?=$city_result->id?>"
                                                        <?php if(!empty($single_data) && $single_data->city == $city_result->id){?>selected="selected"
                                                        <?php }?>><?=$city_result->name?></option>
                                                    <?php } } ?>
                                                  
                                                </select>
                                            <!-- </div> -->
                                        </div>
                                    <!-- </div> -->

                                    <!-- <div class="row"> -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="productName" class="form-label">Product Name</label>
                                                <select class="form-select" id="productName" name="product_name" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php foreach ($product as $item): ?>
                                                    <option value="<?= $item->id; ?>"
                                                     <?php if(!empty($single_data) && $single_data->prod_id == $item->id){?>selected="selected"
                                                    data-mrp="<?= $item->mrp_with_tax; ?>"  <?php }?>>
                                                        <?= $item->product_name; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid product name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php if(!empty($single_data)){ echo $single_data->prod_qty; }?>" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid quantity.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="prod_desc" class="form-label"> Product Description</label>
                                            <textarea type="text" class="form-control" id="prod_desc" name="prod_desc" required><?php if(!empty($single_data)){ echo " $single_data->product_details;"; } ?></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid product Desription.
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                
                                    <!-- <div class="row"> -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="pincode"> Pincode</label>
                                                <input type="number" class="form-control" id="pincode" name="pincode" value="<?php if(!empty($single_data)){ echo $single_data->pincode; }?>" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid pincode.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="detailAddress"> Detail Address</label>
                                                <textarea class="form-control" id="detailAddress" name="detailAddress" rows="3"><?php if(!empty($single_data)){ echo $single_data->cust_addr; } ?></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid Detail address.
                                            </div>
                                        </div>
                                
                                    <!-- </div> -->
                                    
                                    <div class="col-12">
                                    <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                    </div>
                                
                                </form>
                            </div>

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Enquiry List</h4>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable" class="table table-striped table-responsive" data-toggle="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Product Name</th>
                                                    <th>Product Quantity</th>
                                                    <th>Follow-Up Action</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php if (!empty($enquiry_data)) { 
                                                    $i = 1;
                                                    foreach ($enquiry_data as $enquiry): ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $enquiry->cust_name; ?></td>
                                                            <td><?php echo $enquiry->mob_no; ?></td>
                                                            <td><?php echo $enquiry->product_name; ?></td>
                                                            <td><?php echo $enquiry->prod_qty; ?></td>
                                                            <td>
                                                                <button class="btn btn-primary follow-up-btn" data-id="<?php echo $enquiry->id; ?>">
                                                                    Add Follow-Up
                                                                </button>
                                                                <span class="follow-up-count" id="follow-up-count-<?php echo $enquiry->id; ?>">
                                                                    (<?php echo $enquiry->follow_up_count ?? 0; ?>)
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url(); ?>edit_enquiry/<?= $enquiry->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                <a href="<?= base_url(); ?>delete/<?= base64_encode($enquiry->id); ?>/tbl_product_enquiry" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    $(".follow-up-btn").click(function() {
        var enquiryId = $(this).data("id"); // Get the enquiry ID
        var followUpCountSpan = $("#follow-up-count-" + enquiryId); // Target the follow-up count span

        // Make an AJAX request to increment the follow-up count
        $.ajax({
            url: "<?= base_url('increment_follow_up_count'); ?>", // URL of the controller method
            type: "POST",
            data: {
                id: enquiryId
            },
            success: function(response) {
                if (response.success) {
                    // Update the follow-up count in the span
                    followUpCountSpan.text("(" + response.follow_up_count + ")");
                } else {
                    alert(response.message || 'Error updating follow-up count.');
                }
            },
            error: function() {
                alert('Error processing the request.');
            }
        });
    });
});

</script>

