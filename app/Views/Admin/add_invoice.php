<?php include __DIR__.'/../Admin/header.php'; ?>
<?php
// Detect if URL contains 'edit_invoice'
$showForm = false;
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($current_url, 'edit_invoice') !== false) {
    $showForm = true;
}
?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Order Booking</h4>
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo !$showForm ? 'active' : ''; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="<?php echo !$showForm ? 'true' : 'false'; ?>">Bill List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $showForm ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="<?php echo $showForm ? 'true' : 'false'; ?>">Add Bill</button>
                            </li>
                        </ul>



                        <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show <?php echo !$showForm ? 'show active' : ''; ?>" id="pills-home1" role="tabpanel"
                                        aria-labelledby="pills-home-tab1">
                                        <div id="Invoice-list" >
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No</th>
                                                                <th>Action</th>
                                                                <th>Bill Number</th>
                                                                <th>Payment Status</th>
                                                                <th>Bill Date</th>
                                                                <th>Customer Name</th>
                                                                <th>Discount</th>

                                                                <th>Tax Amount</th>

                                                                <th>Total Amount</th>
                                  
                                                                <th>Final Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($invoice_data)) {
                                                                // echo '<pre>';print_r($invoice_data);die;
                                                                $i = 1;
                                                                foreach ($invoice_data as $data) {
                                                                        $adminModel = new \App\Models\AdminModel();
                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $i; ?></td>
                                                                                <td>
                                                                                    <?php if($data->payment_status === 'Received'){ ?>
                                                                                    <!-- Bill Label with Tooltip -->
                                                                                    <a href="bill_label/<?=$data->id; ?>" target="_blank" data-toggle="tooltip" title="View Bill Label">
                                                                                        <i class="far fa-file-alt me-2"></i>
                                                                                    </a>
                                                                                    
                                                                                    <!-- Invoice with Tooltip -->
                                                                                    <a href="invoice/<?=$data->id; ?>" target="_blank" data-toggle="tooltip" title="View Bill">
                                                                                        <i class='far fa-money-bill-alt me-2'></i>
                                                                                    </a>

                                                                                    <?php } ?>


                                                                                    
                                                                                    <!-- Edit with Tooltip -->
                                                                                    <!-- <a href="edit_invoice/<?=$data->id; ?>" data-toggle="tooltip" title="Edit Invoice">
                                                                                        <i class="far fa-edit me-2"></i>
                                                                                    </a>
                                                                                     -->
                                                                                    <!-- Delete with Tooltip and Confirmation -->
                                                                                    <a href="<?=base_url(); ?>delete_compan/<?php echo $data->id; ?>/tbl_invoice" 
                                                                                    data-toggle="tooltip" title="Delete Invoice"
                                                                                    onclick="return confirm('Are You Sure You Want To Delete This Record?')">
                                                                                        <i class="far fa-trash-alt me-2"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td><?php echo $data->invoiceNo; ?></td>
                                                                                <td>
                                                                                    <select class="form-select" name="payment_status" onchange="updatestatus(this, <?= $data->id; ?>)">
                                                                                        <option value="" selected>Select status</option>
                                                                                        <option value="Received" <?php if ($data->payment_status == 'Received') { echo "selected"; } ?>>Received</option>
                                                                                        <option value="Pending" <?php if ($data->payment_status == 'Pending') { echo "selected"; } ?>>Pending</option>
                                                                                        <option value="Cancelled" <?php if ($data->payment_status == 'Cancelled') { echo "selected"; } ?>>Cancelled</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td><?php echo $data->invoice_date; ?></td>
                                                                                <td><?php echo $data->customer_name; ?></td>

                                                                                <td><?php echo $data->discount; ?></td>
                                                                                <td><?php echo $data->total_tax_amt; ?></td>
                                                                            
                                                                                <td><?php echo $data->totalamounttotal; ?></td>

                                                                                <td><?php echo $data->final_total; ?></td>
                                                                            </tr>
                                                                            <?php $i++;
                                                                            
                                                                        }
                                                                    } ?>
                                                            </tbody>
                                        
                                                </table>
                                            </div>
                                        </div>

                                    
                                </div> 
                            <!-- </div>  -->
                            <!-- End of List -->

                            <!-- Invoice Form -->
                            <div class="tab-pane fade <?php echo $showForm ? 'show active' : ''; ?>" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <div id="access-form">
                                    <!-- Form for Adding/Editing Invoice Access Level -->
                                    <form class="row g-3" id="invoice_form" action="<?= base_url('set_invoice'); ?>" method="post" enctype="multipart/form-data" novalidate>
                                                <input type="hidden" id="invoice_id " name="id" value="<?php if(!empty($single_data)){ echo $single_data->id; } ?>">
                                                <div class="col-md-3 position-relative">
                                                <label for="branch_id" class="form-label">Branch</label>
                                                <select class="form-select" id="branch_id" name="branch_id" required>
                                                    <option disabled value="">Select Branch</option>

                                                    <?php 
                                                    if (!empty($branch_data)) { ?>
                                                        <?php foreach ($branch_data as $bdata) { ?>
                                                            <option value="<?= $bdata->id; ?>" 
                                                                <?php if(!empty($single_data) && $single_data->branch_id == $bdata->id) { echo 'selected'; } ?>>
                                                                <?= $bdata->branch_name; ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </select>

                                                
                                                </div>

                                                <div class="col-md-3 position-relative">
                                                    <label for="invoice_date" class="form-label"> Date</label>
                                                    <input type="text" name="invoice_date" id="invoice_date" value="<?php if(!empty($single_data)){ echo $single_data->invoice_date; } ?>" class="form-control date_flatpicker" >
                                                    
                                                </div>

                                                
                                                <div class="col-md-3">
                                                    <label for="customer_name" class="form-label"> Customer Name</label>
                                                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php if(!empty($single_data)){ echo $single_data->customer_name; } ?>" required>
                                                
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="contact_no" class="form-label"> Contact No.</label>
                                                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php if(!empty($single_data)){ echo $single_data->contact_no; } ?>" required>
                                                
                                                </div>



                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="country" class="form-label">Country:</label>
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
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="City" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city_id" name="City" value="<?php if(!empty($single_data)){ echo $single_data->city; }?>"required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city name.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="delivery_address" class="form-label"> Delivery Address</label>
                                                    <textarea class="form-control" id="delivery_address" name="delivery_address" rows="4" cols="30" required><?php if(!empty($single_data)){ echo $single_data->delivery_address; } ?></textarea>
                                                
                                                </div>

                                       

                                                        <div class="invoice-add-table col-lg-12 col-md-12 col-12">
                                                            <h4>Product Details   <a href="javascript:void(0);" class="add_more_iteam add-btn me-2 "><i class="fas fa-plus-circle"></i></a></h4>
                                                                    <div>
                                                                        <table class="table table-center add-table-items">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Product</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Unit Price</th>
                                                                                    <th>Tax Amount</th>

                                                                                    <th>Amount</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <?php if(empty($iteam)){
                                                                            // echo "<pre>";print_r($iteam);exit();    
                                                                        
                                                                            ?>    
                                                                            <tbody >
                                                                                <tr class="add-row">
                                                                                    <td>
                                                                                        <select class="form-control" name="iteam[]" id="iteam_0" required>
                                                                                            <option value="">Select Product</option>
                                                                                            <?php if (!empty($product_data)) { ?>
                                                                                            <?php foreach ($product_data as $data) { ?>
                                                                                            <option value="<?= $data->id; ?>">
                                                                                                <?= $data->product_name; ?>
                                                                                            </option>
                                                                                            <?php } ?>
                                                                                            <?php } ?>
                                                                                        </select>

                                                                                    </td>

                                                                                
                                                                                    <td>
                                                                                        <input type="text" name="quantity[]" class="dynamic-quantity form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="price[]" class="dynamic-price form-control">

                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="gst_amount[]" class="dynamic-gst_amount form-control">

                                                                                    </td>                                                                                

                                                                                    <td>
                                                                                        <input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly >
                                                                                    </td>
                                                                                    <td class="add-remove text-end">
                                                                                        <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam "><i class="fas fa-plus-circle"></i></a>  -->
                                                                                    <a href="javascript:void(0);" class="remove-btn"><i class="fas fa-trash"></i></a>
                                                                                    </td>
                                                                                </tr>  
                                                                            
                                                                            </tbody>
                                                                            <?php }else{
                                                                                foreach($iteam as $data){
                                                                                ?>

                                                                                <tr class="now add-row">

                                                                                <td>
                                                                                        <select class="form-control" name="iteam[]" id="iteam_0" required>
                                                                                            <option value="">Select Product</option>
                                                                                            <?php if (!empty($product_data)) { ?>
                                                                                            <?php foreach ($product_data as $sdata) { ?>
                                                                                            <option value="<?= $sdata->id; ?>"
                                                                                                <?= ($data->product_id === $sdata->id) ? "selected" : "" ?>>
                                                                                                <?= $sdata->product_name; ?>
                                                                                            </option>
                                                                                            <?php } ?>
                                                                                            <?php } ?>
                                                                                        </select>

                                                                                    </td>

                                                                                
                                                                                    <td>
                                                                                        <input type="text" name="quantity[]" value="<?=$data->quantity;?>" class="dynamic-quantity form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="price[]" value="<?=$data->price;?>" class="dynamic-price form-control">

                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="gst_amount[]" value="<?=$data->gst_amount;?>" class="dynamic-gst_amount form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="total_amount[]"  value="<?=$data->total_amount;?>"  class="dynamic-total_amount form-control" readonly >
                                                                                    </td>
                                                                                    <td class="add-remove text-end">
                                                                                        <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a>  -->
                                                                                    <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php }} ?>
                                                                            <tbody class="dynamic_iteam"></tbody>
                                                                            <tbody>
                                                                            </tbody>
                                                                        </table>   
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 plopd">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                    <p><b>Total Amount In Words : </b><p>    
                                                                                    </div>
                                                                                    <div class="col-lg-8">
                                                                                        <input class="form-control" type="text" name="totalamount_in_words" id="totalamount_in_words" readonly value="<?php if(!empty($single_data)){ echo $single_data->totalamount_in_words;} ?>">  
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 plfortotatal">
                                                                                <table>
                                                                                <tr>
                                                                                        <td><b>Subtotal : </b></td>
                                                                                        <td class="pfortd"> 
                                                                                            <input type="text" name="totalamounttotal" id="totalamounttotal" class="form-control rallstyles" readonly   value="<?php if(!empty($single_data)){ echo $single_data->totalamounttotal;} ?>">
                                                                                        </td>   
                                                                                    </tr>
                                                                                    
                                                                                    <tr class="total_tax_amt">
                                                                                        <td><b>Total Tax Amount : </b></td>
                                                                                        <td class="pfortd">
                                                                                            <input type="text" name="total_tax_amt" id="total_tax_amt" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->total_tax_amt;} ?>">
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr class="courier_charges">
                                                                                        <td><b>Courier Charges : </b></td>
                                                                                        <td class="pfortd">
                                                                                            <input type="text" name="courier_charges" id="courier_charges" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->courier_charges;} ?>">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="discount">
                                                                                    <td><b> Discount : </b></td>
                                                                                    <td class="pfortd">
                                                                                        <input type="text" name="discount" id="discount" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->discount;} ?>">
                                                                                    </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Total : </b></td>
                                                                                        <td class="pfortd"> 
                                                                                            <input type="text" name="final_total" id="final_total" class="form-control rallstyles" readonly value="<?php if(!empty($single_data)){ echo $single_data->final_total;} ?>">
                                                                                        </td>   
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>

                                            

                                                <div class="col-12">
                                                    <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                                </div>
                                    </form>
                                </div>
                            </div>    
                        </div>
                            <!-- End of Invoice List -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<?php include __DIR__.'/../Admin/footer.php'; ?>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var url = window.location.href;
        var toggleButton = document.getElementById('toggle-view');
        var backButton = document.getElementById('back-button');
        var form = document.getElementById('access-form');
        var list = document.getElementById('Invoice-list');
        var title = document.getElementById('form-title');

        // Check if the URL contains "edit_invoice"
        if (url.includes('edit_invoice')) {
            backButton.style.display = 'inline-block'; // Show the "Back" button
            toggleButton.style.display = 'none'; // Hide the "Invoice List" button

            form.style.display = 'block'; // Show the form when editing
            list.style.display = 'none'; // Hide the invoice list
            title.textContent = 'Edit Invoice';
        } else {
            // Toggle between form and Invoice List
            toggleButton.addEventListener('click', function() {
                if (form.style.display === 'none') {
                    form.style.display = 'block';
                    list.style.display = 'none';
                    title.textContent = 'Add Invoice';
                    toggleButton.textContent = 'View Invoice List';
                    document.getElementById('submit-button').textContent = 'Submit';
                    form.reset();
                } else {
                    form.style.display = 'none';
                    list.style.display = 'block';
                    title.textContent = 'Invoice List';
                    toggleButton.textContent = 'Add New Invoice';
                }
            });
        }
    });
</script>


<script>
$(document).on("change", ".add-row input[type='text'], input[name='gst_amount[]'], #total_tax_amt, #discount, #courier_charges", function () {
    var taxId = $("#tax_id").val();
    var row = $(this).closest(".add-row");
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    var discount = parseFloat($("#discount").val()) || 0; // Use the global discount value

    var courier_charges = parseFloat($("#courier_charges").val()) || 0; // Use the global discount value

    var amount = quantity * price;

    // Apply row-specific discount
    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    // Calculate total amount across all rows
    var total_amount = 0;
    var totaltaxamt = 0;

    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;

        var total_tax_amt = parseFloat($(this).find("input[name='gst_amount[]']").val()) || 0;
        totaltaxamt += total_tax_amt;
    });

    // Calculate the final total including tax and discount
    var final_total = total_amount + courier_charges + totaltaxamt - discount;

    // Update fields for total amount and final total
    $("#totalamounttotal").val(total_amount.toFixed(2));
    $("#final_total").val(final_total.toFixed(2));
    $("#total_tax_amt").val(totaltaxamt.toFixed(2));


    // Convert the final total to words (assuming numberToWords library is included)
    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    // Update preview fields (if any)
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
});

// Automatically trigger change event on page load to initialize calculations
$(document).ready(function() {
    $('.add-row input[type="text"], input[name="gst_amount[]"], #total_tax_amt, #discount, #courier_charges').change();
});





$(document).ready(function() {
    // Calculate totals on page load
    calculateAndStoreTotals();
    

    // Listen for changes in relevant inputs
    $(document).on("change", ".add-row input[type='text'], input[name='gst_amount[]'], #total_tax_amt, #discount, #courier_charges", function () {
        calculateAndStoreTotals();

        // handleTaxChange();
        
    });
    function calculateAndStoreTotals() {
        var taxId = $("#tax_id").val();
    var row = $(this).closest(".add-row");
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    var discount = parseFloat($("#discount").val()) || 0; // Use the global discount value

    var courier_charges = parseFloat($("#courier_charges").val()) || 0; // Use the global discount value

    var amount = quantity * price;

    // Apply discount
    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    // Calculate total amount
    var total_amount = 0;
    var totaltaxamt = 0;

    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;

        var total_tax_amt = parseFloat($(this).find("input[name='gst_amount[]']").val()) || 0;
        totaltaxamt += total_tax_amt;
    });

    // Calculate final total
    var final_total = total_amount + courier_charges + totaltaxamt - discount;

    // Update fields
    $("#totalamounttotal").val(total_amount.toFixed(2));
    $("#final_total").val(final_total.toFixed(2));
    $("#total_tax_amt").val(totaltaxamt.toFixed(2));

    // Convert total amount to words (assuming numberToWords library is included)
    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    // Update preview fields (if any)
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
}



$(document).ready(function () {
    var max_fields = 5000; // Maximum number of fields allowed
    var x = 1; // Initial count

    // Hide tax columns initially
    $('.add_more_iteam').click(function (e) {
        e.preventDefault();
        $('.tax_column, .tax_column1, .tax_column2').hide();

        // Check if "Bill Without Tax" is checked
        var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");

        if (x < max_fields) {
            x++;
            // Append new row to the table
            $('.dynamic_iteam').append('<tr class="now add-row"><td><select class="form-control" name="iteam[]" id="iteam_' + x + '" required><option value="">Select Product</option><?php if (!empty($product_data)) { ?><?php foreach ($product_data as $data) { ?><option value="<?= $data->id; ?>"><?= $data->product_name; ?></option><?php } ?><?php } ?></select></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td> <td><input type="text" name="gst_amount[]" class="dynamic-gst_amount form-control"></td>         <td><input type="text" name="total_amount[]" class="dynamic-total_amount form-control" readonly></td><td class="add-remove text-end"><a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a></td></tr>');

            // Event handler for removing a row
            $('.btn_remove').on('click', function () {
                $(this).closest('.now').remove();
                calculateAndStoreTotals();
            });

            calculateAndStoreTotals();
        }
    });

    // Function to calculate and store totals
    function calculateAndStoreTotals() {
        var taxId = $("#tax_id").val();
    var row = $(this).closest(".add-row");
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    var discount = parseFloat($("#discount").val()) || 0; // Use the global discount value

    var courier_charges = parseFloat($("#courier_charges").val()) || 0; // Use the global discount value

    var amount = quantity * price;

    // Apply row-specific discount
    amount = amount - (amount * discount / 100);
    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    // Calculate total amount across all rows
    var total_amount = 0;
    var totaltaxamt = 0;

    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;

        var total_tax_amt = parseFloat($(this).find("input[name='gst_amount[]']").val()) || 0;
        totaltaxamt += total_tax_amt;
    });

    // Calculate the final total including tax and discount
    var final_total = total_amount + courier_charges + totaltaxamt - discount;

    // Update fields for total amount and final total
    $("#totalamounttotal").val(total_amount.toFixed(2));
    $("#final_total").val(final_total.toFixed(2));
    $("#total_tax_amt").val(totaltaxamt.toFixed(2));

    // Convert the final total to words (assuming numberToWords library is included)
    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    // Update preview fields (if any)
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
    }

    // Initial calculation to set default values
    calculateAndStoreTotals();
});

$('.btn_remove').on('click', function() {
    $(this).closest('.now').remove();

    var row = $(this).closest(".add-row");
    var taxId = $("#tax_id").val();
    var row = $(this).closest(".add-row");
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    var discount = parseFloat($("#discount").val()) || 0; // Use the global discount value

    var courier_charges = parseFloat($("#courier_charges").val()) || 0; // Use the global discount value

    var amount = quantity * price;

    // Apply row-specific discount
    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    // Calculate total amount across all rows
    var total_amount = 0;
    var totaltaxamt = 0;

    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;

        var total_tax_amt = parseFloat($(this).find("input[name='gst_amount[]']").val()) || 0;
        totaltaxamt += total_tax_amt;
    });

    // Calculate the final total including tax and discount
    var final_total = total_amount + courier_charges + totaltaxamt - discount;

    // Update fields for total amount and final total
    $("#totalamounttotal").val(total_amount.toFixed(2));
    $("#final_total").val(final_total.toFixed(2));
    $("#total_tax_amt").val(totaltaxamt.toFixed(2));

    // Convert the final total to words (assuming numberToWords library is included)
    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    // Update preview fields (if any)
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));

    
    calculateAndStoreTotals();
});

	});

</script>

<script>
    
    $(document).ready(function () {
        // Custom validator methods
        $.validator.addMethod("validMobileNumber", function (value, element) {
            return this.optional(element) || /^\d{10}$/i.test(value);
        }, "Please enter a valid 10-digit mobile number.");

        $.validator.addMethod('lettersOnly', function (value, element) {
            return /^[a-zA-Z\s.,()]*$/.test(value); // Allows letters, spaces, ., (), and ,
        }, 'Please enter valid characters (letters, spaces, ., (), ,) only');

        // Form validation rules
        $('#invoice_form').validate({
            rules: {
                branch_id: {
                    required: true
                },
                customer_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                contact_no: {
                    required: true,
                    validMobileNumber: true // Use the custom method here
                },
                delivery_address: {
                    required: true
                },
               
            },
            messages: {
                branch_id: {
                    required: 'Please select branch.'
                },
                customer_name: {
                    required: 'Please enter customer name.',
                    lettersOnly: 'Please enter valid characters (letters, spaces, ., (), ,) only' // Custom error message
                },
                contact_no: {
                    required: 'Please enter Contact No.'
                },
                delivery_address: {
                    required: 'Please enter address.'
                },
             
            }
        });
    });
    </script>

<script>
    
    $(document).ready(function() {
    // Listen to the product select change
    $(document).on('change', 'select[name="iteam[]"]', function() {
        var productId = $(this).val();
        var $row = $(this).closest('tr'); // Get the current row to update

        if (productId) {
            // Make an AJAX call to get product details
            $.ajax({
                url: 'getProductDetails', // The URL of your server-side script
                type: 'POST',
                data: { product_id: productId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Set the price and GST in the input fields
                        $row.find('.dynamic-price').val(response.price);
                        $row.find('.dynamic-gst_amount').val(response.gst_amount);

                        // Trigger the calculation of total amount for this row
                        calculateRowTotal($row);
                    } else {
                        // Handle if product data is not found
                        alert('Product data not found!');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        } else {
            // Clear the price and GST inputs if no product is selected
            $row.find('.dynamic-price').val('');
            $row.find('.dynamic-gst_amount').val('');
        }
    });

    // Function to calculate total amount for each row
   
});
</script>
<script>
    // Function to format the date as yyyy-mm-dd
function formatDate(date) {
    let day = ("0" + date.getDate()).slice(-2);
    let month = ("0" + (date.getMonth() + 1)).slice(-2);
    let year = date.getFullYear();
    return `${year}-${month}-${day}`;
}

// Set the current date as the value of the input field only if it's not already set
document.addEventListener('DOMContentLoaded', function () {
    const invoiceDateInput = document.getElementById('invoice_date');
    if (!invoiceDateInput.value) { // Check if the input is empty
        invoiceDateInput.value = formatDate(new Date());
    }
});
</script>

<script>
    function updatestatus(selectElement, id) {
        var payment_status = selectElement.value;

        $.ajax({
            url: 'updatestatus', // Your Controller method URL
            type: 'POST',
            data: {
                id: id,
                payment_status: payment_status
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert('Payment status updated successfully.');
                    location.reload(); // Refresh the page after successful update
                } else {
                    alert('Failed to update payment status.');
                }
            },
            error: function() {
                alert('An error occurred while updating the payment status.');
            }
        });
    }
</script>
