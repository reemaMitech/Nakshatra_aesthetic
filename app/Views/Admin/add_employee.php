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
                    <h4 class="card-title mb-0" id="form-title">Create Access Level Employee</h4>
                    <!-- <button id="toggle-view" class="btn btn-warning">Employee List</button> -->
                </div>

                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo !$showForm ? 'active' : ''; ?>" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab"
                                    aria-controls="home"
                                    aria-selected="<?php echo !$showForm ? 'true' : 'false'; ?>">Employee List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $showForm ? 'active' : ''; ?>" id="profile-tab"
                                    data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab"
                                    aria-controls="profile"
                                    aria-selected="<?php echo $showForm ? 'true' : 'false'; ?>">Add Employee</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show <?php echo !$showForm ? 'show active' : ''; ?>"
                                id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
                                <!-- Employee List -->
                                <!-- <div id="employee-list" > -->
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>username</th>
                                                <th> Name</th>
                                                <th>Mobile Number</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (is_array($employees) || is_object($employees)): 

                                                                    // <?php //print_r($employees);exit(); 
                                                        $i = 1; 
                                                        foreach ($employees as $employee):
                                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $employee->username; ?></td>
                                                <td><?php echo $employee->first_name." ".$employee->middle_name." ".$employee->last_name; ?>
                                                </td>
                                                <td><?php echo $employee->mobile; ?></td>
                                                <td><?php echo $employee->department; ?></td>
                                                <td><?php echo $employee->role; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>edit_employee/<?= $employee->id; ?>"><i
                                                            class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($employee->id); ?>/tbl_register"
                                                        onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i
                                                            class="far fa-trash-alt me-2"></i></a>
                                                </td>
                                            </tr>
                                            <?php 

                                                        $i++; 
                                                        endforeach; ?>
                                            <?php else: ?>
                                            <p>No employees found.</p>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- </div> -->
                                <!-- End of Employee List -->
                            </div>


                            <div class="tab-pane fade <?php echo $showForm ? 'show active' : ''; ?>" id="pills-profile1"
                                role="tabpanel" aria-labelledby="pills-profile-tab1">
                                <!-- Form for Adding/Editing Employee Access Level -->
                                <form class="row g-3 needs-validation" id="access-form"
                                    action="<?= base_url('create_user'); ?>" method="post" enctype="multipart/form-data"
                                    novalidate>
                                    <input type="hidden" id="employee_id" name="id">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                    <!-- <?php // if(!empty($single_data)){
                                        
                                            // print_r($single_data);exit();} ?> -->
                                    <!-- Field for User ID -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">User ID</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?php if (!empty($single_data)) { echo $single_data->username; } ?>"
                                            readonly>
                                        <div class="invalid-feedback">
                                            Please provide a valid user ID.
                                        </div>
                                    </div>


                                    <!-- Field for First Name -->
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="<?php if(!empty($single_data)){ echo $single_data->first_name; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid first name.
                                        </div>
                                    </div>

                                    <!-- Field for Middle Name -->
                                    <div class="col-md-6">
                                        <label for="middle_name" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                            value="<?php if(!empty($single_data)){ echo $single_data->middle_name; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid middle name.
                                        </div>
                                    </div>

                                    <!-- Field for Last Name -->
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="<?php if(!empty($single_data)){ echo $single_data->last_name; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid last name.
                                        </div>
                                    </div>

                                    <!-- Field for Mobile Number -->
                                    <div class="col-md-6">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="<?php if(!empty($single_data)){ echo $single_data->mobile; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid mobile number.
                                        </div>
                                    </div>

                                    <!-- Field for Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php if(!empty($single_data)){ echo $single_data->email; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>

                                    <!-- Field for Password -->

                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            value="<?php if(!empty($single_data)){ echo $single_data->password; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>

                                    <!-- Field for Confirm Password (auto-filled with the same value as password when editing) -->
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password"
                                            value="<?php if(!empty($single_data)){ echo $single_data->password; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please confirm your password.
                                        </div>
                                    </div>

                                    <!-- Field for Designation -->
                                    <div class="col-md-6">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            value="<?php if(!empty($single_data)){ echo $single_data->designation; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid designation.
                                        </div>
                                    </div>

                                    <!-- Field for Department -->
                                    <div class="col-md-6">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" class="form-control" id="department" name="department"
                                            value="<?php if(!empty($single_data)){ echo $single_data->department; }?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid department.
                                        </div>
                                    </div>


                                            <div class="col-md-6">
                                                <label for="salaryfor8hour" class="form-label">Salary(For 8 Hours)</label>
                                                <input type="text" class="form-control" id="salaryfor8hour" name="salaryfor8hour" value="<?php if(!empty($single_data)){ echo $single_data->salaryfor8hour; }?>" >
                                               
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Apply OT :</label>
                                                <div class="d-flex">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="radio" id="Yes" name="applyot" value="Yes" required <?php if(!empty($single_data) && $single_data->applyot == 'Yes'){ echo "checked"; }?>>
                                                        <label class="form-check-label" for="Yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="No" name="applyot" value="No" <?php if(!empty($single_data) && $single_data->applyot == 'No'){ echo "checked"; }?>>
                                                        <label class="form-check-label" for="No">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="row"> -->
                                            <!-- Radio Buttons for User Role -->
                                            <div class="col-md-6">
                                                <label class="form-label">Add this user as:</label>
                                                <div class="d-flex">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="radio" id="admin" name="user_role" value="Admin" required <?php if(!empty($single_data) && $single_data->role == 'Admin'){ echo "checked"; }?>>
                                                        <label class="form-check-label" for="admin">Admin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="employee" name="user_role" value="Employee" <?php if(!empty($single_data) && $single_data->role == 'Employee'){ echo "checked"; }?>>
                                                        <label class="form-check-label" for="employee">Employee</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- </div> -->

                                    <!-- <div class="row"> -->



                                    <!-- Checkbox List for Menu Names -->
                                    <div class="col-md-12">
                                        <label class="form-label">Select Access Levels</label>
                                        <?php
                                                // Check if $single_data->menu_names exists, then explode it into an array
                                                $selected_menu_names = !empty($single_data->menu_names) ? explode(', ', $single_data->menu_names) : [];

                                                // Iterate over all available menu items
                                                foreach ($menu as $menu_item): 
                                                    // Check if the current menu item is in the selected menu names
                                                    $isChecked = in_array($menu_item->url_location, $selected_menu_names);
                                                ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="menu_names[]"
                                                id="menu_<?= $menu_item->id; ?>"
                                                value="<?= $menu_item->url_location; ?>"
                                                <?= $isChecked ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="menu_<?= $menu_item->id; ?>">
                                                <?= $menu_item->menu_name; ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" value="" name="Save" id="submit"
                                            class="btn btn-lg btn-success">
                                            <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                    </div>
                                </form>
                                <!-- End of Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include __DIR__.'/../Admin/footer.php'; ?>

    <script>
    // Toggle between form and employee list
    document.getElementById('toggle-view').addEventListener('click', function() {
        var form = document.getElementById('access-form');
        var list = document.getElementById('employee-list');
        var title = document.getElementById('form-title');
        var button = document.getElementById('toggle-view');


        if (form.style.display === 'none') {
            form.style.display = 'block';
            list.style.display = 'none';
            title.textContent = 'Create Access Level Employee';
            button.textContent = 'View Employee List';
            document.getElementById('submit-button').textContent = 'Submit';
            form.reset();

            // Show all fields
            document.getElementById('first_name').parentElement.style.display = 'block';
            document.getElementById('middle_name').parentElement.style.display = 'block';
            document.getElementById('last_name').parentElement.style.display = 'block';
            document.getElementById('mobile').parentElement.style.display = 'block';
            document.getElementById('email').parentElement.style.display = 'block';
            document.getElementById('designation').parentElement.style.display = 'block';
            document.getElementById('department').parentElement.style.display = 'block';
            document.getElementById('password').parentElement.style.display = 'block';
            document.getElementById('confirm_password').parentElement.style.display = 'block';

            // Show all fields
            document.getElementById('first_name').parentElement.style.display = 'block';
            document.getElementById('middle_name').parentElement.style.display = 'block';
            document.getElementById('last_name').parentElement.style.display = 'block';
            document.getElementById('mobile').parentElement.style.display = 'block';
            document.getElementById('email').parentElement.style.display = 'block';
            document.getElementById('designation').parentElement.style.display = 'block';
            document.getElementById('department').parentElement.style.display = 'block';
            document.getElementById('password').parentElement.style.display = 'block';
            document.getElementById('confirm_password').parentElement.style.display = 'block';
        } else {
            form.style.display = 'none';
            list.style.display = 'block';
            title.textContent = 'Employee List';
            button.textContent = 'Add New Employee';
        }
    });

    // Fill form when editing
    document.querySelectorAll('.edit-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var employee = <?= json_encode($employees); ?>.find(e => e.id == id);
            document.getElementById('employee_id').value = employee.id;
            document.getElementById('username').value = employee.username;

            // Hide fields not needed for editing
            document.getElementById('first_name').parentElement.style.display = 'none';
            document.getElementById('middle_name').parentElement.style.display = 'none';
            document.getElementById('last_name').parentElement.style.display = 'none';
            document.getElementById('mobile').parentElement.style.display = 'none';
            document.getElementById('email').parentElement.style.display = 'none';
            document.getElementById('designation').parentElement.style.display = 'none';
            document.getElementById('department').parentElement.style.display = 'none';
            document.getElementById('password').parentElement.style.display = 'none';
            document.getElementById('confirm_password').parentElement.style.display = 'none';

            // Clear the fields
            document.getElementById('password').value = '';
            document.getElementById('confirm_password').value = '';

            // Hide fields not needed for editing
            document.getElementById('first_name').parentElement.style.display = 'none';
            document.getElementById('middle_name').parentElement.style.display = 'none';
            document.getElementById('last_name').parentElement.style.display = 'none';
            document.getElementById('mobile').parentElement.style.display = 'none';
            document.getElementById('email').parentElement.style.display = 'none';
            document.getElementById('designation').parentElement.style.display = 'none';
            document.getElementById('department').parentElement.style.display = 'none';
            document.getElementById('password').parentElement.style.display = 'none';
            document.getElementById('confirm_password').parentElement.style.display = 'none';

            // Clear the fields
            document.getElementById('password').value = '';
            document.getElementById('confirm_password').value = '';

            // Uncheck all checkboxes
            document.querySelectorAll('input[name="menu_names[]"]').forEach(function(checkbox) {
                checkbox.checked = false;
            });

            // Check the ones that the employee has access to
            employee.menu_names.split(', ').forEach(function(menu) {
                document.querySelector('input[value="' + menu + '"]').checked = true;
            });

            document.getElementById('submit-button').textContent = 'Update';
            document.getElementById('form-title').textContent = 'Edit Access Level Employee';
            document.getElementById('access-form').scrollIntoView();
            document.getElementById('access-form').scrollIntoView();
            document.getElementById('access-form').style.display = 'block';
            document.getElementById('employee-list').style.display = 'none';
            document.getElementById('toggle-view').textContent = 'View Employee List';
            document.getElementById('toggle-view').textContent = 'View Employee List';
        });
    });

    document.getElementById('access-form').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        // Validate only if the password is filled
        if (password !== '') {
            if (password !== confirmPassword) {
                event.preventDefault();
                alert('Password and Confirm Password do not match.');
                return false;
            }
        }
        return true;
    });
    </script>