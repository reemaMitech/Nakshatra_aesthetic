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

                        <!-- Field for User ID -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="invalid-feedback">
                                Please provide a valid user ID.
                            </div>
                        </div>

                        <!-- Field for First Name -->
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid first name.
                            </div>
                        </div>

                        <!-- Field for Middle Name -->
                        <div class="col-md-6">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid middle name.
                            </div>
                        </div>

                        <!-- Field for Last Name -->
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                            <div class="invalid-feedback">
                                Please provide a valid last name.
                            </div>
                        </div>

                        <!-- Field for Mobile Number -->
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                            <div class="invalid-feedback">
                                Please provide a valid mobile number.
                            </div>
                        </div>

                        <!-- Field for Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>

                        <!-- Field for Password -->
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Please provide a valid password.
                            </div>
                        </div>

                        <!-- Field for Confirm Password -->
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            <div class="invalid-feedback">
                                Please confirm your password.
                            </div>
                        </div>

                        <!-- Field for Designation -->
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" required>
                            <div class="invalid-feedback">
                                Please provide a valid designation.
                            </div>
                        </div>

                        <!-- Field for Department -->
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" required>
                            <div class="invalid-feedback">
                                Please provide a valid department.
                            </div>
                        </div>

                        <!-- Checkbox List for Menu Names -->
                        <div class="col-md-12">
                            <label class="form-label">Select Access Levels</label>
                            <?php foreach ($menu as $menu): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="menu_names[]"
                                    id="menu_<?= $menu->id; ?>" value="<?= $menu->url_location; ?>">
                                <label class="form-check-label" for="menu_<?= $menu->id; ?>">
                                    <?= $menu->menu_name; ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="col-12">
                            <button id="submit-button" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End of Form -->

                    <!-- Employee List -->
                    <div id="employee-list" style="display:none;">
                        <h5>Employee List</h5>
                        <?php if (is_array($employees) || is_object($employees)): ?>
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
                        <?php endif; ?>
                    </div>
                    <!-- End of Employee List -->

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
        document.getElementById('access-form').style.display = 'block';
        document.getElementById('employee-list').style.display = 'none';
        document.getElementById('toggle-view').textContent = 'View Employee List';
    });
});

// Check if passwords match before submitting form
document.getElementById('access-form').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        event.preventDefault();
        alert('Password and Confirm Password do not match.');
        return false;
    }
    return true;
});
</script>

