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

                        <!-- New Field for Username -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">Employee Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="invalid-feedback">
                                Please provide a valid username.
                            </div>
                        </div>

                        <!-- New Field for Password -->
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Please provide a valid password.
                            </div>
                        </div>

                        <!-- Checkbox List for Menu Names -->
                        <div class="col-md-12">
                            <label class="form-label">Select Access Levels</label>
                            <?php foreach ($menu as $menu): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="menu_names[]"
                                    id="menu_<?= $menu->id; ?>" value="<?= $menu->menu_name; ?>">
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
                        <?php foreach ($employees as $employee): ?>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= $employee->username; ?></h5>
                                <p class="card-text">Access Levels: <?= $employee->menu_names; ?></p>
                                <a href="#" class="btn btn-warning edit-button" data-id="<?= $employee->id; ?>">Edit</a>
                                <a href="<?= base_url('delete_employee/'.$employee->id); ?>"
                                    class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
        // AJAX call to get employee data (or pre-fill the form using available data)
        // Example:
        var employee = <?= json_encode($employees); ?>.find(e => e.id == id);
        document.getElementById('employee_id').value = employee.id;
        document.getElementById('username').value = employee.username;
        document.getElementById('password').value = employee.password;
        document.querySelectorAll('input[name="menu_names[]"]').forEach(function(checkbox) {
            checkbox.checked = employee.menu_names.split(', ').includes(checkbox.value);
        });
        document.getElementById('submit-button').textContent = 'Update';
        document.getElementById('form-title').textContent = 'Edit Access Level Employee';
        document.getElementById('access-form').style.display = 'block';
        document.getElementById('employee-list').style.display = 'none';
    });
});
</script>