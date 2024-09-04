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
                    <form class="row g-3 needs-validation" action="<?= base_url('product_enquiry_details'); ?>" method="post" id="product_enquiry_form" novalidate>
                        <!-- <div class="row"> -->

                            <div class="col-md-4">
                                <!-- <div class="form-group"> -->
                                    <label class="form-label" for="enquiry_date"> Enquiry Date </label>
                                    <input type="date" class="form-control" id="enquiry_date"  name="enquiry_date" value="">
                            
                                <div class="invalid-feedback">
                                    Please provide an enquiry date.
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <label for="custname" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="custname" name="custname" required>
                                <div class="invalid-feedback">
                                    Please provide a valid customer name.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="mobileNumber" name="mobile_number" required >
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
                                                    <?php if(!empty($single) && $single->country_id == $country_result->id){?>selected="selected"
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
                            <div class="col-md-4">
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
                        <!-- </div> -->

                        <!-- <div class="row"> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <select class="form-select" id="productName" name="product_name" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php foreach ($product as $item): ?>
                                        <option value="<?= $item->id; ?>" data-mrp="<?= $item->mrp_with_tax; ?>">
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
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                                <div class="invalid-feedback">
                                    Please provide a valid quantity.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="prod_desc" class="form-label"> Product Description</label>
                                <textarea type="text" class="form-control" id="prod_desc" name="prod_desc" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid product Desription.
                                </div>
                            </div>
                        <!-- </div> -->
                      
                        <!-- <div class="row"> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="pincode"> Pincode</label>
                                    <input type="number" class="form-control" id="pincode" name="pincode" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid pincode.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="detailAddress"> Detail Address</label>
                                    <textarea class="form-control" id="detailAddress" name="detailAddress" rows="3"></textarea>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid Detail address.
                                </div>
                            </div>
                       
                        <!-- </div> -->
                         
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
