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
                                    aria-selected="true">Product Enquiry Form</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" 
                                data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" 
                                aria-selected="false">Enquiry List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact" 
                                aria-selected="false">Follow Up List</button>
                            </li>
                        </ul>
                
                        <!-- <div class="card-body">
                        <div class="bd-example">
                            <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="true">Product Enquiry Form</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Enquiry List</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact" aria-selected="false">Follow Up List</button>
                                </li>
                            </ul> -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <form class="row g-3 needs-validation" action="<?= base_url('product_enquiry_details'); ?>" method="post" id="product_enquiry_form" novalidate>
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                        <div class="col-md-4">
                                            <label class="form-label" for="enquiry_date"> Enquiry Date </label>
                                            <input type="date" class="form-control" id="enquiry_date"  name="enquiry_date" value="<?php if(!empty($single_data)){ echo $single_data->enquiry_date; }?>" min="<?= date('Y-m-d'); ?>" >
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
                                            <input type="text" class="form-control" id="mobileNumber" name="mobile_number" maxlength="10" minlength="10" pattern="\d{10}" value="<?php if(!empty($single_data)){ echo $single_data->mob_no; }?>" required >
                                            <div class="invalid-feedback">
                                                Please provide a valid mobile number.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country" class="form-label">Country:</label>
                                                        <select class="form-select choosen" id="country" name="Country">
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
                                                <select class="form-select choosen" id="state" name="State">
                                                    <option value="">Please select state</option>
                                                </select>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="City" class="form-label">City:</label>
                                                <select class="form-select choosen" id="city_id" name="City">
                                                    <option value="">Please select city</option>
                                                    
                                                    <?php if(!empty($citys)){foreach($citys as $city_result){?>
                                                    <option value="<?=$city_result->id?>"
                                                        <?php if(!empty($single_data) && $single_data->city == $city_result->id){?>selected="selected"
                                                        <?php }?>><?=$city_result->name?></option>
                                                    <?php } } ?>
                                                  
                                                </select>
                                        </div> -->

                                        <div class="col-md-4">
                                            <label for="City" class="form-label">City</label>
                                            <input type="text" class="form-control" id="city_id" name="City" value="<?php if(!empty($single_data)){ echo $single_data->city; }?>"required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city name.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="productName" class="form-label">Product Name</label>
                                                <select class="form-select" id="productName" name="product_name" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php if(!empty($product)){
                                                     foreach ($product as $item): ?>
                                                    <option value="<?= $item->id; ?>"
                                                     <?php if(!empty($single_data) && $single_data->prod_id == $item->id){?>selected="selected"
                                                    data-mrp="<?= $item->mrp_with_tax; ?>"  <?php }?>>
                                                        <?= $item->product_name; ?>
                                                    </option>
                                                    <?php endforeach;
                                                    } ?>

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
                                 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="pincode"> Pincode</label>
                                                <input type="text" class="form-control" id="pincode" name="pincode"  minlength="6" maxlength="6" pattern="^[1-9][0-9]{5}$" title="Pincode must be a 6-digit number starting with a non-zero digit"
                                                 value="<?php if(!empty($single_data)){ echo $single_data->pincode; }?>" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid pincode.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="detailAddress"> Detail Address</label>
                                                <textarea class="form-control" id="detailAddress" name="detailAddress" rows="3" required><?php if(!empty($single_data)){ echo $single_data->cust_addr; } ?></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid Detail address.
                                            </div>
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
                                        <h4 class="card-title">Enquiry List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
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

                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                                aria-labelledby="pills-contact-tab1">
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Follow-Up Modal -->
    <div class="modal fade" id="followUpModal" tabindex="-1" aria-labelledby="followUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="followUpModalLabel">Add Follow-Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="followUpForm">
                    <div class="modal-body">
                        <input type="hidden" id="enquiry_id" name="enquiry_id" value="">
                        <input type="hidden" id="follow_up_count" name="follow_up_count" value="">

                        <div class="mb-3">
                            <label for="follow_up_date" class="form-label">Follow-Up Date</label>
                            <input type="date" class="form-control" id="follow_up_date" name="follow_up_date" min="<?= date('Y-m-d');?> required>
                        </div>

                        <!-- Replace textarea with select dropdown -->
                        <div class="mb-3">
                            <label for="status_remark" class="form-label">Status/Remark</label>
                            <select class="form-control" id="status_remark" name="status_remark" required>
                                <option value="">Select a status/remark</option>
                                <option value="Interested">Interested</option>
                                <option value="Not Interested">Not Interested</option>
                                <option value="After Some Days">After Some Days</option>
                                <option value="Phone Not Answered">Phone Not Answered</option>
                                <option value="Wrong Number">Wrong Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Follow-Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>

<script>
    $(document).ready(function() {
    $('#datatable').DataTable({
        "order": [[2, "desc"]] // Adjust column index and order direction as needed
    });
});

$(document).ready(function() {
    // Handle the button click to show the modal and set enquiry_id
    $('.follow-up-btn').on('click', function() {
        var enquiryId = $(this).data('id'); // Get the enquiry ID
        var followUpCountElem = $('#follow-up-count-' + enquiryId); // Target the follow-up count span
        var currentCount = parseInt(followUpCountElem.text().replace('(', '').replace(')', ''), 10); // Extract the count

        // Check if follow-up count is less than 3
        if (currentCount < 3) {
            // Set the enquiry_id and increment the follow-up count in the hidden field
            $('#enquiry_id').val(enquiryId);
            $('#follow_up_count').val(currentCount + 1);

            // Show the modal
            $('#followUpModal').modal('show');
        } else {
            // If count is 3 or more, show an alert or take no action
            alert('Follow-up limit reached. You cannot add more follow-ups.');
        }
    });

    // Handle the form submission for adding a follow-up
    $('#followUpForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally
        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: "<?= base_url('add_follow_up'); ?>", // URL of the controller method to handle follow-up
            method: "POST",
            data: formData,
            dataType: 'json', // Expect a JSON response
            success: function(response) {
                if (response.success) {
                    // Update the follow-up count in the table
                    var followUpCountElement = $('#follow-up-count-' + response.enquiry_id);
                    followUpCountElement.text('(' + response.new_count + ')');

                    // Close the modal
                    $('#followUpModal').modal('hide');
                } else {
                    alert(response.message || 'Error saving follow-up!');
                }
            },
            error: function() {
                alert('An error occurred while saving the follow-up.');
            }
        });
    });

    // Handle the follow-up count increment via AJAX
    $(".follow-up-btn").click(function() {
        var enquiryId = $(this).data("id"); // Get the enquiry ID
        var followUpCountSpan = $("#follow-up-count-" + enquiryId); // Target the follow-up count span
        var currentCount = parseInt(followUpCountSpan.text().replace('(', '').replace(')', ''), 10); // Extract the count

        // Check if follow-up count is less than 3
        if (currentCount < 3) {
            // Make an AJAX request to increment the follow-up count
            $.ajax({
                url: "<?= base_url('increment_follow_up_count'); ?>", // URL of the controller method
                type: "POST",
                data: {
                    id: enquiryId
                },
                dataType: 'json', // Expect JSON response
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
        } else {
            // If count is 3 or more, do not increment or open modal
            alert('Follow-up limit reached. No more follow-ups can be added.');
        }
    });
});


$(document).ready(function() {
    // When the 'Follow Up List' tab is clicked
    $('#contact-tab').on('click', function() {
        // Make an AJAX request to fetch follow-up data
        $.ajax({
            url: "<?= base_url('get_follow_up_data'); ?>", // URL to fetch follow-up data
            method: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    // Clear the existing data in the Follow Up List tab
                    $('#pills-contact1').empty();

                    // Create the table
                    var table = `
                        <div class="table-responsive">
                           <table id="datatable" class="table table-striped follow_up_table" data-toggle="data-table">
                               <thead>
                                   <tr>
                                       <th>Customer Name</th>
                                       <th>Follow Up Count</th>
                                       <th>Date</th>
                                       <th>Status/Remark</th>
                                   </tr>
                               </thead>
                               <tbody>
                    `;

                    // Loop through the follow-up data and append rows to the table
                    response.data.forEach(function(item) {
                        table += `
                            <tr>
                                <td>${item.cust_name}</td>
                                <td>${item.follow_up_count}</td>
                                <td>${item.follow_up_date}</td>
                                <td>${item.status_remark}</td>
                            </tr>
                        `;
                    });

                    // Close the table tags
                    table += `
                           </tbody>
                       </table>
                    </div>
                    `;

                    // Append the table to the tab content
                    $('#pills-contact1').html(table);

                    // Initialize DataTables with sorting by follow_up_date in descending order
                    $('.follow_up_table').DataTable({
                        "paging": true,
                        "searching": true,
                        "ordering": true,
                        "order": [[2, 'desc']] // Sort by the third column (follow_up_date) in descending order
                    });
                } else {
                    $('#pills-contact1').html('<p>No follow-up data available.</p>');
                }
            },
            error: function() {
                alert('Error fetching follow-up data.');
            }
        });
    });
});

$(document).ready(function() {
    $('#country').on('change', function() {
        var countryId = $(this).val();

        // Clear the state dropdown
        $('#state').html('<option value="">Select State</option>');

        if (countryId) {
            // AJAX request to get states based on selected country
            $.ajax({
                url: '<?= base_url('getStates') ?>',  // CodeIgniter 4 route
                type: 'GET',
                data: { country_id: countryId },
                dataType: 'json',
                success: function(states) {
                    console.log(states);
                    // Populate the state dropdown
                    $.each(states, function(key, state) {
                        $('#state').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                    });
                }
            });
        }
    });
});







</script>

