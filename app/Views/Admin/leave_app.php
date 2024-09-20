<?php include __DIR__.'/../Admin/header.php'; ?>



<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Create Access Level Employee</h4>
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="pills-home1">Leave Application</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="pills-profile1">Apply For Leave</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <!-- Employee List Tab -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <?php if (empty($leave_requests)): ?>
                                        <p>No leave requests received.</p>
                                    <?php else: ?>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Apllication Date</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>
                                                    <th>Rejoining Date</th>
                                                    <th>Reason</th>
                                                    <th>Handover Employee Name</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php 
                                                    // echo "<pre>";print_r($leave_app);exit();
                                                foreach ($leave_requests as $request): ?>
                                                    <tr>
                                                   
                                                        <td><?php echo $counter; ?></td>
                                                        <td>
                                                            <form action="<?php echo base_url('leave_result'); ?>" method="post" style="display: flex; gap: 10px;">
                                                                <input type="hidden" name="leave_id" value="<?php echo $request->id; ?>">
                                                                <button type="submit" class="btn btn-success" name="action" value="A" title="Approve">
                                                                    <i class="fa fa-check-circle"></i> 
                                                                </button>
                                                                <button type="submit" class="btn btn-danger" name="action" value="R" title="Decline">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $request->applicant_name; ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->created_at)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->from_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->to_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->rejoining_date)); ?></td>
                                                        <td><?php echo $request->reason; ?></td>
                                                        <td><?php echo $request->handler_name; ?></td>
                                                        
                                                    </tr>
                                                <?php $counter++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>

                            <!-- Add Employee Tab -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Leave Form</h3>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                    <?php if (empty($allLeaveRequests)): ?>
                                        <p>No leave requests received.</p>
                                    <?php else: 
                                        // print_r($allLeaveRequests);?>
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Status</th>

                                                    <th>Name</th>
                                                    <th>Apllication Date</th>

                                                    <th>From Date</th>
                                                    <th>To Date</th>
                                                    <th>Rejoining Date</th>
                                                    <th>Reason</th>
                                                    <th>Handover Employee Name</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($allLeaveRequests as $request): ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td>
                                                            <?php 
                                                                $statusLabel = '';
                                                                switch ($request->Status) {
                                                                    case 'A':
                                                                        $statusLabel = 'Approved'; ?>
                                                                        <small class="badge badge-success"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'P':
                                                                        $statusLabel = 'Pending';?>
                                                                        <small class="badge badge-warning"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'R':
                                                                        $statusLabel = 'Rejected'; ?>
                                                                        <small class="badge badge-danger"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    // Add more cases if needed
                                                                }?>
                                                             
                                                            
                                                        </td>
                                                        <td><?php echo $request->applicant_name; ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->created_at)); ?></td>

                                                        <td><?php echo date('d F Y', strtotime($request->from_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->to_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->rejoining_date)); ?></td>
                                                        <td><?php echo $request->reason; ?></td>
                                                        <td><?php echo $request->handler_name; ?></td>

                                                        
                                                    </tr>
                                                <?php $counter++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
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
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>
