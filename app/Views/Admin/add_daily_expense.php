<?php include __DIR__.'/../Admin/header.php'; ?>
<style>
    .invoice-fields .field-title {
    font-weight: 600;
    font-size: 16px;
    color: #1b2559;
    margin-bottom: 15px;
}
.invoice-total-card .invoice-total-title {
    font-weight: 600;
    font-size: 16px;
    color: #1b2559;
    margin-bottom: 15px;
}
.field-box {
    padding: 15px;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
}
.invoice-total-inner {
    padding: 15px;
}

.field-box p {
    font-weight: 500;
    font-size: 14px;
    color: #1b2559;
    margin-bottom: 10px;
}

.faq-tab .panel-title {
    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    padding: 10px 20px;
    margin-bottom: 0px;
    position: relative;
}
.invoice-faq .faq-tab {
    padding-top: 10px;
}
.invoice-total-box p {
    color: #1b2559;
    margin-bottom: 20px;
    position: relative;
}
.invoice-total-box p span {
    float: right;
}
.invoice-total-footer h4 {
    font-size: 20px;
    margin-bottom: 0;
    color: #7638ff;
}
.invoices-form .form-control {
    height: 50px;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef ;
    opacity: 1;
}
.faq-tab .panel-title {
    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    padding: 10px 20px;
    margin-bottom: 0px;
    position: relative;
}

.bank-details .modal-header {
    border: 0;
    justify-content: space-between;
    padding: 30px;
    align-items: center;
    display: flex;
    border-bottom: 1px solid #e5e5e5;
}
.bank-details .close {
    color: #1b2559;
    font-size: 28px;
    line-height: normal;
}
.bank-details .close {
    background: transparent;
    border: 0;
    color: #1b2559;
    font-size: 28px;
    line-height: normal;
    top: 20px;
    width: auto;
    height: auto;
    right: 20px;
}

.bank-details-btn .bank-cancel-btn {
    background: var(--bs-primary);
}

.bank-details-btn .btn {
    min-width: 160px;
    border-radius: 8px;
    padding: 10px 0;
    color: #fff;
}

.bank-details .modal-body {
    padding-bottom: 10px;
    border-bottom: 1px solid #e5e5e5;
}
.custom-modal .modal-body {
    padding: 30px;
}
.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 1rem;
}

.bank-inner-details label {
    margin-bottom: 10px;
}
.bank-details .bank-inner-details label {
    font-size: 16px;
    font-weight: 600;
    color: #1b2559;
}

.bank-details .bank-inner-details .form-control {
    height: 50px;
}

.invoices-form .form-control {
    height: 50px;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
}

.service-upload input[type="file"] {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

input[type="file"] {
    height: auto;
    min-height: calc(1.5em + 0.75rem + 2px);
}

.service-upload {
    border: 2px dashed #e5e5e5;
    text-align: center;
    padding: 12px 0;
    background-color: #fff;
    position: relative;
}

.table>:not(caption)>*>* {
    padding: 5px !important;
}

.bg-success-light {
    background-color: rgba(15, 183, 107, 0.12) !important;
    color: #26af48 !important;
}

.bg-warning-light {
    background-color: rgba(255, 152, 0, 0.12) !important;
    color: #f39c12 !important;
}

.bg-danger-light {
    background-color: rgb(255 218 218 / 49%) !important;
    color: #ff0000 !important;
}


</style>
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

                    <h4 class="card-title mb-0" id="form-title">Add Daily Expenses</h4>

                  

                </div>
                <div class="card-body">
                    <div class="bd-example">
                    <?php
                        // Check if the URL contains 'edit_daily_expenses'
                        $currentUrl = $_SERVER['REQUEST_URI'];
                        $showForm = (strpos($currentUrl, '/edit_daily_expenses') !== false);
                        ?>

                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo !$showForm ? 'active' : ''; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="<?php echo !$showForm ? 'true' : 'false'; ?>">
                                    Daily Expenses List
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $showForm ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="<?php echo $showForm ? 'true' : 'false'; ?>">
                                    Add Daily Expenses
                                </button>
                            </li>
                        </ul>



                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show <?php echo !$showForm ? 'show active' : ''; ?>" id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab1">
                                <div class="card">
                                    

                                
                                  
                                    <div class="table-responsive">
                                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                            <thead class="thead-light">
                                                <tr>
                                                   <th>Sr.No</th>
                                                  
                                                   <?php  
                                                        if($role== 'Admin'){

                                                    ?>
                                                        <th>Branch Name</th>
                                                    <?php } ?>
                                                    <th>Bill No.</th>

                                                   <th>Bill Date</th>
                                                   <th>Vendor name</th>
                                                   <th>Total Amount </th>



                                                   <th>Approval Status</th>
                                                
                                                 
                                                   <th>Payment Status</th>
                                                   <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <?php  
                                                if($role== 'Admin'){

                                            ?>
                                            <tbody>
                                           
                                                <?php if(!empty($getDatas)){
                                                    // echo "<pre>";print_r($getDatas);exit();
                                                    $i=1;
                                                foreach($getDatas as $data){
                                                ?>
                                                <?php if(service('uri')->getSegment(2) == 'invoices'){ ?>
                                                    <tr <?php if ($data->approval_status == 'Reject'){ echo 'class="text-danger"';}else if($data->approval_status == 'Approve'){ echo 'class="text-success"';}else{ echo 'class="text-primary"';}  ?>>
                                                    <?php }else{ ?>
                                                        <tr>
                                                    <?php } ?>
                                                    <td>
                                                
                                                        <?=$i;?>
                                                    </td>
                                                   
                                                    <td>
                                                      <?=$data->branchname; ?>
                                                    </td>
                                                    <td>
                                                      <?=$data->bill_no; ?>
                                                    </td>
                        
                                                    <td>
                                                    <?=$data->bill_date; ?>
                                                    </td>
                                                    <td ><?=$data->vendorname; ?></td>
                                                    <!-- <td> <?=$data->totalamounttotal; ?></td> -->
                                                    <td> <?=$data->totalAmountWithtax; ?></td>
                                                  
                                                    
                                                        <?php if((service('uri')->getSegment(2) == 'pending_approval_invoices')){ ?>
                                                    <td>   
                                                                                <form id="approvalForm row" method="post" action="<?=base_url(); ?>/Invoice_controller/update_approval_status" >
                                                                                <div class="form-group col-md-12">
                                                                                    <input type="hidden" name="id" value="<?=$data['id']; ?>"/>
                                                                                    <select name="approval_status" id="approval_status"  class="approval_status form-select" aria-label="Default select example" style="width:auto" >
                                                                                        <option> Please Select Approval Status</option>
                                                                                        <option value="Approve" <?php echo ($data['approval_status'] == 'Approve') ? 'selected' : ''; ?>>Approve</option>
                                                                                        <option value="Onhold" <?php echo ($data['approval_status'] == 'Onhold') ? 'selected' : ''; ?>>Onhold</option>
                                                                                        <option value="Reject" <?php echo ($data['approval_status'] == 'Reject') ? 'selected' : ''; ?>>Reject</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="approvalstatus col-md-12  form-group " style="display:none">
                                                                                    <label>Resone For Approval Status</label><br>
                                                                                <input type="text"  name="resone_of_approval_status" value="<?php echo $data['resone_of_approval_status'];  ?>"  class="form-control"/>
                                                                                </div>
                                                                                <div class="form-group">

                                                                                    <input type="submit"  name="submit" value="submit" class="btn btn-primary"/>
                                                                                </div>
                                                                                    </form>
                                                    
                                                    </td>
                                                        <?php }else{ ?>
                                                            <td> <?=$data->approval_status; ?></td>

                                                            <?php } ?>
                                                            <td>
                                                                <?php if($data->bill_status == 'Paid'){ ?>    
                                                                    <span class="badge bg-success-light"><?=$data->bill_status; ?></span>
                                                                <?php }elseif($data->bill_status == 'Overdue'){ ?>
                                                                    <span class="badge bg-danger-light"><?=$data->bill_status; ?></span>
                                                                <?php }elseif($data->bill_status == 'Due'){ ?>
                                                                    <span class="badge bg-warning-light"><?=$data->bill_status; ?></span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                            <a href="<?=base_url(); ?>edit_daily_expenses/<?=$data->id ?>"><i class="far fa-edit me-2"></i></a>
                                                            <a href="<?=base_url(); ?>delete_compan/<?=$data->id ?>/tbl_daily_expenses" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                            <a target="_blank"  href="<?=base_url(); ?>/<?=$data->bill_photo; ?>"   > <i class="far fa-eye  me-2"></i> 

                                                        </td>
                                                   
                                                          
                                                </tr>
                                                <?php $i++;}} ?>
                                    
                                       
                                            </tbody>
                                            <?php }else{ ?>
                                                <?php if(service('uri')->getSegment(2) == 'invoices'){ ?>
                                                    <tbody>
                                            
                                                        <?php if(!empty($getDatas_login_wise)){
                                                            // echo "<pre>";print_r($getDatas_login_wise);exit();
                                                                $i=1;
                                                            foreach($getDatas_login_wise as $data){
                                                        ?>
                                                            <?php if(service('uri')->getSegment(2) == 'invoices'){ ?>
                                                                <tr <?php if ($data['approval_status'] == 'Reject'){ echo 'class="text-danger"';}else if($data['approval_status'] == 'Approve'){ echo 'class="text-success"';}else{ echo 'class="text-primary"';}  ?>> <?php }else{ ?> <tr> <?php } ?>                                                        
                                                                    <td><label class="custom_check"><?=$i;?></td>
                                                                    <td><?=$data['bill_no']; ?></td>
                                                                    <td><?=$data['bill_date']; ?></td>
                                                                    <td ><?=$data['vendor_name']; ?></td>
                                                                    <td> <?=$data['totalAmountWithtax']; ?></td>
                                                                    <td> <?=$data['approval_status']; ?></td>
                                                                    <td>
                                                                        <?php if($data['bill_status'] == 'Paid'){ ?>    
                                                                            <span class="badge bg-success-light"><?=$data['bill_status']; ?></span>
                                                                        <?php }elseif($data['bill_status'] == 'Overdue'){ ?>
                                                                            <span class="badge bg-danger-light"><?=$data['bill_status']; ?></span>
                                                                        <?php }elseif($data['bill_status'] == 'Due'){ ?>
                                                                            <span class="badge bg-warning-light"><?=$data['bill_status']; ?></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <div class="dropdown dropdown-action">
                                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Invoice_controller/edit_invoice/<?php echo base64_encode($data['id']); ?>"><i class="far fa-edit me-2"></i>Edit</a>
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Invoice_controller/view_invoice/<?php echo base64_encode($data['id']); ?>"><i class="far fa-eye me-2"></i>View</a>
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Home/delete/<?php echo base64_encode($data['id']); ?>/tbl_invoice"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                                                <a class="dropdown-item invoices-preview-link" href="#" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('<?=base_url(); ?>/<?=$data['bill_photo']; ?>')" > <i class="fe fe-eye  me-2"></i> Show Bill

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        <?php $i++;}} ?>


                                                    </tbody>
                                                <?php }else if(service('uri')->getSegment(2) == 'Paid' || service('uri')->getSegment(2) == 'Due' || service('uri')->getSegment(2) == 'Overdue' || service('uri')->getSegment(2) == 'pending_approval_invoices' || service('uri')->getSegment(2) == 'approve_invoices' || service('uri')->getSegment(2) == 'onhold_invoice' || service('uri')->getSegment(2) == 'reject_invoice'){ ?>
                                                    <tbody>
                                            
                                                        <?php if(!empty($getDatas)){
                                                            // echo "<pre>";print_r($getDatas_login_wise);exit();
                                                                $i=1;
                                                            foreach($getDatas as $data){
                                                        ?>
                                                            <?php if(service('uri')->getSegment(2) == 'invoices'){ ?>
                                                                <tr <?php if ($data['approval_status'] == 'Reject'){ echo 'class="text-danger"';}else if($data['approval_status'] == 'Approve'){ echo 'class="text-success"';}else{ echo 'class="text-primary"';}  ?>> <?php }else{ ?> <tr> <?php } ?>                                                        
                                                                    <td><label class="custom_check"><?=$i;?></td>
                                                                    <td><?=$data['bill_no']; ?></td>
                                                                    <td><?=$data['bill_date']; ?></td>
                                                                    <td ><?=$data['vendor_name']; ?></td>
                                                                    <td> <?=$data['totalAmountWithtax']; ?></td>
                                                                    <td> <?=$data['approval_status']; ?></td>
                                                                    <td>
                                                                        <?php if($data['bill_status'] == 'Paid'){ ?>    
                                                                            <span class="badge bg-success-light"><?=$data['bill_status']; ?></span>
                                                                        <?php }elseif($data['bill_status'] == 'Overdue'){ ?>
                                                                            <span class="badge bg-danger-light"><?=$data['bill_status']; ?></span>
                                                                        <?php }elseif($data['bill_status'] == 'Due'){ ?>
                                                                            <span class="badge bg-warning-light"><?=$data['bill_status']; ?></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <div class="dropdown dropdown-action">
                                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Invoice_controller/edit_invoice/<?php echo base64_encode($data['id']); ?>"><i class="far fa-edit me-2"></i>Edit</a>
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Invoice_controller/view_invoice/<?php echo base64_encode($data['id']); ?>"><i class="far fa-eye me-2"></i>View</a>
                                                                                <a class="dropdown-item" href="<?=base_url(); ?>/Home/delete/<?php echo base64_encode($data['id']); ?>/tbl_invoice"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                                                <a class="dropdown-item invoices-preview-link" href="#" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('<?=base_url(); ?>/<?=$data['bill_photo']; ?>')" > <i class="fe fe-eye  me-2"></i> Show Bill

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        <?php $i++;}} ?>


                                                    </tbody>
                                                <?php } ?>
                                            <?php } ?>

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
                                            <form class="row " id="invoice_form" action="<?= base_url('set_invoice_data'); ?>" method="post" enctype="multipart/form-data" novalidate>


                                                <input type="hidden" id="invoice_id " name="id" value="<?php if(!empty($single_data)){ echo $single_data->id; } ?>">



                                                <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
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
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label>Vendor Name</label>
                                                        <input class="form-control" type="hidden"  name="id" value="<?php if(!empty($single_data)) {echo $single_data->id; } ?>">
                                                        <input type="hidden" id="bank_name" name="bank_name" value="<?php if(!empty($single_data)){ echo $single_data->bank_name; } ?>">
                                                        <input type="hidden" id="bank_holder_name" name="bank_holder_name" value="<?php if(!empty($single_data)){ echo $single_data->bank_holder_name; } ?>">
                                                        <input type="hidden" id="ifsc_code" name="ifsc_code" value="<?php if(!empty($single_data)){ echo $single_data->ifsc_code; } ?>">
                                                        <input type="hidden" id="branch_name" name="branch_name" value="<?php if(!empty($single_data)){ echo $single_data->branch_name; } ?>">
                                                        <input type="hidden" id="upi_id" name="upi_id" value="<?php if(!empty($single_data)){ echo $single_data->upi_id; } ?>">
                                                        <input type="hidden" id="mobile_no" name="mobile_no" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no; } ?>">

                                                        <input type="hidden" id="created_on" name="created_on" value="<?php if(!empty($single_data)){ echo $single_data->created_on; } ?>">

                                                        <input type="hidden" id="created_by" name="created_by"  value="<?=session()->get('user_id') ?>" >
                                                        <div class="multipleSelection">
                                                            <select name="vendor_id" id="vendor_id"  class="form-select" >
                                                                <option>Please Select Vendor Type</option>
                                                                <?php if(!empty($vendor_data)) { ?>
                                                                <?php foreach ($vendor_data as $data): ?>

                                                                    <option value="<?= $data->id; ?>" 
                                                                        <?php if(!empty($single_data) && $single_data->vendor_id == $data->id) { echo 'selected'; } ?>>
                                                                        <?= $data->vendor_name; ?>
                                                                    </option>
                                                                   
                                                                <?php endforeach; ?>
                                                                <?php } ?>

                                                            </select>   
                                                        </div>
                                                    </div>
                                                  
                                                </div>

                                               
                                                <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                                                  <div class="form-group">
                                                      <label>GST No</label>
                                                      <input class="form-control " type="text" placeholder="" id="gst_no" name="gst_no" id="gst_no" value="<?php if(!empty($single_data)){ echo $single_data->gst_no; } ?>">                                                 
                                                  </div>
                                                </div>

                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                  <div class="form-group">                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="4" cols="30" required><?php if(!empty($single_data)){ echo $single_data->address; } ?></textarea>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                      <label>Account Number</label>
                                                      <input class="form-control " type="text" placeholder="" id="account_number" name="account_number" value="<?php if(!empty($single_data)) { echo $single_data->account_number; } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                      <label>Bill No</label>
                                                      <input class="form-control " type="text" placeholder="" id="bill_no" name="bill_no" value="<?php if(!empty($single_data)) { echo $single_data->bill_no; } ?>">
                                                    </div>
                                                </div>


                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Bill Date</label>
                                                        <input type="date" id="bill_date" name="bill_date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php if(!empty($single_data)) { echo $single_data->bill_date; }else{ echo date('Y-m-d'); } ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label>Bill Due Date</label>
                                                      
                                                        <input class="form-control " id="bill_due_date" type="date" name="bill_due_date" value="<?php if(!empty($single_data)) { echo $single_data->bill_due_date; } ?>">
                                          
                                                    </div>     
                                                </div>

                                        
                                        

                                                <div class="col-xl-8 col-sm-4 col-12">
                                                    <div class="form-group">
                                                        <div class="radio row">
                                                            <label>Invoice / Bill type</label>
                                                            <br>
                                                            <label class="col-xl-6 col-sm-12 col-12">
                                                            <input type="radio" name="bill" class="bill" value="Bill With Tax" <?php if (!empty($single_data) && $single_data->bill == 'Bill With Tax') { echo 'checked'; } ?> > With Tax
                                                            </label>

                                                            <label class="col-xl-6 col-sm-12 col-12">
                                                                <input type="radio" name="bill" class="tax bill"  value="Bill Without Tax" <?php if (!empty($single_data) && $single_data->bill == 'Bill Without Tax') { echo 'checked'; } ?>> Without Tax
                                                            </label>

                                                            <label id="bill-error" class="error" for="bill"></label>  
                                                        </div>  
                                                     
                                                    </div>
                                              
                                              </div>
                                              <div class="col-xl-4 col-md-6 col-sm-12 col-12 tax_id">
                                                    <div class="form-group">
                                                        <label>Tax</label>
                                                        <select name="tax_id" id="tax_id"  class="form-select"  >
                                                            <option>Please Select Tax</option>
                                                            <?php foreach ($tax_data as $data): ?>
                                                                <option value="<?= $data->id; ?>" <?php if(!empty($single_data)) { echo $single_data->tax_id == $data->id ? 'selected="selected"' : ''; } ?>>
                                                                    <?= $data->tax; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                              
                                                <div class="invoice-add-table">
                                            <h4>Item Details   <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a></h4>
                                            <div class="table-responsive">
                                                <table class="table table-center add-table-items">
                                                    <thead>
                                                        <tr>
                                                            <th>Items</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Amount</th>
                                                            <th>Discount</th>
                                                            <th class="tax_column"></th> <!-- Note the added class here -->
                                                            <th class="tax_column1"></th>
                                                            <th class="tax_column2"></th>
                                                            <th class="tax_c">Tax Value</th>
                                                            <th>Total Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                        <?php if(empty($iteam)){
                                                                // echo "<pre>";print_r($iteam);exit();    
                                                    
                                                    
                                                        ?>    
                                                
                                                        
                                                    <tbody>
                                                        <tr class="add-row">
                                                            <td>
                                                                <input type="text" name="iteam[]" id="iteam_0" class="dynamic-items form-control">
                                                            </td>
                                                         
                                                            <td>
                                                                <input type="text" name="quantity[]" class="dynamic-quantity form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price[]" class="dynamic-price form-control">
                                                            </td>
                                                            <td >
                                                                <input type="text" name="amount_p[]"  class="dynamic-amount_p form-control" readonly >
                                                            </td>
                                                     
                                                            <td>
                                                                <input type="text" name="discount[]" class="dynamic-discount form-control">
                                                            </td>   
                                                            <td class="tax_column">
                                                            <input type="text" name="tax[]" class="tax_column dynamic-tax form-control ">

                                                            </td> 
                                                            <td class="tax_column1">
                                                            <input type="text" name="sgst[]" class="tax_column1 dynamic-sgst form-control ">

                                                            </td> 

                                                            <td class="tax_column2">
                                                            <input type="text" name="cgst[]" class="tax_column2 dynamic-cgst form-control ">

                                                            </td> 
                                                            <td class="tax_c">
                                                                <input type="text" name="tax_value[]"   class="dynamic-tax_value form-control" readonly >
                                                                <input type="hidden" name="sgst_value[]"    class="dynamic-sgst_value form-control" readonly >
                                                                <input type="hidden" name="cgst_value[]"    class="dynamic-cgst_value form-control" readonly >


                                                            </td>

                                                          
                                                            <td>
                                                                <input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly >
                                                            </td>
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam "><i class="fas fa-plus-circle"></i></a>  -->
                                                            <a href="javascript:void(0);" class="remove-btn"><i class="far fa-trash-alt me-2"></i></a>
                                                            </td>
                                                        </tr>  
                                                     
                                                    </tbody>
                                                        <?php }else{
                                                        // echo "<pre>";print_r($iteam);exit();    

                                                            foreach($iteam as $data){
                                                            ?>

                                                            <tr class="now add-row">
                                                                <td>
                                                                    <input type="text" name="iteam[]" value="<?=$data->iteam;?>" class="dynamic-items form-control">
                                                                </td>
                                                            
                                                                <td>
                                                                    <input type="text" name="quantity[]" value="<?=$data->quantity;?>" class="dynamic-quantity form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="price[]" value="<?=$data->price;?>" class="dynamic-price form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="amount_p[]"  value="<?=$data->amount;?>"  class="dynamic-amount_p form-control" readonly >
                                                                </td>
                                                            
                                                                <td>
                                                                    <input type="text" name="discount[]"  value="<?=$data->discount;?>" class="dynamic-discount form-control">
                                                                </td>   

                                                                <td class="tax_column">
                                                                <input type="text" name="tax[]" value="<?=$data->tax;?>" class="tax_column dynamic-tax form-control ">

                                                                </td> 
                                                                <td class="tax_column1">
                                                                <input type="text" name="sgst[]" value="<?=$data->sgst;?>" class="tax_column1 dynamic-sgst form-control ">

                                                                </td> 

                                                                <td class="tax_column2">
                                                                <input type="text" name="cgst[]" value="<?=$data->cgst;?>" class="tax_column2 dynamic-cgst form-control ">

                                                                </td> 
                                                                <td class="tax_c">
                                                                    <input type="text" name="tax_value[]"  value="<?=$data->tax_value;?>"  class="dynamic-tax_value form-control" readonly >
                                                                    <input type="hidden" name="sgst_value[]"  value="<?=$data->sgst_value;?>"    class="dynamic-sgst_value form-control" readonly >
                                                                    <input type="hidden" name="cgst_value[]"  value="<?=$data->cgst_value;?>"    class="dynamic-cgst_value form-control" readonly >
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="total_amount[]"  value="<?=$data->total_amount;?>"  class="dynamic-total_amount form-control" readonly >
                                                                </td>
                                                            
                                                                <td class="add-remove text-end">
                                                                    <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a>  -->
                                                                <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="far fa-trash-alt me-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php }} ?>
                                                    <tbody class="dynamic_iteam"></tbody>
                                                    <tbody>
                                                    
                                                        <tr class="total_calculation">
                                                            <td  class="title">
                                                              Total
                                                            </td>
                                                                  
                                                            <td>
                                                                <input type="hidden" name="totalQuantity" id="totalQuantity" class="form-control" readonly >
                                                            </td>
                                                          
                                                            <td>
                                                                <input type="hidden" name="total_price" id="total_price" class="form-control" readonly >
                                                            </td>
                                                            <td>
                                                                <input type="text" name="totalamount" id="totalamount" class="form-control" readonly >
                                                            </td>
                                                   
                                                            <td> 
                                                                <input type="text" name="total_discount" id="total_discount" class="form-control" readonly >
                                                            </td> 
                                                            <td class="tax_column">
                                                            <input type="text" name="total_tax" id="total_tax"  class="form-control " readonly>

                                                            </td> 
                                                            <td class="tax_column1">
                                                            <input type="text" name="total_sgst" id="total_sgst" class=" form-control " readonly>

                                                            </td> 

                                                            <td class="tax_column2">
                                                            <input type="text" name="total_cgst" id="total_cgst"  class=" form-control " readonly>

                                                            </td> 
                                                            <td class="tax_c">
                                                            <input type="text" name="total_tax_value" id="total_tax_value"  class="form-control " readonly>

                                                            </td> 
                                                            <td> 
                                                                <input type="text" name="totalamounttotal" id="totalamounttotal" class="form-control" readonly >
                                                            </td>   
                                                           
                                                            <td class="add-remove text-end">

                                                            </td>
                                                    </tr>
                                                      
                                                    </tbody>
                                                </table>    

                                     
                                            </div>
                                    
                                        </div>  
                                                                        <hr>
                                                                        <div class="row">
                                            <div class="col-lg-7 col-md-6">
                                                <div class="invoice-fields">
                                                    <h4 class="field-title">More Fields</h4>
                                                    <div class="field-box">
                                                        <p>Attached Bill</p>
                                                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#bank_details"><i class="fas fa-plus-circle me-2"></i>Attached Bill</a>
                                                    </div>

                                                </div>
                                              
                                            </div>
                                            <div class="col-lg-5 col-md-6 field-box">
                                                <div class="invoice-total-card">
                                                    <h4 class="invoice-total-title">Summary</h4>
                                                    <div class="invoice-total-box">
                                                        <div class="invoice-total-inner">
                                                            <p><b>Sub Total</b> <span class="sub_total" id="subtotal"></span></p>
                                                            <p><b>Total Discount</b> <span class="total_d" id="total_d"></span></p>

                                                            <p class="tax_c "><b class="tax3"></b> <span class="tax2"></span></p>
                                                            <!-- <p class="tax_c "> <span class="tax2"></span></p> -->
                                                            <p class="tax_c cgst3"><b>CGST (%)</b><span class="cgst2"></span></p>
                                                            <p class="tax_c sgst3"><b>SGST (%)</b><span class="sgst2"></span></p>

                                                            <div class="links-info-one">
                                                                <div class="links-info">
                                                                    <div class="links-cont">
                                                                        <a href="#" class="service-trash">
                                                                            <i class="feather-trash-2"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         
                                                    
                                                        </div>
                                                        <div class="invoice-total-footer">
                                                            <h4>Total Amount <span class="totalAmountWithtax"></span></h4>
                                                        </div>
                                                        <input type="hidden" id="sgst2" name="sgst2" >
                                                        <input type="hidden" id="cgst2" name="cgst2" >
                                                        <input type="hidden" id="tax2" name="tax2" >

                                                        <input type="hidden" id="totalAmountWithtax1" name="totalAmountWithtax" >
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </div>

                                        <div class="row">
                                         
                                            <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
                                            <div class="invoice-total-footer">
                                                            <h4> Total Amount In Words: </h4>
                                                        </div>
                                                <div class="form-group">
                                                    <input type="text" name="totalamount_in_words" id="totalamount_in_words" class="totalamount_in_words form-control " readonly>
                                            
                                                </div>
                                            </div> 
                                        
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                
                                                
                                                <div class="form-group">
                                                    <label>Payment Status</label>
                                                    <select name="billstatus" id="bill_status1"  class="form-select" >
                                                        <option> Please Select Status</option>
                                                        <option value="Paid" <?php echo (!empty($single_data) && $single_data->bill_status == 'Paid') ? 'selected' : ''; ?>>Paid</option>
                                                        <option value="Due" <?php echo (!empty($single_data) && $single_data->bill_status == 'Due') ? 'selected' : ''; ?>>Due</option>
                                                        <option value="Overdue" <?php echo (!empty($single_data) && $single_data->bill_status == 'Overdue') ? 'selected' : ''; ?>>Overdue</option>
                                                    </select>
                                                    

                                                </div> 
                    
                                            </div>
                        
                                        </div>
                                        <div class="upload-sign">
                                            <div class="form-group float-end mb-4">
                                                <!-- <button class="btn btn-primary" type="button" name="edit" value="edit">Edit</button> -->
                                                <!-- <a class="invoices-preview-link btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#invoices_preview"> Preview</a> -->
                                                <button type="submit" class="btn btn-primary" id="submitButton" fdprocessedid="kfvm5q">Save</button>
                                            </div>
                                        </div>
                                        <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="form-header text-start mb-0">
                                                            <h4 class="mb-0">Add Attached Bill</h4>
                                                        </div>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="bank-inner-details">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name </label>
                                                                        <input type="text" class="form-control" name="name_of_person" value="<?php if(!empty($single_data)) { echo $single_data->name_of_person; } ?>" placeholder="Name of the person who is entering the bill">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label> Attached Bill</label>
                                                                    <div class="form-group service-upload">
                                                                        <span>Attached Bill</span>
                                                                        <input type="file" id="bill_photo" name="bill_photo" />
                                                                        <input type="hidden" name="hidden_bill_photo" id="hidden_bill_photo" value="<?php if(!empty($single_data)) { echo $single_data->bill_photo; } ?>">
                                                                    </div>
                                                                </div>
                                                                <div  class="col-lg-12 col-md-12">
                                                                <?php if (!empty($single_data)){ ?>
                                                                    <img  id="old_bill_photo" src="<?=base_url();?>/<?=$single_data->bill_photo; ?>" style="max-width: 200px;" />

                                                                    <?php } ?>
                                                                <img id="selectedImage" src="#" alt="Selected Bill Photo" style="display:none; max-width: 200px;" />
                                                             
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="bank-details-btn">
                                                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                                                            <!-- <a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                                
                                    </form>

                                </div>
                                                                    </div>
                                                        </div>

                                            

                                                    
                                            </div>
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
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/number-to-words@1.2.4/numberToWords.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


<script>



$(document).ready(function() {
    // Add event listener for dynamically added elements



   
    $(document).on('input', '#bill_status1, #bill_date, #bill_due_date, #notes, #terms_and_condition, #bank_name, #bank_holder_name, #ifsc_code, #branch_name, #upi_id, #mobile_no, .dynamic-items, .dynamic-quantity, .dynamic-price, .dynamic-amount_p, .dynamic-discount, .dynamic-total_amount, .bill', function() {
            updatePreview();
            set_bill_type();
        });
        


    // Function to update the preview section
    function updatePreview() {
        var previewContent = '';
        var vendorName = $('#vendor_id option:selected').text();
        var address = $('#address').val();
        var billNo = $('#bill_no').val();
        var gstNo = $('#gst_no').val();

        var created_on = $('#created_on').val();
        var bill_status = $('#bill_status1').val();


        var bill_date = $('#bill_date').val();
        var bill_due_date = $('#bill_due_date').val();
        var notes = $('#notes').val();

        
        // var notes = $('#notes').val();
        var combinedValue = 'Notes: ' + notes;

        var terms_and_condition = $('#terms_and_condition').val();

       

   
        var totalQuantity = $('#totalQuantity').val();
        var total_price = $('#total_price').val();
        var totalamount = $('#totalamount').val();
        var total_discount = $('#total_discount').val();
        console.log(total_discount);
        var totalamounttotal = $('#totalamounttotal').val();
        var totalamount_in_words = $('#totalamount_in_words').val();


        var bank_name = $('#bank_name').val();
        // alert(vendorName);
        var bank_holder_name = $('#bank_holder_name').val();
        var ifsc_code = $('#ifsc_code').val();
        var branch_name = $('#branch_name').val();

        // console.log(bank_name);
        var upi_id = $('#upi_id').val();
        var mobile_no = $('#mobile_no').val();
    
        // Update preview
        $('#preview_vendor_name').text(vendorName);
        $('#preview_address').text(address);
 
        $('#preview_bill_no').text(billNo);
        $('#preview_gst_no').text(gstNo);

        // $('#preview_totalQuantity').text(totalQuantity);
        // $('#preview_total_price').text(total_price);
        $('#preview_totalamount').text(totalamount);
        // $('#preview_total_discount').text(total_discount);
        $('#preview_totalamounttotal').text(totalamounttotal);
        $('#preview_totalamount_in_words').text(totalamount_in_words);

        $('#preview_created_on').text(created_on);
        $('#preview_bill_status').text(bill_status);

 


        $('#p_discount').text(total_discount);
        $('#p_totalamouttotal').text(totalamounttotal);
        $('#sub_p_totalamouttotal').text(totalamounttotal);


        $('#preview_bank_name').text(bank_name);
        $('#preview_bank_holder_name').text(bank_holder_name);
        $('#preview_ifsc_code').text(ifsc_code);
        $('#preview_branch_name').text(branch_name);
        $('#preview_upi_id').text(upi_id);
        $('#preview_mobile_no').text(mobile_no);

        $('#preview_bill_date').text(bill_date);
        $('#preview_bill_due_date').text(bill_due_date);
        $('#preview_notes').text(notes);

        $('#preview_terms_and_condition').text(terms_and_condition);

        var bill = $('input[name="bill"]:checked').val();


        // Iterate through each dynamic row
        $('.add-row').each(function(index) {
            var item = $(this).find('.dynamic-items').val();
            var quantity = $(this).find('.dynamic-quantity').val();
            var price = $(this).find('.dynamic-price').val();
            var amount = $(this).find('.dynamic-amount_p').val();
            var discount = $(this).find('.dynamic-discount').val();
            var tax1 = $(this).find('.dynamic-tax').val();
            var sgst1 = $(this).find('.dynamic-sgst').val();
            var cgst1 = $(this).find('.dynamic-cgst').val();


            var totalAmount = $(this).find('.dynamic-total_amount').val();

          


            // Construct the HTML content for each row
     
            var rowContent = '<tr>' +
                '<td>' + item + '</td>' +
                '<td>' + quantity + '</td>' +
                '<td>' + price + '</td>' +
                '<td>' + amount + '</td>' +
                '<td>' + discount + '</td>' +
                '<td class="tax_column">' + tax1 + '</td>' +
                '<td class="tax_column1">' + sgst1 + '</td>' +
                '<td class="tax_column2">' + cgst1 + '</td>' +
                '<td >' + totalAmount + '</td>' +
                '</tr>';

           
            previewContent += rowContent;
        });
        // console.log(previewContent);

        // Update the preview section with the generated content
        $('#preview-item').html(previewContent);
        console.log(previewContent);
    }

    updatePreview();
    set_bill_type();


        $(document).on('input', '.dynamic-items, #bill_status1, #bill_date, #bill_due_date, #notes, #terms_and_condition, #bank_name, #bank_holder_name, #ifsc_code, #branch_name, #upi_id, #mobile_no, .dynamic-quantity, .dynamic-price, .dynamic-amount_p, .dynamic-discount, .dynamic-total_amount, .bill', function() {
            updatePreview();
            set_bill_type();
        });

        function set_bill_type() {
    $('input[name="bill"]').change(function() {
        console.log('bill type changed');
        if ($(this).val() === "Bill Without Tax") {
            // Hide the tax input field
            console.log('Hiding tax field');
            $('.tax_c').hide();
            $('.tax_id').hide();
            $('.tax_column').hide();
            $('.tax_column1').hide();
            $('.tax_column2').hide();
            $("#tax_id").prop("disabled", true);

            // Set tax value to 0
            $('input[name="tax"]').val('0');
        } else {
            // Show the tax input field
            console.log('Showing tax field');
            $('.tax_c').show();
            $('.tax_id').show();
            $('.tax_column').show();
            $('.tax_column1').show();
            $('.tax_column2').show();
            $("#tax_id").prop("disabled", false);
        }
    });
}



    // Trigger the change event manually if "Bill Without Tax" is already selected
    if ($('input[name="bill"]:checked').val() === "Bill Without Tax") {
        $('input[name="bill"]').trigger('change');
       
    }



});


//     // Trigger the updatePreview function on input change
    // $('#vendor_id, #totalQuantity, #created_on, #bill_status, #bill_date, #bill_due_date, #notes, #terms_and_condition, #total_price, #bank_name, #bank_holder_name, #ifsc_code, #branch_name, #upi_id, #mobile_no, #totalamount, #total_tax, #total_discount, #totalamounttotal, #totalamount_in_words, #address, #bill_no, #gst_no .dynamic-items .dynamic-quantity .dynamic-price .dynamic-amount_p .dynamic-tax .dynamic-discount .dynamic-total_amount').on('input', function() {
    //     updatePreview();
    // });



    

</script>


<script>
$.validator.addMethod('gstNumber', function(value, element) {
    // GST number format: 2 numeric digits followed by 10 alphanumeric characters
    return /^[0-9]{2}[A-Z0-9]{10}$/.test(value);
}, 'Please enter a valid GST number (e.g., 12ABCDE3456F)');

$(document).ready(function() {
    $('#form').validate({
        rules: {
            vendor_id: {
                required: true,
            },
            address: {
                required: true,
            },
            date : {
                required : true,
            },
            gst_no: {
                gstNumber:true,
            },
            bill:{
                required : true,
            },
            "iteam[]": {
                    required: true,
            },
            "quantity[]": {
                    required: true,
                    number: true,
            },
            "price[]": {
                    required: true,
                    number: true,
            },
            "tax[]": {
                    number: true,
            },
            "discount[]": {
                    number: true,
            },
          
            
            
        },
        messages: {
            vendor_id: {
                required: 'Please select vendor name.',
            },
            address: {
                required: 'Please enter your address.',
            },
            date : {
                required : 'Please enter date.',
            },
            gst_no: {
                gstNumber: 'Please enter a valid GST number (e.g., 12ABCDE3456F)'
            },
            bill : {
                required : 'Please select what type bill do you want with tax or without tax bill',
            },
            "iteam[]": {
                required: 'Please enter iteam.',
            },
            "quantity[]": {
                required: 'Please enter quantity.',
                number: 'Please enter only numbers.',
            },
            "price[]": {
                required: 'Please enter price.',
                number: 'Please enter only numbers.',
            },
            "tax[]": {
                number: 'Please enter only numbers.',
            },
            "discount[]": {
                number: 'Please enter only numbers.',
            },
           
        }
    });
  
});


</script>



<script>


$(document).on("change", ".add-row input[type='text'], #cgst, #sgst , #tax", function () {
    var row = $(this).closest(".add-row");
    var discount = 0;
    var tax_data = 0;
    var cgst_data = 0;
    var sgst_data = 0;
    var totalAmountWithtax = 0;
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    tax_data = parseFloat(row.find("input[name='tax[]']").val()) || 0;
    cgst_data = parseFloat(row.find("input[name='cgst[]']").val()) || 0;
    sgst_data = parseFloat(row.find("input[name='sgst[]']").val()) || 0;
   
 

    var amount = quantity * price;
    var totalAmountWithDiscount = amount - discount;

    var total_amount = 0;


    var tax_value = totalAmountWithDiscount * (tax_data / 100);
    var cgst_value = totalAmountWithDiscount * (cgst_data / 100);
    var sgst_value = totalAmountWithDiscount * (sgst_data / 100);
    //Add tax to total amount
    var totalcgstigst = cgst_value + sgst_value;
  
    totalAmountWithtax = totalAmountWithDiscount + tax_value + cgst_value + sgst_value;

    row.find("input[name='amount_p[]']").val(amount.toFixed(2));
    row.find("input[name='cgst_value[]']").val(cgst_value.toFixed(2));
    row.find("input[name='sgst_value[]']").val(sgst_value.toFixed(2));
    if(tax_value != ''){
    row.find("input[name='tax_value[]']").val(tax_value.toFixed(2));
    }else{
        row.find("input[name='tax_value[]']").val(totalcgstigst.toFixed(2));
    }
    
    row.find("input[name='total_amount[]']").val(totalAmountWithtax.toFixed(2));



    // Loop through all elements with the class .add-row
$(".add-row").each(function() {
    var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
    total_amount += totalAmount;
});

$(".totalAmountWithtax").text((total_amount).toFixed(2));

$("#totalAmountWithtax1").val((total_amount).toFixed(2));

var totalAmountTotalWords = numberToWords.toWords(total_amount);
$("input[name='totalamount_in_words']").val(totalAmountTotalWords);


    
    $(".preview_sgst2").text((tax_value).toFixed(2));
    $(".preview_cgst2").text((cgst_value).toFixed(2));
    $(".preview_igst2").text((sgst_value).toFixed(2));
    $(".preview_totalAmountWithtax").text((total_amount).toFixed(2));


    // $(".totalAmountWithtax").text((totalAmountWithtax).toFixed(2));

    // // $("#sgst2").val((csgst).toFixed(2));
    // // $("#cgst2").val((ccgst).toFixed(2));
    // // $("#igst2").val((cigst).toFixed(2));

    // $("#totalAmountWithtax1").val((totalAmountWithtax).toFixed(2));

    // var totalAmountTotalWords = numberToWords.toWords(totalAmountWithtax);
    // $("input[name='totalamount_in_words']").val(totalAmountTotalWords);
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
        $("input[name='total_tax_value']").val(totaltaxvalue.toFixed(2));

        $("input[name='total_tax']").val(totalTax.toFixed(2));
        $("input[name='total_sgst']").val(totalSGST.toFixed(2));
        $("input[name='total_cgst']").val((totalCGST).toFixed(2));
        $(".sub_total").text((totalAmount).toFixed(2));
        $(".total_d").text((totalDiscount).toFixed(2));

       
        // $(".cgst2").text((totalcgstvalue).toFixed(2));
        // $(".sgst2").text((totalsgstvalue).toFixed(2));
      
        // $("#cgst2").val((totalcgstvalue).toFixed(2));
        // $("#sgst2").val((totalsgstvalue).toFixed(2));

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
        $('.dynamic_iteam').append('<tr class="now add-row "><td><input type="text" name="iteam[]" id="iteam_'+ x +'"class="dynamic-items form-control"></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td><td ><input type="text" name="amount_p[]"  class="dynamic-amount_p form-control" readonly ></td> <td><input type="text" name="discount[]" class="dynamic-discount form-control"></td> <td class="tax_column"> <input type="text" name="tax[]" class="tax_column dynamic-tax form-control "></td><td class="tax_column1"> <input type="text" name="sgst[]" class="tax_column1 dynamic-sgst form-control "></td><td class="tax_column2"><input type="text" name="cgst[]" class="tax_column2 dynamic-cgst form-control "> </td>  <td class="tax_value[]"> <input type="text" name="tax_value[]" class="dynamic-tax_value form-control" readonly >  <input type="hidden" name="sgst_value[]"    class="dynamic-sgst_value form-control" readonly ><input type="hidden" name="cgst_value[]" class="dynamic-cgst_value form-control" readonly > </td> <td><input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly ></td><td class="add-remove text-end"> <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="far fa-trash-alt me-2"></i></a></td></tr>');
        
        if (isBillWithoutTaxChecked == true) {
              
            $('.tax_column, .tax_column1, .tax_column2').hide();
        }
        handleTaxChange();


        $('.btn_remove').on('click', function() {
            $(this).closest('.now').remove();
            calculateAndStoreTotals();
            handleTaxChange();
        });
    }

});
$('.btn_remove').on('click', function() {
    $(this).closest('.now').remove();
    calculateAndStoreTotals();
    handleTaxChange();
});





$('.dynamic_iteam').on('click', '.add_more_iteam', function(e) {
    $('.tax_column, .tax_column1, .tax_column2').hide();
    e.preventDefault();
    var max_fields = 5000;
    var x = 1;


    var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");

    if (x < max_fields) {
        x++;
        $('.dynamic_iteam').append('<tr class="now add-row "><td><input type="text"  name="iteam[]" id="iteam_' + x + '" class=" dynamic_items form-control"></td><td><input type="text" name="quantity[]" class="dynamic_quantity form-control"></td><td><input type="text" name="price[]" class="dynamic_price form-control"></td><td><input type="text" name="amount_p[]"  class="form-control"></td><td class="tax_c"><input type="text"  name="tax[]" class="form-control tax_cc"></td><td><input type="text" name="discount[]" class="form-control"></td><td><input type="text" name="total_amount[]"  class="form-control"></td><td class="add-remove text-end"><a href="javascript:void(0);" class="add_more_iteam add-btn me-2  "><i class="fas fa-plus-circle"></i></a> <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="far fa-trash-alt me-2"></i></a></td></tr>');

        if (isBillWithoutTaxChecked) {
            $('.tax_column, .tax_column1, .tax_column2').hide();

        }
        handleTaxChange();

     

        $('.btn_remove').on('click', function() {
            $(this).closest('.now').remove();
            calculateAndStoreTotals();
            handleTaxChange();
        });

  
    }
});

function handleTaxChange() {
    $('.tax_column, .tax_column1, .tax_column2').hide();

    var selectedTaxText = $('#tax_id option:selected').text();
    var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");

    if (isBillWithoutTaxChecked) {
        $('.tax_column, .tax_column1, .tax_column2').hide();
    } else {
        if ($('#tax_id').val() == '1') {
            $('.tax_column1').show();
            $('.tax_column2').show();
            $('.tax_column').hide();
            $('.tax_column').val('0');
            $('.tax3').val('0');
            $('.tax3').hide();
            $('.cgst3').show();
            $('.sgst3').show();
            $('#tax2').val('0');


            

            $('.invoice-add-table th.tax_column1').text('SGST (%)');
            $('.invoice-add-table th.tax_column2').text('CGST (%)');
        } else if ($('#tax_id').val() > '1') {
            $('.tax_column').show();
            $('.tax_column1').hide();
            $('.tax_column2').hide();
            $('.tax_column1').val('0');
            $('.tax_column2').val('0');
            $('.tax3').show();
            $('.cgst3').hide();
            $('.sgst3').hide();
            $('.cgst3').val('0');
            $('.sgst3').val('0');
   
            $('.tax3').text(selectedTaxText+'(%)');
            $('.invoice-add-table th.tax_column').text(selectedTaxText+'(%)');
        } else {
            $('.tax_column').hide();
        }
    }
}

$(document).ready(function() {
    $('.tax_column').hide();
    $('.tax_column1').hide();
    $('.tax_column2').hide();
    
    $('#tax_id,#bill').on('change', handleTaxChange);

    // Trigger the event manually
    $('#tax_id').change(); // This will call the change event handler
});
    





$(document).ready(function() {
    $('#vendor_id').change(function() {
        var vendorId = $(this).val();

        // Make an AJAX request to get the address and GST number
        $.ajax({
            url: '<?=base_url(); ?>get_vendor_By_Id', // Replace with the actual path
            method: 'POST',
            data: {vendor_id: vendorId},
            dataType: 'json',
          success: function(response) {
            console.log(response); // Check the response in the console
            $('#address').text(response.address);
            $('#gst_no').val(response.GST_no);

            $('#bank_name').val(response.bank_name);
            $('#bank_no').val(response.acc_no);
            $('#bank_holder_name').val(response.bank_holder_name);
            $('#ifsc_code').val(response.ifsc_code);
            $('#branch_name').val(response.branch_name);
            $('#upi_id').val(response.upi_id);
            $('#mobile_no').val(response.mobile_no);

            $('#created_on').val(response.created_on);
            // $('#bill_status').val(response.bill_status);


},

            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    $('#vendor_id').trigger('change');
});   




	});

</script>


<script>
$(document).ready(function() {
    $('#bill_date').change(function() {
        var bill_date = new Date($(this).val());
        var bill_due_date = new Date(bill_date);
        bill_due_date.setMonth(bill_due_date.getMonth()); // Add one month
        var formatted_due_date = bill_due_date.toISOString().slice(0,10); // Format as yyyy-mm-dd
        $('#bill_due_date').val(formatted_due_date);

        // Restricting due date selection
        $('#bill_due_date').attr('min', formatted_due_date);
    });

    // Only trigger the change event if not in edit mode
    <?php if (!isset($edit)) : ?>
        $('#bill_date').trigger('change');
    <?php endif; ?>
});


</script>


<script>


function refreshPage() {
    location.reload();
}
</script>

<script>
  
    $(document).ready(function() {
        $('#bill_photo').change(function() {
            var input = this;
            var image = $('#selectedImage');
            var reader = new FileReader();

            reader.onload = function() {
                image.attr('src', reader.result);
                image.css('display', 'block');

                $('#old_bill_photo').hide();
            }

            reader.readAsDataURL(input.files[0]);
        });
    });
</script>
