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
                                    <?php 
                                    if (empty($application)): ?>
                                    <p>No application found</p>
                                    <?php else: ?>
                                        <div class="table-responsive">

                                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Rejoining Date</th>
                                                <th>Status</th>
                                                <th>Application Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $counter = 1;
                                                foreach ($application as $app):
                                            ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo date('d F Y', strtotime($app->from_date)); ?></td>
                                                <td><?php echo date('d F Y', strtotime($app->to_date)); ?></td>
                                                <td><?php echo date('d F Y', strtotime($app->rejoining_date)); ?></td>
                                                <td>
                                                    <?php 
                                                    switch ($app->Status) {
                                                        case 'P':
                                                            echo '<span class="badge badge-warning">Pending</span>';
                                                            break;
                                                        case 'A':
                                                            echo '<span class="badge badge-success">Approved</span>';
                                                            break;
                                                        case 'R':
                                                            echo '<span class="badge badge-danger">Rejected</span>';
                                                            break;
                                                        default:
                                                            echo '';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo date('d F Y', strtotime($app->created_at)); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                                </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Add Employee Tab -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Leave Form</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?= site_url('leave-request') ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="from_date">From Date</label>
                                                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rejoining_date">Rejoining Date</label>
                                                        <input type="date" class="form-control" id="rejoining_date" name="rejoining_date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reason">Reason</label>
                                                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="For Ex. Holiday" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="to_date">To Date</label>
                                                        <input type="date" class="form-control" id="to_date" name="to_date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="employee_name">Task Handover To</label>
                                                        <select class="form-control" id="employee_id" name="hand_emp_id" required>
                                                            <option value="">Select Employee</option>
                                                            <?php foreach ($Employee as $employee): ?>
                                                            <option value="<?php echo $employee->id; ?>"><?php echo $employee->first_name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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
