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
                                    aria-selected="true"> Add Vendor</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Vendor List</button>
                            </li>
                        
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <h4 class="card-title">Vendor Details : </h4>
                                    <form action="<?php echo base_url(); ?>set_vendor_data" id="form" method="post">
                                        <div class="row">
                                                            <input type="hidden" name="id" value="<?php if(!empty($single_data)){ echo $single_data[0]->id;} ?>" >
                                                            <div class="col-md-3">
                                                                    <label>Vendor Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name"  value="<?php if(!empty($single_data)){ echo $single_data[0]->vendor_name;} ?>" placeholder="Enter name" required >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Vendor name.
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <label>Vendor Mobile No.:</label>
                                                                    <input type="tel" class="form-control" id="vendor_mobile_no" name="vendor_mobile_no" maxlength="10" minlength="10" pattern="\d{10}" value="<?php if(!empty($single_data)){ echo $single_data[0]->vendor_mobile_no;} ?>" placeholder="Enter Vendor's Mobile Number "  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Vendor mobile number.
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <label>Contact Person Name</label>
                                                                    <input type="text" class="form-control" id="contact_person_name" name="contact_person_name"  value="<?php if(!empty($single_data)){ echo $single_data[0]->contact_person;} ?>" placeholder="Enter Contact Person name"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid Name.
                                                                    </div>
                                                            </div>
                                                        
                                                            <div class="col-md-3">
                                                                    <label>Mobile No.:</label>
                                                                    <input type="tel" class="form-control" id="phone_no2" name="cp_mobile_no" maxlength="10" minlength="10" pattern="\d{10}"  value="<?php if(!empty($single_data)){ echo $single_data[0]->contperson_mobile_no;} ?>" placeholder="Enter mobile number of Contact Person"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid mobile number.
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <!-- <div class="form-group"> -->
                                                                    <label>Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email"  value="<?php if(!empty($single_data)){ echo $single_data[0]->email;} ?>" placeholder="Enter email"  >
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid email address.
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                    
                                                        
                                                            <div class="form-group col-md-3">
                                                                    <label for="country" class="form-label">Country:</label>
                                                                        <select class="form-select choosen" id="country" name="country">
                                                                            <option value="">Please select country</option>
                                                                            <?php if(!empty($country)){foreach($country as $country_result){?>
                                                                            <option value="<?=$country_result->id?>"
                                                                                <?php if(!empty($single_data) && $single_data[0]->country == $country_result->id){?>selected="selected"
                                                                                <?php }?>><?=$country_result->name?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label for="state" class="form-label">State:</label>
                                                                <select class="form-select choosen" id="state" name="state">
                                                                    <option value="">Please select state</option>
                                                                </select>
                                                            </div>
                                                         
                                                            <div class=" form-group col-md-3">
                                                                <label for="district" class="form-label">District</label>
                                                                <input type="text" class="form-control" id="inputDistrict" name="district" value="<?php if(!empty($single_data)){ echo $single_data[0]->district; }?>"required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid district name.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                            <!-- <div class="form-group"> -->
                                                                <label>Address</label>
                                                                <textarea name="address" class="form-control" id="" cols="30" rows="1" placeholder="Type here..." ><?php if(!empty($single_data)){ echo $single_data[0]->address;} ?></textarea>
                                                            
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
                                                                    
                                                                            <option value="Transportation" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Transportation') ? 'selected="selected"' : ''; } ?>>
                                                                            Transportation 
                                                                            </option>

                                                                            <option value="Software" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Software') ? 'selected="selected"' : ''; } ?>>
                                                                            Software
                                                                            </option>

                                                                            <option value="Shipping" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Shipping') ? 'selected="selected"' : ''; } ?>>
                                                                            Shipping
                                                                            </option>

                                                                            <option value="Marketing" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Marketing') ? 'selected="selected"' : ''; } ?>>
                                                                            Marketing
                                                                            </option>

                                                                            <option value="Catering" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Catering') ? 'selected="selected"' : ''; } ?>>
                                                                            Catering
                                                                            </option>

                                                                            <option value="Security" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Security') ? 'selected="selected"' : ''; } ?>>
                                                                            Security
                                                                            </option>


                                                                            <option value="Finance" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Finance') ? 'selected="selected"' : ''; } ?>>
                                                                            Finance
                                                                            </option>

                                                                            <option value="Human Resource (HR)" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Human Resource (HR)') ? 'selected="selected"' : ''; } ?>>
                                                                            Human Resource (HR)
                                                                            </option>

                                                                            <option value="Sanitation" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Sanitation') ? 'selected="selected"' : ''; } ?>>
                                                                            Sanitation
                                                                            </option>

                                                                            <option value="Sanitary" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Sanitary') ? 'selected="selected"' : ''; } ?>>
                                                                            Sanitary
                                                                            </option>

                                                                            <option value="Water" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Water') ? 'selected="selected"' : ''; } ?>>
                                                                            Water
                                                                            </option>

                                                                            <option value="Electricity" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Electricity') ? 'selected="selected"' : ''; } ?>>
                                                                            Electricity
                                                                            </option>

                                                                            <option value="Food" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Food') ? 'selected="selected"' : ''; } ?>>
                                                                            Food
                                                                            </option>

                                                                            <option value="Cleaning" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Cleaning') ? 'selected="selected"' : ''; } ?>>
                                                                            Cleaning
                                                                            </option>

                                                                            <option value="Hardware" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Hardware') ? 'selected="selected"' : ''; } ?>>
                                                                            Hardware
                                                                            </option>

                                                                            <option value="Furniture" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Furniture') ? 'selected="selected"' : ''; } ?>>
                                                                            Furniture
                                                                            </option>

                                                                            <option value="Plumbing" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Plumbing') ? 'selected="selected"' : ''; } ?>>
                                                                            Plumbing
                                                                            </option>

                                                                            <option value="Services" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Services') ? 'selected="selected"' : ''; } ?>>
                                                                            Services
                                                                            </option>

                                                                            <option value="Phone" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Phone') ? 'selected="selected"' : ''; } ?>>
                                                                            Phone
                                                                            </option>

                                                                            <option value="Other" <?php if (isset($single_data)) { echo ($single_data[0]->vendor_type == 'Other') ? 'selected="selected"' : ''; } ?>>
                                                                            Other
                                                                            </option>
                                                                    </select>   
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>GST No</label>
                                                                        <input type="text" class="form-control" id="gst_no" name="gst_no"  value="<?php if(!empty($single_data)){ echo $single_data[0]->GST_no;} ?>" placeholder="Enter GST no" >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid GST number.
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>PAN No</label>
                                                                        <input type="text" class="form-control" id="pan_no" name="pan_no"  value="<?php if(!empty($single_data)){ echo $single_data[0]->PAN_no;} ?>" placeholder="Enter PAN no" >
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
                                                                        <option value="Daily" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Daily') ? 'selected="selected"' : ''; } ?>> Daily</option>
                                                                        <option value="Weekly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Weekly') ? 'selected="selected"' : ''; } ?>> Weekly</option>
                                                                        <option value="4th Nightly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == '4th Nightly') ? 'selected="selected"' : ''; } ?>> 4th Nightly</option>
                                                                        <option value="Monthly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Monthly') ? 'selected="selected"' : ''; } ?>> Monthly</option>
                                                                        <option value="Quarterly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Quarterly') ? 'selected="selected"' : ''; } ?>> Quarterly</option>
                                                                        <option value="Half Yearly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Half Yearly') ? 'selected="selected"' : ''; } ?>> Half Yearly</option>
                                                                        <option value="Yearly" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'Yearly') ? 'selected="selected"' : ''; } ?>> Yearly</option>
                                                                        <option value="No Recurring" <?php if (isset($single_data)) { echo ($single_data[0]->recurring == 'No Recurring') ? 'selected="selected"' : ''; } ?>> No Recurring</option>
                                                                    
                                                                    </select>   
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 day">
                                                                <div class="form-group">
                                                                    <label>Select Day</label>
                                                                    <select name="days" id="days" class="form-select">
                                                                        <option value="">Please Select day</option>
                                                                        <option value="Monday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Monday') ? 'selected="selected"' : ''; } ?>> Monday</option>
                                                                        <option value="Tuesday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Tuesday') ? 'selected="selected"' : ''; } ?>> Tuesday</option>
                                                                        <option value="Wednesday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Wednesday') ? 'selected="selected"' : ''; } ?>> Wednesday</option>
                                                                        <option value="Thursday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Thursday') ? 'selected="selected"' : ''; } ?>> Thursday</option>
                                                                        <option value="Friday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Friday') ? 'selected="selected"' : ''; } ?>> Friday</option>
                                                                        <option value="Saturday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Saturday') ? 'selected="selected"' : ''; } ?>> Saturday</option>
                                                                        <option value="Sunday" <?php if (isset($single_data)) { echo ($single_data[0]->days == 'Sunday') ? 'selected="selected"' : ''; } ?>> Sunday</option>
                                                                    
                                                                    </select>   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 month">
                                                                <div class="form-group">
                                                                <label for="months">Select Month:</label>
                                                                <select id="months" name="months" class="form-select">
                                                                    <option value="January" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'January') ? 'selected="selected"' : ''; } ?>> January</option>
                                                                    <option value="February" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'February') ? 'selected="selected"' : ''; } ?>> February</option>
                                                                    <option value="March" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'March') ? 'selected="selected"' : ''; } ?>> March</option>
                                                                    <option value="April" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'April') ? 'selected="selected"' : ''; } ?>> April</option>
                                                                    <option value="May" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'May') ? 'selected="selected"' : ''; } ?>> May</option>
                                                                    <option value="June" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'June') ? 'selected="selected"' : ''; } ?>> June</option>
                                                                    <option value="July" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'July') ? 'selected="selected"' : ''; } ?>> July</option>
                                                                    <option value="August" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'August') ? 'selected="selected"' : ''; } ?>> August</option>
                                                                    <option value="September" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'September') ? 'selected="selected"' : ''; } ?>> September</option>
                                                                    <option value="October" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'October') ? 'selected="selected"' : ''; } ?>> October</option>
                                                                    <option value="November" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'November') ? 'selected="selected"' : ''; } ?>> November</option>
                                                                    <option value="December" <?php if (isset($single_data)) { echo ($single_data[0]->months == 'December') ? 'selected="selected"' : ''; } ?>> December</option>

                                                                </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 dates">
                                                                <div class="form-group">
                                                                <label for="dates">Select Date:</label>
                                                                <select id="dates" name="dates" class="form-select">
                                                                    <option value="1" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '1') ? 'selected="selected"' : ''; } ?>> 1</option>
                                                                    <option value="2" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '2') ? 'selected="selected"' : ''; } ?>> 2</option>
                                                                    <option value="3" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '3') ? 'selected="selected"' : ''; } ?>> 3</option>
                                                                    <option value="4" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '4') ? 'selected="selected"' : ''; } ?>> 4</option>
                                                                    <option value="5" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '5') ? 'selected="selected"' : ''; } ?>> 5</option>
                                                                    <option value="6" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '6') ? 'selected="selected"' : ''; } ?>> 6</option>
                                                                    <option value="7" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '7') ? 'selected="selected"' : ''; } ?>> 7</option>
                                                                    <option value="8" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '8') ? 'selected="selected"' : ''; } ?>> 8</option>
                                                                    <option value="9" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '9') ? 'selected="selected"' : ''; } ?>> 9</option>
                                                                    <option value="10" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '10') ? 'selected="selected"' : ''; } ?>> 10</option>
                                                                    <option value="11" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '11') ? 'selected="selected"' : ''; } ?>> 11</option>
                                                                    <option value="12" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '12') ? 'selected="selected"' : ''; } ?>> 12</option>
                                                                    <option value="13" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '13') ? 'selected="selected"' : ''; } ?>> 13</option>
                                                                    <option value="14" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '14') ? 'selected="selected"' : ''; } ?>> 14</option>
                                                                    <option value="15" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '15') ? 'selected="selected"' : ''; } ?>> 15</option>
                                                                    <option value="16" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '16') ? 'selected="selected"' : ''; } ?>> 16</option>
                                                                    <option value="17" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '17') ? 'selected="selected"' : ''; } ?>> 17</option>
                                                                    <option value="18" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '18') ? 'selected="selected"' : ''; } ?>> 18</option>
                                                                    <option value="19" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '19') ? 'selected="selected"' : ''; } ?>> 19</option>
                                                                    <option value="20" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '20') ? 'selected="selected"' : ''; } ?>> 20</option>
                                                                    <option value="21" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '21') ? 'selected="selected"' : ''; } ?>> 21</option>
                                                                    <option value="22" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '22') ? 'selected="selected"' : ''; } ?>> 22</option>
                                                                    <option value="23" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '23') ? 'selected="selected"' : ''; } ?>> 23</option>
                                                                    <option value="24" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '24') ? 'selected="selected"' : ''; } ?>> 24</option>
                                                                    <option value="25" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '25') ? 'selected="selected"' : ''; } ?>> 25</option>
                                                                    <option value="26" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '26') ? 'selected="selected"' : ''; } ?>> 26</option>
                                                                    <option value="27" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '27') ? 'selected="selected"' : ''; } ?>> 27</option>
                                                                    <option value="28" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '28') ? 'selected="selected"' : ''; } ?>> 28</option>
                                                                    <option value="29" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '29') ? 'selected="selected"' : ''; } ?>> 29</option>
                                                                    <option value="30" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '30') ? 'selected="selected"' : ''; } ?>> 30</option>
                                                                    <option value="31" <?php if (isset($single_data)) { echo ($single_data[0]->dates == '31') ? 'selected="selected"' : ''; } ?>> 31</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <h4 class="card-title mt-4">Bank Account Details</h4>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Bank Name</label>
                                                                        <input type="text" class="form-control" id="bank_name" name="bank_name"  value="<?php if (isset($single_data)) {echo $single_data[0]->bank_name; } ?>" placeholder="Enter bank name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Bank name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Branch Name</label>
                                                                        <input type="text" class="form-control" id="branch_name" name="branch_name"  value="<?php if (isset($single_data)) {echo $single_data[0]->branch_name; } ?>" placeholder="Enter branch name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Branch name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Account Name</label>
                                                                        <input type="text" class="form-control" id="bank_holder_name" name="bank_holder_name"  value="<?php if (isset($single_data)) {echo $single_data[0]->bank_holder_name; } ?>" placeholder="Enter bank holder name"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Account Holder Name.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Account Number</label>
                                                                        <input type="text" class="form-control" id="acc_no" name="acc_no"  value="<?php if (isset($single_data)) {echo $single_data[0]->acc_no; } ?>" placeholder="Enter Account Number"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid Account number.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>IFSC Code</label>
                                                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"  value="<?php if (isset($single_data)) {echo $single_data[0]->ifsc_code; } ?>" placeholder="Enter IFSC code"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid IFSC Code.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>UPI ID</label>
                                                                        <input type="text" class="form-control" id="upi_id" name="upi_id"  value="<?php if (isset($single_data)) {echo $single_data[0]->upi_id; } ?>" placeholder="Enter UPI Code"  >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid UPI Id.
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                    <!-- <div class="form-group"> -->
                                                                        <label>Mobile Number( Link With Bank Account)</label>
                                                                        <input type="text" class="form-control" id="bank_linked_mobile_no" name="bank_linked_mobile_no"  value="<?php if (isset($single_data)) {echo $single_data[0]->mobile_no; } ?>" placeholder="Enter Bank Linked mobile number" >
                                                                        <div class="invalid-feedback">
                                                                            Please provide a linked mobile number.
                                                                        </div>
                                                                    <!-- </div> -->
                                                            </div>
                                                            <div class="text-end mt-4">
                                                                <!-- <button type="submit" class="btn btn-primary" id="submitButton">Submit</button> -->
                                                                <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                                                <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                                            </div>
                                        </div>
                                    </form>
                                
                                    
                            </div>  

                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
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
                                            </table>  
                                        </div>
                                    </div>
                                </div> 
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
    return /^[a-zA-Z\s.]*$/.test(value); // Allows letters, spaces, and periods
}, 'Please enter letters, spaces, or periods only');

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
    var selectedCountry = '<?= !empty($single_data) ? $single_data[0]->country : '' ?>'; // Pre-selected country from server
    var selectedState = '<?= !empty($single_data) ? $single_data[0]->state : '' ?>';   // Pre-selected state from server

    // Function to load states based on country selection
    function loadStates(countryId, selectedState = '') {
        if (countryId) {
            // AJAX request to get states based on selected country
            $.ajax({
                url: '<?= base_url('getStates') ?>',  // CodeIgniter 4 route
                type: 'GET',
                data: { country_id: countryId },
                dataType: 'json',
                success: function(states) {
                    $('#state').html('<option value="">Please select state</option>');

                    // Populate the state dropdown
                    $.each(states, function(key, state) {
                        $('#state').append('<option value="'+ state.id +'"'
                            + (state.id == selectedState ? ' selected="selected"' : '') + '>'
                            + state.name +'</option>');
                    });
                }
            });
        } else {
            $('#state').html('<option value="">Please select state</option>');
        }
    }

    // Trigger AJAX when country dropdown changes
    $('#country').on('change', function() {
        var countryId = $(this).val();
        loadStates(countryId);
    });

    // If in edit mode, pre-select the country and load the states
    if (selectedCountry) {
        loadStates(selectedCountry, selectedState); // Load states and select the correct state
    }
});


</script>

</body>

</html>