<?php include __DIR__.'/../Admin/header.php'; ?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Create Access Level Employee</h4>
                    <button id="toggle-view" class="btn btn-warning">Employee List</button>
                </div>

                <div class="card-body">

                    <!-- Form for Adding/Editing Employee Access Level -->
                    <form class="row g-3 needs-validation" id="access-form" action="<?= base_url('create_user'); ?>"
                        method="post" enctype="multipart/form-data" novalidate>
                        <input type="hidden" id="employee_id" name="id">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                   
                        <!-- Field for User ID -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php if(!empty($single_data)){ echo $single_data->username; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid user ID.
                            </div>
                        </div>

                        <!-- Field for First Name -->
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(!empty($single_data)){ echo $single_data->first_name; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid first name.
                            </div>
                        </div>

                        <!-- Field for Middle Name -->
                        <div class="col-md-6">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php if(!empty($single_data)){ echo $single_data->middle_name; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid middle name.
                            </div>
                        </div>

                        <!-- Field for Last Name -->
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(!empty($single_data)){ echo $single_data->last_name; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid last name.
                            </div>
                        </div>

                        <!-- Field for Mobile Number -->
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php if(!empty($single_data)){ echo $single_data->mobile; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid mobile number.
                            </div>
                        </div>

                        <!-- Field for Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($single_data)){ echo $single_data->email; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>

                        <!-- Field for Password -->
                        <!-- Field for Password -->
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($single_data)){ echo $single_data->password; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid password.
                            </div>
                        </div>

                        <!-- Field for Confirm Password (auto-filled with the same value as password when editing) -->
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                value="<?php if(!empty($single_data)){ echo $single_data->password; }?>" required>
                            <div class="invalid-feedback">
                                Please confirm your password.
                            </div>
                        </div>

                        <!-- Field for Designation -->
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="<?php if(!empty($single_data)){ echo $single_data->designation; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid designation.
                            </div>
                        </div>

                        <!-- Field for Department -->
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" value="<?php if(!empty($single_data)){ echo $single_data->department; }?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid department.
                            </div>
                        </div>

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
                                    id="menu_<?= $menu_item->id; ?>" value="<?= $menu_item->url_location; ?>"
                                    <?= $isChecked ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="menu_<?= $menu_item->id; ?>">
                                    <?= $menu_item->menu_name; ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-12">
                            <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                            <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                        </div>
                    </form>
                    <!-- End of Form -->

                    <!-- Employee List -->
                    <div id="employee-list" style="display:none;">
                        <h5>Employee List</h5>

                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th> Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Department</th>
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
                                                                <td><?php echo $employee->first_name." ".$employee->middle_name." ".$employee->last_name; ?></td>
                                                                <td><?php echo $employee->mobile; ?></td>
                                                                <td><?php echo $employee->department; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>edit_employee/<?= $employee->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                                    <a href="<?= base_url(); ?>delete/<?= base64_encode($employee->id); ?>/tbl_register" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $i++; 
                                                         endforeach; ?>
                                                        <?php else: ?>
                                                            <p>No employees found.</p>
                                                        <?php endif; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Sr. No.</th>
                                                        <th> Name </th>
                                                        <th> Mobile Number </th>
                                                        <th>Department</th>
                                                        <th> Action </th>
                                            
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                        <!-- <?php if (is_array($employees) || is_object($employees)): ?>
                            <?php foreach ($employees as $employee): ?>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $employee->username; ?></h5>
                                    <p class="card-text">Access Levels: <?= $employee->menu_names; ?></p>
                                    <a href="#" class="btn btn-warning edit-button" data-id="<?= $employee->id; ?>">Edit</a>
                                    <a href="<?= base_url('delete_employee/'.$employee->id); ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No employees found.</p>
                        <?php endif; ?> -->
                    </div>
                    <!-- End of Employee List -->

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


