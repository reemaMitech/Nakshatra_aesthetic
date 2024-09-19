<?php include __DIR__.'/../Admin/header.php'; ?>
<?php
// Detect if URL contains 'edit_invoice'
$showForm = false;
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($current_url, 'edit_employee') !== false) {
    $showForm = true;
}
?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Reports</h4>
                    <!-- <button id="toggle-view" class="btn btn-warning">Employee List</button> -->
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo !$showForm ? 'active' : ''; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="<?php echo !$showForm ? 'true' : 'false'; ?>">Monthly Employee Attendance List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $showForm ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="<?php echo $showForm ? 'true' : 'false'; ?>">Add Employee</button>
                            </li>
                        </ul>

                        <div class="tab-content row" id="pills-tabContent">
                            <div class="col-12tab-pane fade show <?php echo !$showForm ? 'show active' : ''; ?>" id="pills-home1" role="tabpanel"
                                    aria-labelledby="pills-home-tab1">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">
                                            Attendance Report of <b><u><?php if (!empty($empdata)) { 
                                                echo $empdata->first_name . ' ' . $empdata->middle_name . ' ' . $empdata->last_name; 
                                            } ?></u></b> 
                                            for <?= date('F Y', strtotime($report['firstDayOfMonth'])) ?>
                                        </h5>

                                        <a href="<?= base_url(); ?>attendance" class="btn btn-info monthbtn">Current Month</a>
                                    </div>


                                    <?php 
                                    // echo $report['selectedMonth'];
                                    // echo "<pre>";print_r($empdata);exit();
                                    $empid = $report['emp_id'];
                                    ?>
                                    <!-- Month and Year Selection Form -->
                                    <form action="<?= base_url('showattendancei/' . $empid); ?>" method="post" class="mt-2">
                                        <div class="form-row align-items-center d-flex">
                                            <!-- Month Selection -->
                                            <div class="col-md-4 mb-0 p-3">
                                                <label for="month" class="form-label">Select Month</label>
                                                <select class="form-control" id="month" name="month">
                                                    <?php
                                                    $currentMonth = date('n'); // Get current month
                                                    for ($m = 1; $m <= 12; $m++) {
                                                        $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                                        $selected = ($m == $selectedMonth) ? 'selected' : '';
                                                        $selected = ($m == $currentMonth && !isset($selectedMonth)) ? 'selected' : $selected;
                                                        echo "<option value='$m' $selected>$monthName</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Year Selection -->
                                            <div class="col-md-4 mb-0 p-3">
                                                <label for="year" class="form-label">Select Year</label>
                                                <input type="number" class="form-control" id="year" name="year" value="<?= $selectedYear ?? date('Y'); ?>" min="2000" max="<?= date('Y'); ?>">
                                            </div>

                                       

                                            <div class="col-md-4 " style="padding: 2rem 1rem 0rem 1rem !important;">
                                                <button type="submit" class="btn btn-primary mb-0">View Attendance</button>
                                            </div>
                                        </div>
                                    </form>

                                   
                                            <div class="table-responsive">
                                                
                                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Punch In Time</th>
                                        <th>Punch Out Time</th>
                                        <th>Total Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalMonthSeconds = 0; // Initialize total seconds for the month

                                    if (!empty($report['attendace_data'])): ?>
                                        <?php foreach ($report['attendace_data'] as $date => $entries): ?>
                                            <?php foreach ($entries as $data): ?>
                                                <?php
                                                // Check if both punch in and punch out times are available
                                                if (isset($data['start_time']) && isset($data['end_time'])) {
                                                    $punchIn = strtotime($data['start_time']);
                                                    $punchOut = strtotime($data['end_time']);

                                                    // Calculate the difference in seconds
                                                    $timeDifference = $punchOut - $punchIn;

                                                    // Add to total month seconds
                                                    $totalMonthSeconds += $timeDifference;

                                                    // Convert to hours and minutes
                                                    $hours = floor($timeDifference / 3600);
                                                    $minutes = floor(($timeDifference % 3600) / 60);

                                                    $totalHours = sprintf("%02d:%02d", $hours, $minutes);
                                                } else {
                                                    $totalHours = 'N/A';
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= date('j F Y', strtotime($date)); ?></td>
                                                    <td><?= isset($data['start_time']) ? date('h:i A', strtotime($data['start_time'])) : 'N/A'; ?></td>
                                                    <td><?= isset($data['end_time']) ? date('h:i A', strtotime($data['end_time'])) : 'N/A'; ?></td>
                                                    <td><?= $totalHours; ?></td> <!-- Display total hours -->
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">No attendance data available for this period.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
    <?php
    // Assuming $empdata->salaryfor8hour contains the salary for 8 hours
    $salaryFor8Hour = !empty($empdata->salaryfor8hour) ? $empdata->salaryfor8hour : 0;

    // Calculate 1 hour salary
    $oneHourSalary = $salaryFor8Hour / 8;

    // Initialize variables for days worked and total payment
    $totalMonthPayment = 0;
    $totalDaysWorked = 0;
    $roundedTotalHours = 0;

    // Check if applyot is 'no' (no overtime)
    if ($empdata->applyot == 'No') {
        // Calculate salary based on the number of days worked
        if (!empty($report['attendace_data'])) {
            foreach ($report['attendace_data'] as $date => $entries) {
                foreach ($entries as $data) {
                    // Count days with valid punch in/out times
                    if (isset($data['start_time']) && isset($data['end_time'])) {
                        $totalDaysWorked++;
                    }
                }
            }
        }

        // Calculate total payment based on the number of days worked (rounded)
        $totalMonthPayment = $totalDaysWorked * $salaryFor8Hour;
    } else {
        // If applyot is 'yes', calculate salary based on total hours worked

        // Convert total month seconds to hours and minutes
        $totalMonthHours = floor($totalMonthSeconds / 3600);
        $totalMonthMinutes = floor(($totalMonthSeconds % 3600) / 60);

        // Convert total time to decimal format for calculation (hours + fraction of an hour)
        $totalHoursInDecimal = $totalMonthHours + ($totalMonthMinutes / 60);

        // Round total hours to the nearest integer
        $roundedTotalHours = round($totalHoursInDecimal);

        // Calculate total payment based on rounded total hours
        $totalMonthPayment = $roundedTotalHours * $oneHourSalary;
    }
    ?>
    <tr>
        <?php if ($empdata->applyot == 'No'): ?>
            <td colspan="3"><strong>Total Days Worked for the Month</strong></td>
            <td><strong><?= $totalDaysWorked; ?> days</strong></td> <!-- Display total days worked -->
        <?php else: ?>
            <td colspan="3"><strong>Total Hours Worked for the Month</strong></td>
            <td><strong><?= $roundedTotalHours; ?> hours</strong></td> <!-- Display rounded total month hours -->
        <?php endif; ?>
    </tr>
    <tr>
        <td colspan="3"><strong>8 Hour Salary</strong></td>
        <td><strong>Rs. <?= number_format($empdata->salaryfor8hour, 2); ?></strong></td> <!-- Display 8-hour salary -->
    </tr>
    <tr>
        <td colspan="3"><strong>Total Payment for the Month</strong></td>
        <td><strong>Rs. <?= number_format($totalMonthPayment, 2); ?></strong></td> <!-- Display total month payment -->
    </tr>
</tfoot>



                            </table>


                                            </div>
                                      

                                        
                                    <!-- </div> -->
                                    <!-- End of Employee List -->
                            </div>
                                

                            <div class="tab-pane fade <?php echo $showForm ? 'show active' : ''; ?>" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <!-- Form for Adding/Editing Employee Access Level -->
                             
                                        <!-- End of Form -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>

