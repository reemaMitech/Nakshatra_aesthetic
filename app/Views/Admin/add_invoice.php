<?php include __DIR__.'/../Admin/header.php'; ?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Add Invoice</h4>
                    <button id="toggle-view" class="btn btn-warning">Invoice List</button>
                </div>

                <div class="card-body">
                    <div id="access-form">
                        <!-- Form for Adding/Editing Invoice Access Level -->
                        <form class="row g-3" id="invoice_form" action="<?= base_url('set_invoice'); ?>" method="post" enctype="multipart/form-data" novalidate>


                            <input type="hidden" id="invoice_id " name="id" value="<?php if(!empty($single_data)){ echo $single_data->id; } ?>">



                            <div class="col-md-3 position-relative">
                            <label for="branch_id" class="form-label">Branch</label>
                            

                            <select class="form-select" id="branch_id" name="branch_id" required>
                                <option disabled value="">Select Branch</option>
                                <option value="Pune" <?php if((!empty($single_data)) && $single_data->branch_id == 'Pune'){ echo'selected';} ?>>Pune</option>
                                <option value="Mumbai" <?php if((!empty($single_data)) && $single_data->branch_id == 'Mumbai'){ echo'selected';} ?>>Mumbai</option>
                                <option value="Nashik" <?php if((!empty($single_data)) && $single_data->branch_id == 'Nashik'){ echo'selected';} ?>>Nashik</option>
                                <option value="Delhi" <?php if((!empty($single_data)) && $single_data->branch_id == 'Delhi'){ echo'selected';} ?>>Delhi</option>
                                <option value="Other" <?php if((!empty($single_data)) && $single_data->branch_id == 'Other'){ echo'selected';} ?>>Other</option>
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
                            <div class="col-md-6">
                                <label for="delivery_address" class="form-label"> Delivery Address</label>
                                <textarea class="form-control" id="delivery_address" name="delivery_address" rows="4" cols="30" required><?php if(!empty($single_data)){ echo $single_data->delivery_address; } ?></textarea>
                            
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 col-12 tax_id">
                                        <div class="form-group">
                                            <label>Tax</label>
                                            <select name="tax_id" id="tax_id" class="form-control">
                                                <option> Select Tax</option>
                                                <?php foreach ($tax_data as $data): ?>
                                                    <option value="<?= $data->id; ?>" <?php if (!empty($single_data)) { echo ($single_data->tax_id == $data->id) ? 'selected="selected"' : ''; } ?>>
                                                        <?= $data->tax; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="invoice-add-table col-lg-12 col-md-12 col-12">
                                        <h4>Item Details   <a href="javascript:void(0);" class="add_more_iteam add-btn me-2 "><i class="fas fa-plus-circle"></i></a></h4>
                                                <div>
                                                    <table class="table table-center add-table-items">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Description</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Price</th>
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
                                                                    <input type="text" name="description[]" id="description_0" class="dynamic-items form-control">
                                                                </td>
                                                            
                                                                <td>
                                                                    <input type="text" name="quantity[]" class="dynamic-quantity form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="price[]" class="dynamic-price form-control">
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
                                                                            <?= ($data->iteam === $sdata->id) ? "selected" : "" ?>>
                                                                            <?= $sdata->product_name; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                    </select>

                                                                </td>

                                                                <td>
                                                                    <input type="text" name="description[]" id="description_0" value="<?=$data->description;?>" class="dynamic-items form-control">
                                                                </td>
                                                            
                                                                <td>
                                                                    <input type="text" name="quantity[]" value="<?=$data->quantity;?>" class="dynamic-quantity form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="price[]" value="<?=$data->price;?>" class="dynamic-price form-control">
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
                                                                <tr class="cgst">
                                                                    <td><b>CGST (%) :</b></td>
                                                                    <td class="pfortd">
                                                                        <input type="text" name="cgst" id="cgst" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->cgst;} ?>">
                                                                    </td>
                                                                </tr>
                                                                <tr class="sgst">
                                                                    <td><b>SGST (%) :</b></td>
                                                                    <td class="pfortd">
                                                                        <input type="text" name="sgst" id="sgst" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->sgst;} ?>">
                                                                    </td>
                                                                </tr>
                                                                <tr class="igst">
                                                                    <td><b>IGST (%) : </b></td>
                                                                    <td class="pfortd">
                                                                        <input type="text" name="igst" id="igst" class="form-control rallstyle" value="<?php if(!empty($single_data)){ echo $single_data->igst;} ?>">
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
                                <button id="submit-button" class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End of Form -->

                    <!-- Invoice List -->
                    <div id="Invoice-list" style="display:none;">

                        
                        
                    <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Action</th>
                            <th>Payment Status</th>
                            <th>Invoice Date</th>
                            <th>Customer Name</th>
                            
                            <th>Total Amount</th>
                            <th>CGST</th>
                            <th>SGST</th>
                            <th>IGST</th>
                            <th>Final Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (!empty($invoice_data)) {
                            $i = 1;
                            foreach ($invoice_data as $data) {
                                if ($data->tax_id == 1 || $data->tax_id == 2) { // Assuming there's a flag for GST applicability
                                    $adminModel = new \App\Models\AdminModel();
                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <a href="edit_invoice/<?=$data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                <a href="<?=base_url(); ?>delete_compan/<?php echo $data->id; ?>/tbl_invoice" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                <a href="invoice/<?=$data->id; ?>" target="_blank"><i class="far fa-eye me-2"> </i></a>
                                            </td>
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
                                        
                                            <td><?php echo $data->totalamounttotal; ?></td>
                                            <td><?php if($data->tax_id == 1 ){ echo $data->cgst; }else{ echo("0");}?></td>
                                            <td><?php if($data->tax_id == 1 ){ echo $data->sgst; }else{ echo("0");}?></td>
                                            <td><?php if($data->tax_id == 2 ){ echo $data->igst; }else{ echo("0");}?></td>
                                            <td><?php echo $data->final_total; ?></td>
                                        </tr>
                        <?php $i++;
                                        }
                                    }
                                } ?>
                        </tbody>
    
                  </table>
               </div>
                    </div>
                    <!-- End of Invoice List -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>

 <script>
        // Toggle between form and Invoice List
        document.getElementById('toggle-view').addEventListener('click', function() {
            var form = document.getElementById('access-form');
            var list = document.getElementById('Invoice-list');
            var title = document.getElementById('form-title');
            var button = document.getElementById('toggle-view');

            if (form.style.display === 'none') {
                form.style.display = 'block';
                list.style.display = 'none';
                title.textContent = 'Add Invoice';
                button.textContent = 'View Invoice List';
                document.getElementById('submit-button').textContent = 'Submit';
                form.reset();
            } else {
                form.style.display = 'none';
                list.style.display = 'block';
                title.textContent = 'Invoice List';
                button.textContent = 'Add New Invoice';
            }
        });
    </script>

<script>
$(document).on("change", ".add-row input[type='text'], #cgst, #sgst, #igst, #tax_id", function () {
    var taxId = $("#tax_id").val();
    var row = $(this).closest(".add-row");
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    var discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    var amount = quantity * price;

    // Apply discount
    amount = amount - (amount * discount / 100);
    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    // Calculate total amount
    var total_amount = 0;
    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;
    });

    var cgst_value = 0, sgst_value = 0, igst_value = 0;
    var cgst_data = 0, sgst_data = 0, igst_data = 0;

    if (taxId == 1) {
        cgst_data = parseFloat($("#cgst").val()) || 0;
        sgst_data = parseFloat($("#sgst").val()) || 0;
        cgst_value = total_amount * (cgst_data / 100);
        sgst_value = total_amount * (sgst_data / 100);
    } else if (taxId == 2) {
        igst_data = parseFloat($("#igst").val()) || 0;
        igst_value = total_amount * (igst_data / 100);
    }

    // Calculate final total
    var final_total = total_amount + cgst_value + sgst_value + igst_value;

    // Update fields
    $("#totalamounttotal").val(total_amount.toFixed(2));
    // console.log(final_total);
    $("#final_total").val(final_total.toFixed(2));

    // Convert total amount to words (assuming numberToWords library is included)
    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    // Update preview fields (if any)
    $(".preview_sgst2").text(sgst_value.toFixed(2));
    $(".preview_cgst2").text(cgst_value.toFixed(2));
    $(".preview_igst2").text(igst_value.toFixed(2));
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
});


$(document).ready(function() {
    $('.add-row input[type="text"], #cgst, #sgst, #tax').change();
});



$(document).ready(function() {
    // Calculate totals on page load
    calculateAndStoreTotals();
    

    // Listen for changes in relevant inputs
    $(document).on("change", "input[name='tax[]'], input[name='cgst[]'], input[name='sgst[]'], input[name='iteam[]'], input[name='quantity[]'], input[name='price[]'], input[name='amount_p[]'], input[name='tax[]'], input[name='discount[]']", function () {
        calculateAndStoreTotals();

        // handleTaxChange();
        
    });
    function calculateAndStoreTotals() {
    var totalQuantity = 0;
    var totalPrice = 0;
    var totalAmount = 0;
    var totalDiscount = 0;
    var totalTaxValue = 0;
    var totalCGSTValue = 0;
    var totalSGSTValue = 0;
    var totalIGST = 0;
    var totalAmountTotal = 0;

    var cgst_data = parseFloat($("input[name='cgst']").val()) || 0;
    var sgst_data = parseFloat($("input[name='sgst']").val()) || 0;
    var igst_data = parseFloat($("input[name='igst']").val()) || 0;

    $(".add-row").each(function () {
        var row = $(this);

        // Parse all input values and default to 0 if NaN
        var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
        var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
        var amount = parseFloat(row.find("input[name='amount_p[]']").val()) || 0;
        var discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
        var total_amount = parseFloat(row.find("input[name='total_amount[]']").val()) || 0;
        var total_tax = parseFloat(row.find("input[name='tax[]']").val()) || 0;
        var total_tax_value = parseFloat(row.find("input[name='tax_value[]']").val()) || 0;
        var total_cgst_value = parseFloat(row.find("input[name='cgst_value[]']").val()) || 0;
        var total_sgst_value = parseFloat(row.find("input[name='sgst_value[]']").val()) || 0;

        // Accumulate totals
        totalQuantity += quantity;
        totalPrice += price;
        totalAmount += amount;
        totalDiscount += discount;
        totalAmountTotal += total_amount;
        totalTaxValue += total_tax_value;
        totalCGSTValue += total_cgst_value;
        totalSGSTValue += total_sgst_value;
    });

    // Calculate CGST, SGST, and IGST values based on the total amount
    var cgst_value = totalAmountTotal * (cgst_data / 100);
    var sgst_value = totalAmountTotal * (sgst_data / 100);
    var igst_value = totalAmountTotal * (igst_data / 100);

    // Calculate the final total
    var finalTotal = totalAmountTotal + cgst_value + sgst_value + igst_value;

    // Store calculated values in input fields
    $("input[name='totalQuantity']").val(totalQuantity.toFixed(2));
    $("input[name='total_price']").val(totalPrice.toFixed(2));
    $("input[name='totalamount']").val(totalAmount.toFixed(2));
    $("input[name='total_discount']").val(totalDiscount.toFixed(2));
    $("input[name='totalamounttotal']").val(totalAmountTotal.toFixed(2));
    $("input[name='final_total']").val(finalTotal.toFixed(2));
    $("input[name='total_tax_value']").val(totalTaxValue.toFixed(2));

    // Update text fields for displaying totals
    $(".sub_total").text(totalAmount.toFixed(2));
    $(".total_d").text(totalDiscount.toFixed(2));

    if (totalCGSTValue !== 0 || totalSGSTValue !== 0) {
        $(".cgst2").text(totalCGSTValue.toFixed(2));
        $(".sgst2").text(totalSGSTValue.toFixed(2));
        $("#cgst2").val(totalCGSTValue.toFixed(2));
        $("#sgst2").val(totalSGSTValue.toFixed(2));
        $('.tax2').hide();
    } else {
        $(".tax2").text(totalTaxValue.toFixed(2));
        $("#tax2").val(totalTaxValue.toFixed(2));
        $('.tax2').show();
    }

    $("#preview_total_discount").text(totalDiscount.toFixed(2));
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
            $('.dynamic_iteam').append('<tr class="now add-row"><td><select class="form-control" name="iteam[]" id="iteam_' + x + '" required><option value="">Select Product</option><?php if (!empty($product_data)) { ?><?php foreach ($product_data as $data) { ?><option value="<?= $data->id; ?>"><?= $data->product_name; ?></option><?php } ?><?php } ?></select></td><td><input type="text" name="description[]" id="description" class="dynamic-items form-control"></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td><td><input type="text" name="total_amount[]" class="dynamic-total_amount form-control" readonly></td><td class="add-remove text-end"><a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a></td></tr>');

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
        var total_amount = 0;
        var totalDiscount = 0;
        var totalTaxValue = 0;
        var totalCGSTValue = 0;
        var totalSGSTValue = 0;

        var cgst_data = parseFloat($("#cgst").val()) || 0;
        var sgst_data = parseFloat($("#sgst").val()) || 0;
        var tax_data = parseFloat($("input[name='tax[]']").val()) || 0;

        $(".add-row").each(function () {
            var row = $(this);
            var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
            var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
            var amount = quantity * price;

            row.find("input[name='total_amount[]']").val(amount.toFixed(2));

            total_amount += amount;
        });

        var tax_value = total_amount * (tax_data / 100);
        var cgst_value = total_amount * (cgst_data / 100);
        var sgst_value = total_amount * (sgst_data / 100);

        var final_total = total_amount + cgst_value + sgst_value;

        // Update the values in the UI
        $("#final_total").val(final_total.toFixed(2));
        $("#totalamounttotal").val(total_amount.toFixed(2));
        $(".preview_sgst2").text(sgst_value.toFixed(2));
        $(".preview_cgst2").text(cgst_value.toFixed(2));
        $(".preview_igst2").text(0); // Assuming IGST is not part of this calculation
        $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));

        var totalAmountTotalWords = numberToWords.toWords(final_total);
        $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

        $(".totalAmountWithtax").text(total_amount.toFixed(2));
    }

    // Initial calculation to set default values
    calculateAndStoreTotals();
});

$('.btn_remove').on('click', function() {
    $(this).closest('.now').remove();

    var row = $(this).closest(".add-row");
    var discount = 0;
    var tax_data = 0;
    var cgst_data = parseFloat($("#cgst").val()) || 0;
    var sgst_data = parseFloat($("#sgst").val()) || 0;
    var totalAmountWithtax = 0;
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    tax_data = parseFloat(row.find("input[name='tax[]']").val()) || 0;

    var amount = quantity * price;



    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    var total_amount = 0;
    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;
    });

    $(".totalAmountWithtax").text(total_amount.toFixed(2));

    var tax_value1 = total_amount * (tax_data / 100);
    var cgst_value1 = total_amount * (cgst_data / 100);
    var sgst_value1 = total_amount * (sgst_data / 100);

    $("#final_total").val(total_amount.toFixed(2));

    // Calculate final total by adding CGST, SGST, and total amount
    var final_total = total_amount + cgst_value1 + sgst_value1;

    $("#totalamounttotal").val(total_amount.toFixed(2));

    $("#final_total").val(final_total.toFixed(2));


    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    $(".preview_sgst2").text(sgst_value.toFixed(2));
    $(".preview_cgst2").text(cgst_value.toFixed(2));
    $(".preview_igst2").text(0); // Assuming IGST is not part of this calculation
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));

    
    calculateAndStoreTotals();
});

	});
 


</script>

<script>
$(document).ready(function(){
    function updateTaxFields() {
        var selectedTaxId = $('#tax_id').val();
        
        // Hide all fields initially
        $('.cgst').hide();
        $('.sgst').hide();
        $('.igst').hide();

        // Get the current values of the fields
        var cgstValue = $('#cgst').val();
        var sgstValue = $('#sgst').val();
        var igstValue = $('#igst').val();

        // Show and set values based on the selected tax_id
        if (selectedTaxId == '1') {
            $('.cgst').show();
            $('.sgst').show();
            // Only set to zero if no value is present
            $('#cgst').val(cgstValue || '0');
            $('#sgst').val(sgstValue || '0');
        } else if (selectedTaxId == '2') {
            $('.igst').show();
            // Only set to zero if no value is present
            $('#igst').val(igstValue || '0');
        }
    }

    // Call the function when the page loads and on change
    updateTaxFields();
    $('#tax_id').change(updateTaxFields);
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