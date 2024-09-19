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
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $showForm ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="<?php echo $showForm ? 'true' : 'false'; ?>">Add Employee</button>
                            </li> -->
                        </ul>

                        <div class="tab-content row" id="pills-tabContent">
                            <div class="col-12tab-pane fade show <?php echo !$showForm ? 'show active' : ''; ?>" id="pills-home1" role="tabpanel"
                                    aria-labelledby="pills-home-tab1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">
                                            Attendance Report of <b><u><?php if (!empty($empdata)) { echo $empdata->emp_name; } ?></u></b> 
                                            for <?= date('F Y', strtotime($report['firstDayOfMonth'])) ?>
                                        </h5>

                                        <a href="<?= base_url(); ?>attendance" class="btn btn-info monthbtn">Current Month</a>
                                    </div>

                                            <!-- Month and Year Selection Form -->
                                            <form action="<?= base_url('getallmonthdata') ?>" method="post" class="mt-2">
                                                <div class="form-row align-items-center d-flex">
                                                    <div class="col-md-4 p-3">
                                                        <label class="sr-only" for="month">Month</label>
                                                        <select class="form-control mb-0" id="month" name="month">
                                                            <?php
                                                            $currentMonth = date('n'); // Get current month
                                                            for ($m = 1; $m <= 12; $m++) {
                                                                $month = date('F', mktime(0, 0, 0, $m, 1));
                                                                $selected = (isset($selectedMonth) && $m == $selectedMonth) ? 'selected' : ''; // Check if $selectedMonth is set
                                                                $selected = ($m == $currentMonth && !isset($selectedMonth)) ? 'selected' : $selected; // Set current month as selected if $selectedMonth is not set
                                                                echo "<option value='$m' $selected>$month</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 p-3">
                                                        <label class="sr-only" for="year">Year</label>
                                                        <input type="text" class="form-control mb-0" id="year" name="year" value="<?php echo $selectedYear ?? date('Y'); ?>"> <!-- Use selectedYear if set, otherwise use current year -->
                                                    </div>
                                                    <div class="col-md-4 p-3">
                                                        <button type="submit" class="btn btn-primary mb-0">View Attendance</button>
                                                    </div>
                                                </div>
                                            </form>

                                           
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th> Sr.no</th>
                                                            <th> Name</th>
                                                            <th>Action</th>

                                                            <th> DaysofMonth</th>
                                                            
                                                            <th> Weekend</th>
                                                            <th> WorkingDays </th>
                                                            <th> Present</th>
                                                            <th> Absenty</th>
                                                            <?php
                                                            $date = $report['firstDayOfMonth'];
                                                            while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                                            ?>
                                                                <th><?= date('d', strtotime($date)) ?></th>
                                                            <?php
                                                                $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                                            endwhile;
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $i = 1;
                                                        foreach ($report['allEmployees'] as $employee): ?>
                                                            <?php
                                                                $totalPresent = 0;
                                                                $totalAbsent = 0;
                                                                $totalDaysOff = 0;
                                                                $totalwdays = 0;

                                                                $totalDaysInMonth = 0;
                                                                $holidays = isset($report['holidays']) ? $report['holidays'] : [];
                                                                $currentDate = date('Y-m-d');
                                                                $date = $report['firstDayOfMonth'];
                                                                while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                                                    $totalDaysInMonth++;
                                                                    $presentEmpIds = isset($report['attendanceData'][$date]) ? $report['attendanceData'][$date] : [];
                                                                    $dayOfWeek = date('N', strtotime($date)); // Get the day of the week (1 = Monday, 7 = Sunday)
                                                                    if ($dayOfWeek == 6 || $dayOfWeek == 7 || (!empty($holidays) && in_array($date, $holidays))) {
                                                                        // Saturday (6) or Sunday (7) ,Increment $totalDaysOff if the day is a weekend or holiday
                                                                        $totalDaysOff++;
                                                                        $attendanceStatus = "Off";
                                                                    } elseif (strtotime($date) <= strtotime($currentDate)) {
                                                                        if (in_array($employee->id, $presentEmpIds)) {
                                                                            $totalPresent++;
                                                                            $attendanceStatus = "P";
                                                                        } else {
                                                                            $totalAbsent++;
                                                                            $attendanceStatus = "A";
                                                                        }
                                                                    } else {
                                                                        // Future dates get a blank cell
                                                                        $attendanceStatus = "";
                                                                    }
                                                                    $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                                                    $totalwdays =$totalDaysInMonth  - $totalDaysOff;

                                                                endwhile;

                                                                // echo "<pre>";print_r($employee);exit();

                                                            ?>
                                                            <tr>
                                                            <td><?= $i++; ?></td>
                                                                <td><?= $employee->first_name; ?> <?= $employee->middle_name; ?> <?= $employee->last_name; ?></td>
                                                                <td><a href="<?=base_url(); ?>showattendance/<?= $employee->id ?>">Working Hours</a></td>

                                                                <td><?= $totalDaysInMonth ?></td>
                                                                <td><?= $totalDaysOff ?></td>
                                                                <td><?= $totalwdays ?></td>
                                                                <td><?= $totalPresent ?></td>
                                                                <td><?= $totalAbsent ?></td>
                                                            
                                                            

                                                        
                                                                <?php
                                                                $date = $report['firstDayOfMonth'];
                                                                while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                                                    $presentEmpIds = isset($report['attendanceData'][$date]) ? $report['attendanceData'][$date] : [];
                                                                    $dayOfWeek = date('N', strtotime($date)); // Get the day of the week (1 = Monday, 7 = Sunday)

                                                                    if (!empty($holidays) && in_array($date, $holidays)){
                                                                        echo "<td style='background-color: #ffeb3b; color: #000; text-align: center;'>Holiday</td>";
                                                                    }
                                                                    else if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                                                                        // Saturday (6) or Sunday (7)
                                                                ?>
                                                                <td style="background-color: #d3d3d3; color: #000; text-align: center; ">Off</td>
                                                                    <?php
                                                                    } elseif (strtotime($date) <= strtotime($currentDate)) {
                                                                    ?>
                                                                    <td style="<?= in_array($employee->id, $presentEmpIds) ? 'background-color: #c8e6c9; color: #000; text-align: center; font-weight: bold' : 'background-color: #ffcdd2; color: #000; text-align: center; font-weight: bold ' ?>">
                                                                        <?= in_array($employee->id, $presentEmpIds) ? 'P' : 'A' ?>
                                                                    </td>

                                                                <?php
                                                                    } else {
                                                                        // Future dates get a blank cell
                                                                ?>
                                                                        <td></td>
                                                                <?php
                                                                    }
                                                                    $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                                                endwhile;
                                                                ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
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

