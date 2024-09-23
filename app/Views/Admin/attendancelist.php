<?php include __DIR__.'/../Admin/header.php'; ?>



<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Attendance List</h4>
                </div>

                <div class="card-body">
                    <div class="bd-example">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="pills-home1">Attendance List</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="pills-profile1">Absent List</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#pills-employee1" type="button" role="tab" aria-controls="pills-employee1">Employee List</button>
                        </li>
                    </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <!-- Employee List Tab -->
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row attendance-list-table p-2">
                                    <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Attendance List : </b></h3>
                                            <h6 class="text-right" id="currentDate"><b><?= date('F j, Y'); ?></b></h6>
                                        </div>
                                        <div class="card-body">
                                            <form id="dateSearchForm" method="GET">
                                                <div class="form-group row">
                                                    <label for="searchDate" class="col-sm-2 col-form-label">Select Date:</label>
                                                    <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="searchDate" name="searchDate" value="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="attendanceTable">
                                                <!-- The table will be loaded here dynamically -->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Employee Tab -->
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row attendance-list-table p-2">
                                    <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Absent List : </b></h3>
                                            <h6 class="text-right" id="absentListDate"><b><?= date('F j, Y'); ?></b></h6>
                                        </div>
                                        <div class="card-body">
                                            <form id="absentDateSearchForm" method="GET">
                                                <div class="form-group row">
                                                    <label for="absentSearchDate" class="col-sm-2 col-form-label">Select Date:</label>
                                                    <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="absentSearchDate" name="absentSearchDate" value="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="absentTable">
                                                <!-- The absent list table will be loaded here dynamically -->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-employee1" role="tabpanel" aria-labelledby="employee-tab">
                                <div class="row employee-list-table p-2">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title"><b>All Employees : </b></h3>
                                            </div>
                                            <div class="card-body">
                                            <form id="emp_form" method="GET">
                                                <div class="form-group row">
                                                    <label for="empSearchDate" class="col-sm-2 col-form-label">Select Date:</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" id="empSearchDate" name="empSearchDate" value="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                                <div id="employeeTable">
                                                    <!-- The employee list table will be loaded here dynamically -->
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
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>


<script>
$(document).ready(function() {
    function loadAttendanceData(date) {
        $.ajax({
            url: '<?= base_url(); ?>get_attendance_list', // Adjust this URL to match your controller method
            type: 'GET',
            data: {searchDate: date},
            success: function(response) {
                $('#attendanceTable').html(response);

                // Update the header date
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                var formattedDate = new Date(date).toLocaleDateString('en-US', options);
                $('#currentDate').html('<b>' + formattedDate + '</b>');
            }
        });
    }

    // Trigger the search to load the initial data
    loadAttendanceData($('#searchDate').val());

    $('#dateSearchForm').on('submit', function(e) {
        e.preventDefault();
        var searchDate = $('#searchDate').val();
        loadAttendanceData(searchDate);
    });
});
</script>

<script>
$(document).ready(function() {
    function loadAbsentData(date) {
        $.ajax({
            url: '<?= base_url(); ?>get_absent_list', // Adjust this URL to match your controller method
            type: 'GET',
            data: {absentSearchDate: date},
            success: function(response) {
                $('#absentTable').html(response);

                // Update the header date
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                var formattedDate = new Date(date).toLocaleDateString('en-US', options);
                $('#absentListDate').html('<b>' + formattedDate + '</b>');
            }
        });
    }

    // Trigger the search to load the initial data
    loadAbsentData($('#absentSearchDate').val());

    $('#absentDateSearchForm').on('submit', function(e) {
        e.preventDefault();
        var searchDate = $('#absentSearchDate').val();
        loadAbsentData(searchDate);
    });
});


// $(document).ready(function() {
//     function loadEmployeeData() {
//         $.ajax({
//             url: '<?= base_url(); ?>get_employee_list', // Controller method to fetch employees
//             type: 'GET',
//             success: function(response) {
//                 // Inject the response (table) into the DOM
//                 $('#employeeTable').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.error("Error occurred: " + status + " " + error);
//             }
//         });
//     }

//     // Trigger to load employee data on page load
//     loadEmployeeData();
// });





</script>
<script>
$(document).ready(function() {
    // Function to get the current date and time in Asia/Kolkata timezone
    function getCurrentDateTime() {
        const options = {
            timeZone: 'Asia/Kolkata',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        };
        
        const formatter = new Intl.DateTimeFormat('en-IN', options);
        const parts = formatter.formatToParts(new Date());
        
        // Extract date and time parts
        const date = `${parts[4].value}-${parts[2].value}-${parts[0].value}`; // YYYY-MM-DD
        const time = `${parts[6].value}:${parts[8].value}`; // HH:MM
        return { date, time }; // Return the formatted date and time
    }

    // Function to load employee data
    function loadEmployeeData(date = null) {
        const currentDateTime = getCurrentDateTime();
        if (!date) {
            date = currentDateTime.date;
        }

        $.ajax({
            url: '<?= base_url(); ?>get_employee_list', // Controller method to fetch all employees
            type: 'GET',
            data: { date: date }, // Pass the selected date or current date
            success: function(response) {
                // Inject the response (table) into the DOM
                $('#employeeTable').html(response);

                // Set the start_time and end_time fields
                $('.start-time-input').each(function() {
                    if (date === currentDateTime.date) {
                        $(this).val(currentDateTime.date + 'T' + currentDateTime.time); // Set to current time if today's date
                    } else {
                        $(this).val(date + 'T00:00'); // Set to the search date with default time if it's not today's date
                    }
                });

                $('.end-time-input').each(function() {
                    if (date === currentDateTime.date) {
                        $(this).val(currentDateTime.date + 'T' + currentDateTime.time); // Set to current time if today's date
                    } else {
                        $(this).val(date + 'T00:00'); // Set to the search date with default time if it's not today's date
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Error occurred: " + status + " " + error);
            }
        });
    }

    // Trigger to load employee data on page load
    loadEmployeeData();

    // Handle the search form submission
    $('#emp_form').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the traditional way
        var selectedDate = $('#empSearchDate').val();
        
        // Load employee data for the selected date
        loadEmployeeData(selectedDate);
    });
});
</script>



