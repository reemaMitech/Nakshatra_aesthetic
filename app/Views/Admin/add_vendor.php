<?php include __DIR__.'/../Admin/header.php'; ?>
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                
                 


<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Add Vendor</h4>
                    <!-- <button id="toggle-view" class="btn btn-warning">Vendor List</button> -->
                </div>

       
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Vendor List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Add Vendor</button>
                            </li>
                        
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Vendor List </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Contact Person Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>District</th>
                                                        <th>Vendor Type</th>
                                                        <th>Bank Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php if (!empty($vendor_data)) { 
                                                        
                                                        $i = 1;
                                                        foreach ($vendor_data as $vendor): 
                                                            // print_r($vendor);die;?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $vendor->vendor_name; ?></td>
                                                                <td><?php echo $vendor->vendor_mobile_no; ?></td>
                                                                <td><?php echo $vendor->contact_person; ?></td>
                                                                <td><?php echo $vendor->contperson_mobile_no; ?></td>
                                                                <td><?php echo $vendor->country; ?></td>
                                                                <td><?php echo $vendor->state; ?></td>
                                                                <td><?php echo $vendor->district; ?></td>
                                                                <td><?php echo $vendor->vendor_type; ?></td>
                                                                <td><?php echo $vendor->bank_name; ?></td>
                                                                <td>
                                                                    <!-- <a href="<?= base_url(); ?>edit_vendor/<?= $vendor->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($vendor->id); ?>/tbl_vendor" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a> -->
                                                                    <div class="flex align-items-center list-user-action">
                                                                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="<?= base_url(); ?>edit_vendor/<?= $vendor->id; ?>">
                                                                            <span class="btn-inner">
                                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            </span>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="<?= base_url(); ?>delete/<?= base64_encode($vendor->id); ?>/tbl_vendor">
                                                                            <span class="btn-inner">
                                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                                <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                        endforeach; 
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Contact Person Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>District</th>
                                                        <th>Vendor Type</th>
                                                        <th>Bank Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>  

                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <h4 class="card-title">Vendor Details : </h4>
                                    <form action="<?php echo base_url(); ?>set_vendor_data" id="form" method="post">
                                        <div class="row">
                                                            <input type="hidden" name="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>" >
                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Vendor Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name"  value="<?php if(!empty($single_data)){ echo $single_data->vendor_name;} ?>" placeholder="Enter name" required >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Vendor name.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Vendor Mobile No.:</label>
                                                                    <input type="tel" class="form-control" id="vendor_mobile_no" name="vendor_mobile_no" maxlength="10" minlength="10" pattern="\d{10}" value="<?php if(!empty($single_data)){ echo $single_data->vendor_mobile_no;} ?>" placeholder="Enter Vendor's Mobile Number "  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Vendor mobile number.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Contact Person Name</label>
                                                                    <input type="text" class="form-control" id="contact_person_name" name="contact_person_name"  value="<?php if(!empty($single_data)){ echo $single_data->contact_person;} ?>" placeholder="Enter Contact Person name"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Name.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                        
                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Mobile No.:</label>
                                                                    <input type="tel" class="form-control" id="phone_no2" name="cp_mobile_no" maxlength="10" minlength="10" pattern="\d{10}"  value="<?php if(!empty($single_data)){ echo $single_data->contperson_mobile_no;} ?>" placeholder="Enter mobile number of Contact Person"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid mobile number.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>

                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email"  value="<?php if(!empty($single_data)){ echo $single_data->email;} ?>" placeholder="Enter email"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid email address.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                    
                                                        
                                                            <div class="form-group col-md-3">
                                                                <!-- <label for="inputcountry">Country:</label>
                                                                <select  class="form-select"  id="inputCountry" name="country" >
                                                                    <option value="SelectCountry">Select Country</option>
                                                                    <option value="Bharat" <?php if (isset($single_data)) { echo ($single_data->country == 'Bharat') ? 'selected="selected"' : ''; } ?>>Bharat</option>
                                                                </select> -->

                                                                 <div class="form-group">
                                                                    <label for="country" class="form-label">Country:</label>
                                                                        <select class="form-select choosen" id="country" name="country">
                                                                            <option value="">Please select country</option>
                                                                            <?php if(!empty($country)){foreach($country as $country_result){?>
                                                                            <option value="<?=$country_result->id?>"
                                                                                <?php if(!empty($single_data) && $single_data->country == $country_result->id){?>selected="selected"
                                                                                <?php }?>><?=$country_result->name?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label for="inputState">State:</label>
                                                                <!-- <select  class="form-select"  id="inputState" name="state">
                                                                    <option value="SelectState"  >Select State</option>
                                                                    <option value="Andra Pradesh" <?php if (isset($single_data)) { echo ($single_data->state == 'Andra Pradesh') ? 'selected="selected"' : ''; } ?>>Andra Pradesh</option>
                                                                    <option value="Arunachal Pradesh" <?php if (isset($single_data)) { echo ($single_data->state == 'Arunachal Pradesh') ? 'selected="selected"' : ''; } ?>>Arunachal Pradesh</option>
                                                                    <option value="Assam" <?php if (isset($single_data)) { echo ($single_data->state == 'Assam') ? 'selected="selected"' : ''; } ?>>Assam</option>
                                                                    <option value="Bihar" <?php if (isset($single_data)) { echo ($single_data->state == 'Bihar') ? 'selected="selected"' : ''; } ?>>Bihar</option>
                                                                    <option value="Chhattisgarh" <?php if (isset($single_data)) { echo ($single_data->state == 'Chhattisgarh') ? 'selected="selected"' : ''; } ?>>Chhattisgarh</option>
                                                                    <option value="Goa" <?php if (isset($single_data)) { echo ($single_data->state == 'Goa') ? 'selected="selected"' : ''; } ?>>Goa</option>
                                                                    <option value="Gujarat" <?php if (isset($single_data)) { echo ($single_data->state == 'Gujarat') ? 'selected="selected"' : ''; } ?>>Gujarat</option>
                                                                    <option value="Haryana" <?php if (isset($single_data)) { echo ($single_data->state == 'Haryana') ? 'selected="selected"' : ''; } ?>>Haryana</option>
                                                                    <option value="Himachal Pradesh" <?php if (isset($single_data)) { echo ($single_data->state == 'Himachal Pradesh') ? 'selected="selected"' : ''; } ?>>Himachal Pradesh</option>
                                                                    <option value="Jammu and Kashmir" <?php if (isset($single_data)) { echo ($single_data->state == 'Jammu and Kashmir') ? 'selected="selected"' : ''; } ?>>Jammu and Kashmir</option>
                                                                    <option value="Jharkhand" <?php if (isset($single_data)) { echo ($single_data->state == 'Jharkhand') ? 'selected="selected"' : ''; } ?>>Jharkhand</option>
                                                                    <option value="Karnataka" <?php if (isset($single_data)) { echo ($single_data->state == 'Karnataka') ? 'selected="selected"' : ''; } ?>>Karnataka</option>
                                                                    <option value="Kerala" <?php if (isset($single_data)) { echo ($single_data->state == 'Kerala') ? 'selected="selected"' : ''; } ?>>Kerala</option>
                                                                    <option value="Madya Pradesh" <?php if (isset($single_data)) { echo ($single_data->state == 'Madya Pradesh') ? 'selected="selected"' : ''; } ?>>Madya Pradesh</option>
                                                                    <option value="Maharashtra" <?php if (isset($single_data)) { echo ($single_data->state == 'Maharashtra') ? 'selected="selected"' : ''; } ?>>Maharashtra</option>
                                                                    <option value="Manipur" <?php if (isset($single_data)) { echo ($single_data->state == 'Manipur') ? 'selected="selected"' : ''; } ?>>Manipur</option>
                                                                    <option value="Meghalaya" <?php if (isset($single_data)) { echo ($single_data->state == 'Meghalaya') ? 'selected="selected"' : ''; } ?>>Meghalaya</option>
                                                                    <option value="Mizoram" <?php if (isset($single_data)) { echo ($single_data->state == 'Mizoram') ? 'selected="selected"' : ''; } ?>>Mizoram</option>
                                                                    <option value="Nagaland" <?php if (isset($single_data)) { echo ($single_data->state == 'Nagaland') ? 'selected="selected"' : ''; } ?>>Nagaland</option>
                                                                    <option value="Orissa" <?php if (isset($single_data)) { echo ($single_data->state == 'Orissa') ? 'selected="selected"' : ''; } ?>>Orissa</option>
                                                                    <option value="Punjab" <?php if (isset($single_data)) { echo ($single_data->state == 'Punjab') ? 'selected="selected"' : ''; } ?>>Punjab</option>
                                                                    <option value="Rajasthan" <?php if (isset($single_data)) { echo ($single_data->state == 'Rajasthan') ? 'selected="selected"' : ''; } ?>>Rajasthan</option>
                                                                    <option value="Sikkim" <?php if (isset($single_data)) { echo ($single_data->state == 'Sikkim') ? 'selected="selected"' : ''; } ?>>Sikkim</option>
                                                                    <option value="Tamil Nadu" <?php if (isset($single_data)) { echo ($single_data->state == 'Tamil Nadu') ? 'selected="selected"' : ''; } ?>>Tamil Nadu</option>
                                                                    <option value="Telangana" <?php if (isset($single_data)) { echo ($single_data->state == 'Telangana') ? 'selected="selected"' : ''; } ?>>Telangana</option>
                                                                    <option value="Tripura" <?php if (isset($single_data)) { echo ($single_data->state == 'Tripura') ? 'selected="selected"' : ''; } ?>>Tripura</option>
                                                                    <option value="Uttaranchal" <?php if (isset($single_data)) { echo ($single_data->state == 'Uttaranchal') ? 'selected="selected"' : ''; } ?>>Uttaranchal</option>
                                                                    <option value="Uttar Pradesh" <?php if (isset($single_data)) { echo ($single_data->state == 'Uttar Pradesh') ? 'selected="selected"' : ''; } ?>>Uttar Pradesh</option>
                                                                    <option value="West Bengal" <?php if (isset($single_data)) { echo ($single_data->state == 'West Bengal') ? 'selected="selected"' : ''; } ?>>West Bengal</option>
                                                                    <option disabled style="background-color:#aaa; color:#fff">UNION Territories
                                                                    </option>
                                                                    <option value="Andaman and Nicobar Islands" <?php if (isset($single_data)) { echo ($single_data->state == 'Andaman and Nicobar Islands') ? 'selected="selected"' : ''; } ?>>Andaman and Nicobar Islands
                                                                    </option>
                                                                    <option value="Chandigarh" <?php if (isset($single_data)) { echo ($single_data->state == 'Chandigarh') ? 'selected="selected"' : ''; } ?>>Chandigarh</option>
                                                                    <option value="Dadar and Nagar Haveli" <?php if (isset($single_data)) { echo ($single_data->state == 'Dadar and Nagar Haveli') ? 'selected="selected"' : ''; } ?>>Dadar and Nagar Haveli</option>
                                                                    <option value="Daman and Diu" <?php if (isset($single_data)) { echo ($single_data->state == 'Daman and Diu') ? 'selected="selected"' : ''; } ?>>Daman and Diu</option>
                                                                    <option value="Delhi" <?php if (isset($single_data)) { echo ($single_data->state == 'Delhi') ? 'selected="selected"' : ''; } ?>>Delhi</option>
                                                                    <option value="Lakshadeep" <?php if (isset($single_data)) { echo ($single_data->state == 'Lakshadeep') ? 'selected="selected"' : ''; } ?>>Lakshadeep</option>
                                                                    <option value="Pondicherry" <?php if (isset($single_data)) { echo ($single_data->state == 'Pondicherry') ? 'selected="selected"' : ''; } ?>>Pondicherry</option>
                                                                </select> -->

                                                                <label for="state" class="form-label">State:</label>
                                                                <select class="form-select choosen" id="state" name="state">
                                                                    <option value="">Please select state</option>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group col-md-3">
                                                                <label for="inputDistrict">District:</label>
                                                                <select  class="form-select"  id="inputDistrict" name="district">
                                                                    <option value="">Select District</option>
                                                                </select>
                                                            </div> -->
                                                            <div class=" form-group col-md-3">
                                                                <label for="district" class="form-label">District</label>
                                                                <input type="text" class="form-control" id="inputDistrict" name="district" value="<?php if(!empty($single_data)){ echo $single_data->district; }?>"required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid district name.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                            <!-- <div class="form-group"> -->
                                                                <label>Address</label>
                                                                <textarea name="address" class="form-control" id="" cols="30" rows="1" placeholder="Type here..." ><?php if(!empty($single_data)){ echo $single_data->address;} ?></textarea>
                                                            
                                                            <div class="invalid-feedback">
                                                                Please provide a valid mobile number.
                                                            </div>
                                                            <!-- </div> -->
                                                            </div>

                                     

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Vendor Type</label>
                                                                    <select name="vendor_type" id="vendor_type" name="vendor_type" class="form-select" >
                                                                        <option>Please Select Vendor Type</option>
                                                                    
                                                                            
                                                                            <option value="Transportation" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Transportation') ? 'selected="selected"' : ''; } ?>>
                                                                            Transportation 
                                                                            </option>

                                                                            <option value="Software" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Software') ? 'selected="selected"' : ''; } ?>>
                                                                            Software
                                                                            </option>

                                                                            <option value="Shipping" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Shipping') ? 'selected="selected"' : ''; } ?>>
                                                                            Shipping
                                                                            </option>

                                                                            <option value="Marketing" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Marketing') ? 'selected="selected"' : ''; } ?>>
                                                                            Marketing
                                                                            </option>

                                                                            <option value="Catering" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Catering') ? 'selected="selected"' : ''; } ?>>
                                                                            Catering
                                                                            </option>

                                                                            <option value="Security" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Security') ? 'selected="selected"' : ''; } ?>>
                                                                            Security
                                                                            </option>


                                                                            <option value="Finance" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Finance') ? 'selected="selected"' : ''; } ?>>
                                                                            Finance
                                                                            </option>

                                                                            <option value="Human Resource (HR)" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Human Resource (HR)') ? 'selected="selected"' : ''; } ?>>
                                                                            Human Resource (HR)
                                                                            </option>

                                                                            <option value="Sanitation" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Sanitation') ? 'selected="selected"' : ''; } ?>>
                                                                            Sanitation
                                                                            </option>

                                                                            <option value="Sanitary" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Sanitary') ? 'selected="selected"' : ''; } ?>>
                                                                            Sanitary
                                                                            </option>

                                                                            <option value="Water" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Water') ? 'selected="selected"' : ''; } ?>>
                                                                            Water
                                                                            </option>

                                                                            <option value="Electricity" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Electricity') ? 'selected="selected"' : ''; } ?>>
                                                                            Electricity
                                                                            </option>

                                                                            <option value="Food" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Food') ? 'selected="selected"' : ''; } ?>>
                                                                            Food
                                                                            </option>

                                                                            <option value="Cleaning" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Cleaning') ? 'selected="selected"' : ''; } ?>>
                                                                            Cleaning
                                                                            </option>

                                                                            <option value="Hardware" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Hardware') ? 'selected="selected"' : ''; } ?>>
                                                                            Hardware
                                                                            </option>

                                                                            <option value="Furniture" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Furniture') ? 'selected="selected"' : ''; } ?>>
                                                                            Furniture
                                                                            </option>

                                                                            <option value="Plumbing" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Plumbing') ? 'selected="selected"' : ''; } ?>>
                                                                            Plumbing
                                                                            </option>

                                                                            <option value="Services" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Services') ? 'selected="selected"' : ''; } ?>>
                                                                            Services
                                                                            </option>

                                                                            <option value="Phone" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Phone') ? 'selected="selected"' : ''; } ?>>
                                                                            Phone
                                                                            </option>

                                                                            <option value="Other" <?php if (isset($single_data)) { echo ($single_data->vendor_type == 'Other') ? 'selected="selected"' : ''; } ?>>
                                                                            Other
                                                                            </option>
                                                                    </select>   
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>GST No</label>
                                                                        <input type="text" class="form-control" id="gst_no" name="gst_no"  value="<?php if(!empty($single_data)){ echo $single_data->GST_no;} ?>" placeholder="Enter GST no" >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid GST number.
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>PAN No</label>
                                                                        <input type="text" class="form-control" id="pan_no" name="pan_no"  value="<?php if(!empty($single_data)){ echo $single_data->PAN_no;} ?>" placeholder="Enter PAN no" >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid PAN number.
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <h4 class="card-title">Billing Cycle :</h4>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Recurring</label>
                                                                    <select name="recurring" id="recurring" class="form-select recurring">
                                                                        <option>Please Select Recurring</option>
                                                                        <option value="Daily" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Daily') ? 'selected="selected"' : ''; } ?>> Daily</option>
                                                                        <option value="Weekly" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Weekly') ? 'selected="selected"' : ''; } ?>> Weekly</option>
                                                                        <option value="4th Nightly" <?php if (isset($single_data)) { echo ($single_data->recurring == '4th Nightly') ? 'selected="selected"' : ''; } ?>> 4th Nightly</option>
                                                                        <option value="Monthly" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Monthly') ? 'selected="selected"' : ''; } ?>> Monthly</option>
                                                                        <option value="Quarterly" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Quarterly') ? 'selected="selected"' : ''; } ?>> Quarterly</option>
                                                                        <option value="Half Yearly" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Half Yearly') ? 'selected="selected"' : ''; } ?>> Half Yearly</option>
                                                                        <option value="Yearly" <?php if (isset($single_data)) { echo ($single_data->recurring == 'Yearly') ? 'selected="selected"' : ''; } ?>> Yearly</option>
                                                                        <option value="No Recurring" <?php if (isset($single_data)) { echo ($single_data->recurring == 'No Recurring') ? 'selected="selected"' : ''; } ?>> No Recurring</option>
                                                                    
                                                                    </select>   
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 day">
                                                                <div class="form-group">
                                                                    <label>Select Day</label>
                                                                    <select name="days" id="days" class="form-select">
                                                                        <option value="">Please Select day</option>
                                                                        <option value="Monday" <?php if (isset($single_data)) { echo ($single_data->days == 'Monday') ? 'selected="selected"' : ''; } ?>> Monday</option>
                                                                        <option value="Tuesday" <?php if (isset($single_data)) { echo ($single_data->days == 'Tuesday') ? 'selected="selected"' : ''; } ?>> Tuesday</option>
                                                                        <option value="Wednesday" <?php if (isset($single_data)) { echo ($single_data->days == 'Wednesday') ? 'selected="selected"' : ''; } ?>> Wednesday</option>
                                                                        <option value="Thursday" <?php if (isset($single_data)) { echo ($single_data->days == 'Thursday') ? 'selected="selected"' : ''; } ?>> Thursday</option>
                                                                        <option value="Friday" <?php if (isset($single_data)) { echo ($single_data->days == 'Friday') ? 'selected="selected"' : ''; } ?>> Friday</option>
                                                                        <option value="Saturday" <?php if (isset($single_data)) { echo ($single_data->days == 'Saturday') ? 'selected="selected"' : ''; } ?>> Saturday</option>
                                                                        <option value="Sunday" <?php if (isset($single_data)) { echo ($single_data->days == 'Sunday') ? 'selected="selected"' : ''; } ?>> Sunday</option>
                                                                    
                                                                    </select>   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 month">
                                                                <div class="form-group">
                                                                <label for="months">Select Month:</label>
                                                                <select id="months" name="months" class="form-select">
                                                                    <option value="January" <?php if (isset($single_data)) { echo ($single_data->months == 'January') ? 'selected="selected"' : ''; } ?>> January</option>
                                                                    <option value="February" <?php if (isset($single_data)) { echo ($single_data->months == 'February') ? 'selected="selected"' : ''; } ?>> February</option>
                                                                    <option value="March" <?php if (isset($single_data)) { echo ($single_data->months == 'March') ? 'selected="selected"' : ''; } ?>> March</option>
                                                                    <option value="April" <?php if (isset($single_data)) { echo ($single_data->months == 'April') ? 'selected="selected"' : ''; } ?>> April</option>
                                                                    <option value="May" <?php if (isset($single_data)) { echo ($single_data->months == 'May') ? 'selected="selected"' : ''; } ?>> May</option>
                                                                    <option value="June" <?php if (isset($single_data)) { echo ($single_data->months == 'June') ? 'selected="selected"' : ''; } ?>> June</option>
                                                                    <option value="July" <?php if (isset($single_data)) { echo ($single_data->months == 'July') ? 'selected="selected"' : ''; } ?>> July</option>
                                                                    <option value="August" <?php if (isset($single_data)) { echo ($single_data->months == 'August') ? 'selected="selected"' : ''; } ?>> August</option>
                                                                    <option value="September" <?php if (isset($single_data)) { echo ($single_data->months == 'September') ? 'selected="selected"' : ''; } ?>> September</option>
                                                                    <option value="October" <?php if (isset($single_data)) { echo ($single_data->months == 'October') ? 'selected="selected"' : ''; } ?>> October</option>
                                                                    <option value="November" <?php if (isset($single_data)) { echo ($single_data->months == 'November') ? 'selected="selected"' : ''; } ?>> November</option>
                                                                    <option value="December" <?php if (isset($single_data)) { echo ($single_data->months == 'December') ? 'selected="selected"' : ''; } ?>> December</option>

                                                                </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 dates">
                                                                <div class="form-group">
                                                                <label for="dates">Select Date:</label>
                                                                <select id="dates" name="dates" class="form-select">
                                                                    <option value="1" <?php if (isset($single_data)) { echo ($single_data->dates == '1') ? 'selected="selected"' : ''; } ?>> 1</option>
                                                                    <option value="2" <?php if (isset($single_data)) { echo ($single_data->dates == '2') ? 'selected="selected"' : ''; } ?>> 2</option>
                                                                    <option value="3" <?php if (isset($single_data)) { echo ($single_data->dates == '3') ? 'selected="selected"' : ''; } ?>> 3</option>
                                                                    <option value="4" <?php if (isset($single_data)) { echo ($single_data->dates == '4') ? 'selected="selected"' : ''; } ?>> 4</option>
                                                                    <option value="5" <?php if (isset($single_data)) { echo ($single_data->dates == '5') ? 'selected="selected"' : ''; } ?>> 5</option>
                                                                    <option value="6" <?php if (isset($single_data)) { echo ($single_data->dates == '6') ? 'selected="selected"' : ''; } ?>> 6</option>
                                                                    <option value="7" <?php if (isset($single_data)) { echo ($single_data->dates == '7') ? 'selected="selected"' : ''; } ?>> 7</option>
                                                                    <option value="8" <?php if (isset($single_data)) { echo ($single_data->dates == '8') ? 'selected="selected"' : ''; } ?>> 8</option>
                                                                    <option value="9" <?php if (isset($single_data)) { echo ($single_data->dates == '9') ? 'selected="selected"' : ''; } ?>> 9</option>
                                                                    <option value="10" <?php if (isset($single_data)) { echo ($single_data->dates == '10') ? 'selected="selected"' : ''; } ?>> 10</option>
                                                                    <option value="11" <?php if (isset($single_data)) { echo ($single_data->dates == '11') ? 'selected="selected"' : ''; } ?>> 11</option>
                                                                    <option value="12" <?php if (isset($single_data)) { echo ($single_data->dates == '12') ? 'selected="selected"' : ''; } ?>> 12</option>
                                                                    <option value="13" <?php if (isset($single_data)) { echo ($single_data->dates == '13') ? 'selected="selected"' : ''; } ?>> 13</option>
                                                                    <option value="14" <?php if (isset($single_data)) { echo ($single_data->dates == '14') ? 'selected="selected"' : ''; } ?>> 14</option>
                                                                    <option value="15" <?php if (isset($single_data)) { echo ($single_data->dates == '15') ? 'selected="selected"' : ''; } ?>> 15</option>
                                                                    <option value="16" <?php if (isset($single_data)) { echo ($single_data->dates == '16') ? 'selected="selected"' : ''; } ?>> 16</option>
                                                                    <option value="17" <?php if (isset($single_data)) { echo ($single_data->dates == '17') ? 'selected="selected"' : ''; } ?>> 17</option>
                                                                    <option value="18" <?php if (isset($single_data)) { echo ($single_data->dates == '18') ? 'selected="selected"' : ''; } ?>> 18</option>
                                                                    <option value="19" <?php if (isset($single_data)) { echo ($single_data->dates == '19') ? 'selected="selected"' : ''; } ?>> 19</option>
                                                                    <option value="20" <?php if (isset($single_data)) { echo ($single_data->dates == '20') ? 'selected="selected"' : ''; } ?>> 20</option>
                                                                    <option value="21" <?php if (isset($single_data)) { echo ($single_data->dates == '21') ? 'selected="selected"' : ''; } ?>> 21</option>
                                                                    <option value="22" <?php if (isset($single_data)) { echo ($single_data->dates == '22') ? 'selected="selected"' : ''; } ?>> 22</option>
                                                                    <option value="23" <?php if (isset($single_data)) { echo ($single_data->dates == '23') ? 'selected="selected"' : ''; } ?>> 23</option>
                                                                    <option value="24" <?php if (isset($single_data)) { echo ($single_data->dates == '24') ? 'selected="selected"' : ''; } ?>> 24</option>
                                                                    <option value="25" <?php if (isset($single_data)) { echo ($single_data->dates == '25') ? 'selected="selected"' : ''; } ?>> 25</option>
                                                                    <option value="26" <?php if (isset($single_data)) { echo ($single_data->dates == '26') ? 'selected="selected"' : ''; } ?>> 26</option>
                                                                    <option value="27" <?php if (isset($single_data)) { echo ($single_data->dates == '27') ? 'selected="selected"' : ''; } ?>> 27</option>
                                                                    <option value="28" <?php if (isset($single_data)) { echo ($single_data->dates == '28') ? 'selected="selected"' : ''; } ?>> 28</option>
                                                                    <option value="29" <?php if (isset($single_data)) { echo ($single_data->dates == '29') ? 'selected="selected"' : ''; } ?>> 29</option>
                                                                    <option value="30" <?php if (isset($single_data)) { echo ($single_data->dates == '30') ? 'selected="selected"' : ''; } ?>> 30</option>
                                                                    <option value="31" <?php if (isset($single_data)) { echo ($single_data->dates == '31') ? 'selected="selected"' : ''; } ?>> 31</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <h4 class="card-title mt-4">Bank Account Details</h4>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Bank Name</label>
                                                                        <input type="text" class="form-control" id="bank_name" name="bank_name"  value="<?php if (isset($single_data)) {echo $single_data->bank_name; } ?>" placeholder="Enter bank name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Bank name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Branch Name</label>
                                                                        <input type="text" class="form-control" id="branch_name" name="branch_name"  value="<?php if (isset($single_data)) {echo $single_data->branch_name; } ?>" placeholder="Enter branch name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Branch name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Account Name</label>
                                                                        <input type="text" class="form-control" id="bank_holder_name" name="bank_holder_name"  value="<?php if (isset($single_data)) {echo $single_data->bank_holder_name; } ?>" placeholder="Enter bank holder name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Account Holder Name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Account Number</label>
                                                                        <input type="text" class="form-control" id="acc_no" name="acc_no"  value="<?php if (isset($single_data)) {echo $single_data->acc_no; } ?>" placeholder="Enter Account Number"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Account number.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>IFSC Code</label>
                                                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"  value="<?php if (isset($single_data)) {echo $single_data->ifsc_code; } ?>" placeholder="Enter IFSC code"  >
                                                                    
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid IFSC Code.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>UPI ID</label>
                                                                        <input type="text" class="form-control" id="upi_id" name="upi_id"  value="<?php if (isset($single_data)) {echo $single_data->upi_id; } ?>" placeholder="Enter UPI Code"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid UPI Id.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <!-- <div class="form-group"> -->
                                                                        <label>Mobile Number( Link With Bank Account)</label>
                                                                        <input type="text" class="form-control" id="bank_linked_mobile_no" name="bank_linked_mobile_no"  value="<?php if (isset($single_data)) {echo $single_data->mobile_no; } ?>" placeholder="Enter Bank Linked mobile number" >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a linked mobile number.
                                                                        </div>
                                                                    <!-- </div> -->
                                                            </div>
                                                            <div class="text-end mt-4">
                                                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                                            </div>
                                        </div>
                                    </form>
                            </div>
                                
                </div>
                
            </div>
            <!-- /Page Wrapper -->
        </div>
    </div>
</div>
    <!-- end main content-->
    <?php include __DIR__.'/../Admin/footer.php'; ?>





<!-- <script src="<?=base_url(); ?>public/assets/js/jquery-3.6.0.min.js"></script> -->

<script src="<?=base_url(); ?>public/assets/js/plugins/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>




<script>
    var $j = jQuery.noConflict();
</script>






<script>

$.validator.addMethod('lettersOnly', function(value, element) {
    return /^[a-zA-Z\s]*$/.test(value); // This regex allows only letters and spaces
}, 'Please enter letters only');

$.validator.addMethod('customPassword', function(value, element) {
    // Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol. It should be at least 8 characters long.
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/.test(value);
}, 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol (!@#$%^&*) and be at least 8 characters long');

$.validator.addMethod('phoneLength', function(value, element) {
    return /^\d{10,12}$/.test(value);
}, 'Please enter a valid phone number with 10 to 12 digits.');


$.validator.addMethod('countrySelected', function(value, element) {
    return value !== 'SelectCountry';
}, 'Please select a country.');


$.validator.addMethod('stateSelected', function(value, element) {
    return value !== 'SelectState';
},'Please select a state.');

$.validator.addMethod('gstNumber', function(value, element) {
    // GST number format: 2 numeric digits followed by 10 alphanumeric characters
    return /^[0-9]{2}[A-Z0-9]{10}$/.test(value);
}, 'Please enter a valid GST number (e.g., 12ABCDE3456F)');

$.validator.addMethod('panNumber', function(value, element) {
    // PAN number format: 5 uppercase letters, 4 numbers, and 1 uppercase letter
    return /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(value);
}, 'Please enter a valid PAN number (e.g., ABCDE1234F)');

$.validator.addMethod('validBankName', function(value, element) {
    // This regex allows letters, spaces, and some special characters commonly found in bank names.
    return /^[A-Za-z\s&.'-]+$/.test(value);
}, 'Please enter a valid bank name.');

$.validator.addMethod('validAccNo', function(value, element) {
    // This regex allows numbers and may include spaces or hyphens.
    return /^[0-9\s-]+$/.test(value) && value.length >= 9 && value.length <= 18;
}, 'Please enter a valid bank number (9-18 characters).');


$.validator.addMethod('validBankHolderName', function(value, element) {
    // This regex allows letters, spaces, and some special characters commonly found in names.
    return /^[A-Za-z\s&.'-]+$/.test(value);
}, 'Please enter a valid bank holder name.');

$.validator.addMethod('validIFSCCode', function(value, element) {
    // This regex checks if the IFSC code matches the pattern for Indian banks.
    return /^[A-Z]{4}\d{7}$/.test(value);
}, 'Please enter a valid IFSC code (e.g., ABCD0123456).');

$.validator.addMethod('validBranchName', function(value, element) {
    // This regex allows letters, spaces, and some special characters commonly found in branch names.
    return /^[A-Za-z\s&.'-]+$/.test(value);
}, 'Please enter a valid branch name.');


$(document).ready(function() {
    $('#form').validate({
        rules: {
            name: {
                required: true,
                lettersOnly: true, // Use the custom method here
            },

            contact_person_name:{
                required: true,
                lettersOnly: true,
            },
            vendor_mobile_no : {
                required: true,
                phoneLength: true,
                
            },
            cp_mobile_no : {
                required: true,
                phoneLength: true,
            },
            bank_linked_mobile_no: {
                required: true,
                phoneLength: true,
                  
            },

            email: {
                required: true,
                email: true,
            },
         
            address: {
                required:true,
            },
            country:{
                required:true,
                countrySelected: true
            },
            state:{
                required:true,
                stateSelected: true
            },
            district:{
                required:true,
            },
            vendor_type: {
                required: true,
            },

            gst_no: {
                gstNumber:true,
            },
            pan_no: {
                panNumber: true,
            },

            bank_name: {
                validBankName: true
            },
            acc_no: {
                validAccNo: true
            },
            bank_holder_name: {
                validBankHolderName: true
            },
            ifsc_code: {
                validIFSCCode: true
            },
            branch_name: {
                validBranchName: true
            },
            upi_id: {
                required: true
            },

        },
        messages: {
            name: {
            required: 'Please enter your name.',
            lettersOnly: 'Please enter letters only.' // Custom error message
            },
            contact_person_name:{
                required: 'Please enter contact person name.',
                lettersOnly: 'Please enter letters only.'
            },
            vendor_mobile_no : {
                required: 'Please enter vendor phone no.',
                phoneLength: 'Please enter your valid phone no.'
            },
            cp_mobile_no : {
                required: 'Please enter mobile number.',
                phoneLength: 'Please enter your valid phone no.'
            },
            bank_linked_mobile_no: {
                required: 'Please enter bank linked mobile number.',
                phoneLength: 'Please enter your valid phone no.'
            },
            email: {
                required: 'Please enter Email.',
                email: 'Please enter a valid email address.'
            },
            address: {
                required: 'Please enter your address.',
            },
            country:{
                required: 'Please select a country.'
            },
            state:{
                required: 'Please select a state.',
            },
            district:{
                required: 'Please enter a district.',
            },
            vendor_type:{
                required: 'Please select vendor type.',
            },
            gst_no: {
                gstNumber: 'Please enter a valid GST number (e.g., 12ABCDE3456F)'
            },
            pan_no: {
                panNumber: 'Please enter a valid PAN number (e.g., ABCDE1234F)'
            },
            bank_name: {
                validBankName: 'Please enter a valid bank name.'
            },
            acc_no: {
                validAccNo: 'Please enter a valid bank number (9-18 characters).'
            },
            bank_holder_name: {
                validBankHolderName: 'Please enter a valid bank holder name.'
            },
            ifsc_code: {
                validIFSCCode: 'Please enter a valid IFSC code (e.g., ABCD0123456).'
            },
            branch_name: {
                validBranchName: 'Please enter a valid branch name.'
            },
            upi_id: {
                required: 'Please enter UPI ID.',
            }, 
            
        }
    });
});


$(document).ready(function(){
    var AndraPradesh = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna",
        "Kurnool", "Prakasam", "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram",
        "West Godavari"
    ];
    var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang",
        "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley",
        "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap",
        "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"
    ];
    var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo",
        "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat",
        "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)",
        "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon",
        "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur",
        "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"
    ];
    var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur",
        "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad",
        "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura",
        "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia",
        "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi",
        "Siwan", "Supaul", "Vaishali", "West Champaran"
    ];
    var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur",
        "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa",
        "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund",
        "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur",
        "Surguja"
    ];
    var Goa = ["North Goa", "South Goa"];
    var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch",
        "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka",
        "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar",
        "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar",
        "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"
    ];
    var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram",
        "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh",
        "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat",
        "Yamunanagar"
    ];
    var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu",
        "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"
    ];
    var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal",
        "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch",
        "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"
    ];
    var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum",
        "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma",
        "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj",
        "Seraikela Kharsawan", "Simdega", "West Singhbhum"
    ];
    var Karnataka = ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary",
        "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru",
        "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga",
        "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur",
        "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"
    ];
    var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam",
        "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta",
        "Thiruvananthapuram", "Thrissur", "Wayanad"
    ];
    var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat",
        "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara",
        "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda",
        "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone",
        "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen",
        "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
        "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi",
        "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
    ];
    var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara",
        "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon",
        "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded",
        "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad",
        "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha",
        "Washim", "Yavatmal"
    ];
    var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West",
        "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati",
        "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"
    ];
    var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills",
        "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills",
        "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills",
        "West Khasi Hills"
    ];
    var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha",
        "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit",
        "Saiha", "Serchhip"
    ];
    var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren",
        "Phek", "Tuensang", "Wokha", "Zunheboto"
    ];
    var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack",
        "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur",
        "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha",
        "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri",
        "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"
    ];
    var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka",
        "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana",
        "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur",
        "Shaheed Bhagat Singh Nagar", "Tarn Taran"
    ];
    var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara",
        "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur",
        "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar",
        "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh",
        "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"
    ];
    var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
    var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul",
        "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai",
        "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai",
        "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi",
        "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai",
        "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"
    ];
    var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon",
        "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem",
        "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool",
        "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy",
        "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural",
        "Warangal Urban", "Yadadri Bhuvanagiri"
    ];
    var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura",
        "Unakoti", "West Tripura"
    ];
    var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha",
        "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda",
        "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr",
        "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad",
        "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda",
        "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur",
        "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi",
        "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri",
        "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit",
        "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar",
        "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra",
        "Sultanpur", "Unnao", "Varanasi"
    ];
    var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar",
        "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar",
        "Uttarkashi"
    ];
    var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur",
        "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata",
        "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman",
        "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia",
        "South 24 Parganas", "Uttar Dinajpur"
    ];
    var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
    var Chandigarh = ["Chandigarh"];
    var DadraHaveli = ["Dadra Nagar Haveli"];
    var DamanDiu = ["Daman", "Diu"];
    var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi",
        "North West Delhi", "Shahdara", "South Delhi", "South East Delhi",
        "South West Delhi", "West Delhi"
    ];
    var Lakshadweep = ["Lakshadweep"];
    var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];


    $("#inputState").change(function() {
        var StateSelected = $(this).val();
        var optionsList;
        var htmlString = "";

        switch (StateSelected) {
            case "Andra Pradesh":
                optionsList = AndraPradesh;
                break;
            case "Arunachal Pradesh":
                optionsList = ArunachalPradesh;
                break;
            case "Assam":
                optionsList = Assam;
                break;
            case "Bihar":
                optionsList = Bihar;
                break;
            case "Chhattisgarh":
                optionsList = Chhattisgarh;
                break;
            case "Goa":
                optionsList = Goa;
                break;
            case "Gujarat":
                optionsList = Gujarat;
                break;
            case "Haryana":
                optionsList = Haryana;
                break;
            case "Himachal Pradesh":
                optionsList = HimachalPradesh;
                break;
            case "Jammu and Kashmir":
                optionsList = JammuKashmir;
                break;
            case "Jharkhand":
                optionsList = Jharkhand;
                break;
            case "Karnataka":
                optionsList = Karnataka;
                break;
            case "Kerala":
                optionsList = Kerala;
                break;
            case "Madya Pradesh":
                optionsList = MadhyaPradesh;
                break;
            case "Maharashtra":
                optionsList = Maharashtra;
                break;
            case "Manipur":
                optionsList = Manipur;
                break;
            case "Meghalaya":
                optionsList = Meghalaya;
                break;
            case "Mizoram":
                optionsList = Mizoram;
                break;
            case "Nagaland":
                optionsList = Nagaland;
                break;
            case "Orissa":
                optionsList = Orissa;
                break;
            case "Punjab":
                optionsList = Punjab;
                break;
            case "Rajasthan":
                optionsList = Rajasthan;
                break;
            case "Sikkim":
                optionsList = Sikkim;
                break;
            case "Tamil Nadu":
                optionsList = TamilNadu;
                break;
            case "Telangana":
                optionsList = Telangana;
                break;
            case "Tripura":
                optionsList = Tripura;
                break;
            case "Uttaranchal":
                optionsList = Uttaranchal;
                break;
            case "Uttar Pradesh":
                optionsList = UttarPradesh;
                break;
            case "West Bengal":
                optionsList = WestBengal;
                break;
            case "Andaman and Nicobar Islands":
                optionsList = AndamanNicobar;
                break;
            case "Chandigarh":
                optionsList = Chandigarh;
                break;
            case "Dadar and Nagar Haveli":
                optionsList = DadraHaveli;
                break;
            case "Daman and Diu":
                optionsList = DamanDiu;
                break;
            case "Delhi":
                optionsList = Delhi;
                break;
            case "Lakshadeep":
                optionsList = Lakshadeep;
                break;
            case "Pondicherry":
                optionsList = Pondicherry;
                break;
        }


        for (var i = 0; i < optionsList.length; i++) {
            htmlString = htmlString + "<option value='" + optionsList[i] + "'>" +
                optionsList[i] + "</option>";
        }
        $("#inputDistrict").html(htmlString);

    });
    $('#inputState').trigger('change');
});
    
    </script>



</body>

<script>
$(document).ready(function() {
    function handleRecurringSelect() {
        var selectedValue = $("#recurring").val();
        var dayDiv = $(".day");

        if (selectedValue == 'Weekly') {
            dayDiv.show();
            $(".dates").hide()
            $(".month").hide()

        }else{
            dayDiv.hide();
            $(".dates").show()
            $(".month").show()
        }
    }

    // Define the event handler
    $("#recurring").change(handleRecurringSelect);

    // Call the handler on page load
    handleRecurringSelect();
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

</html>