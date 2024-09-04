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


                            <input type="hidden" id="invoice_id " name="id" value="">



                            <div class="col-md-3 position-relative">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select class="form-select" id="branch_id" name="branch_id" required>
                                <option selected disabled value="">Select Branch </option>
                                <option value="Pune">Pune</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Nashik">Nashik</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Other">Other</option>
                            </select>
                            
                            </div>

                            <div class="col-md-3 position-relative">
                                <label for="invoice_date" class="form-label"> Date</label>
                                <input type="text" name="invoice_date" id="invoice_date" value="" class="form-control date_flatpicker" >
                                
                            </div>

                            
                            <div class="col-md-3">
                                <label for="customer_name" class="form-label"> Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            
                            </div>

                            <div class="col-md-3">
                                <label for="contact_no" class="form-label"> Contact No.</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                            
                            </div>
                            <div class="col-md-6">
                                <label for="delivery_address" class="form-label"> Delivery Address</label>
                                <textarea class="form-control" id="delivery_address" name="delivery_address" rows="4" cols="30" required></textarea>
                            
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 col-12 tax_id">
                                        <div class="form-group">
                                            <label>Tax</label>
                                            <select name="tax_id" id="tax_id" class="form-control">
                                                <option> Select Tax</option>
                                                <?php foreach ($tax_data as $data): ?>
                                                    <option value="<?= $data->id; ?>" <?php if (isset($single_data)) { echo ($single_data->tax_id == $data->id) ? 'selected="selected"' : ''; } ?>>
                                                        <?= $data->tax; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="invoice-add-table col-lg-12 col-md-12 col-12">
                                        <h4>Item Details   <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a></h4>
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
                                                                            <?= $sdata->product_data; ?>
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
                                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_invoice" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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
    $('.add-row input[type="text"], #cgst, #sgst, #tax,').change();
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
        var totaltaxvalue = 0;
        var totalcgstvalue = 0;
        var totalsgstvalue = 0;

        var totalTax = 0;
        var totalSGST = 0;
        var totalCGST = 0;

        var totalTax = 0;
        var totalamounttotal = 0;


        $(".add-row").each(function () {
            var row = $(this);
            var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
            var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
            var amount = parseFloat(row.find("input[name='amount_p[]']").val()) || 0;
            var discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
            var total_amount = parseFloat(row.find("input[name='total_amount[]']").val()) || 0;
            var total_tax = parseFloat(row.find("input[name='tax[]']").val()) || 0;
            var total_tax_value = parseFloat(row.find("input[name='tax_value[]']").val()) || 0;
            var total_cgst_value = parseFloat(row.find("input[name='cgst_value[]']").val()) || 0;

            var total_sgst_value = parseFloat(row.find("input[name='sgst_value[]']").val()) || 0;


            var total_sgst = parseFloat(row.find("input[name='sgst[]']").val()) || 0;
            var total_cgst = parseFloat(row.find("input[name='cgst[]']").val()) || 0;
          


            totalQuantity += quantity;
            totalPrice += price;
            totalAmount += amount;
            totalDiscount += discount;
            totalamounttotal += total_amount;

            totaltaxvalue += total_tax_value;
            totalcgstvalue += total_cgst_value;
            totalsgstvalue += total_sgst_value;


            totalTax += total_tax;
            totalSGST += total_sgst;
            totalCGST += total_cgst;
        });

        $("input[name='totalQuantity']").val(totalQuantity.toFixed(2));
        $("input[name='total_price']").val(totalPrice.toFixed(2));
        $("input[name='totalamount']").val(totalAmount.toFixed(2));
        $("input[name='total_discount']").val(totalDiscount.toFixed(2));
        $("input[name='totalamounttotal']").val((totalamounttotal).toFixed(2));
        $("input[name='final_total']").val((totalamounttotal).toFixed(2));

        $("input[name='total_tax_value']").val(totaltaxvalue.toFixed(2));

        $("input[name='total_tax']").val(totalTax.toFixed(2));
        $("input[name='total_sgst']").val(totalSGST.toFixed(2));
        $("input[name='total_cgst']").val((totalCGST).toFixed(2));
        $(".sub_total").text((totalAmount).toFixed(2));
        $(".total_d").text((totalDiscount).toFixed(2));

       
      

        if (totalcgstvalue !== 0 || totalsgstvalue !== 0) {
                $(".cgst2").text((totalcgstvalue).toFixed(2));
                $(".sgst2").text((totalsgstvalue).toFixed(2));
            
                $("#cgst2").val((totalcgstvalue).toFixed(2));
                $("#sgst2").val((totalsgstvalue).toFixed(2));
                $('.tax2').hide();
            }else {
            

                $(".tax2").text((totaltaxvalue).toFixed(2));
                        $("#tax2").val((totaltaxvalue).toFixed(2));
                        $('.tax2').show();
            }



   

     


        $("#preview_total_discount").text((totalDiscount).toFixed(2));


        


        // var totalAmountTotalWords = numberToWords.toWords(totalamounttotal);
        // $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

  
    }



    $('.add_more_iteam').click(function(e) {
        $('.tax_column, .tax_column1, .tax_column2').hide();
    e.preventDefault();
    var max_fields = 5000;
    var x = 1;

    		var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");
    if (x < max_fields) {
        x++;
        $('.dynamic_iteam').append('<tr class="now add-row "><td><select class="form-control" name="iteam[]" id="iteam_'+ x +'" required><option value="">Select Product</option><?php if (!empty($product_data)) { ?><?php foreach ($product_data as $data) { ?><option value="<?= $data->id; ?>"><?= $data->product_name; ?></option><?php } ?><?php } ?></select></td><td><input type="text" name="description[]" id="description" class="dynamic-items form-control"></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td><td><input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly ></td><td class="add-remove text-end"> <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a></td></tr>');
        
     


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
    }

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
    $(document).ready(function() {
    // Define the change event handler for #client_id
    $("#client_id").change(function() {
        $.ajax({
            type: "post",
            url: "<?=base_url();?>get_po_details",
            data: {
                'client_id': $("#client_id").val()
            },
            success: function(data) {
                console.log(data);
                $('#po_no').empty();
                $('#po_no').append('<option value="">Choose ...</option>');
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#po_no').append('<option value="' + d.id + '">' + d.doc_no + '</option>');
                });
                $('#po_no').trigger("chosen:updated");

                // If there is an existing selected PO number, set it
                <?php if(!empty($single_data)) { ?>
                    $('#po_no').val("<?= $single_data->po_no; ?>");
                <?php } ?>
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });

    // Check if #client_id has a value and trigger the change event if it does
    if ($("#client_id").val()) {
        $("#client_id").trigger('change');
    } else {
        // If client_id is not set, set the PO number directly from the server-rendered options
        <?php if(!empty($single_data)) { ?>
            $('#po_no').val("<?= $single_data->po_no; ?>");
        <?php } ?>
    }
});


</script>

<script>
$(document).ready(function(){
    $('#tax_id').change(function(){
        var selectedTaxId = $(this).val();
        
        if (selectedTaxId == '1') {
            $('.cgst').show();
            $('.sgst').show();
            $('.igst').hide();
            $('#cgst').val('0');
            $('#sgst').val('0');
        } else if (selectedTaxId == '2') {
            $('.cgst').hide();
            $('.sgst').hide();
            $('.igst').show();
            $('#igst').val('0');
        } else {
            $('.cgst').hide();
            $('.sgst').hide();
            $('.igst').hide();
            $('#cgst').val('');
            $('#sgst').val('');
            $('#igst').val('');
        }
    });
    
    // Trigger change event on page load to set the initial state
    $('#tax_id').trigger('change');
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

// Set the current date as the value of the input field
document.getElementById('invoice_date').value = formatDate(new Date());
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