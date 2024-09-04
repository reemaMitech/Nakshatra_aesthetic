<?php include __DIR__.'/../Admin/header.php'; ?>
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0" id="form-title">Add Invoice</h4>
                    <button id="toggle-view" class="btn btn-warning">Invoice List</button>
                </div>

                <div class="card-body">

                    <!-- Form for Adding/Editing Invoice Access Level -->
                    <form class="row g-3 needs-validation" id="access-form" action="<?= base_url('create_user'); ?>"
                        method="post" enctype="multipart/form-data" novalidate>
                        <input type="hidden" id="invoice_id " name="id">



                        <div class="col-md-6 position-relative">
                           <label for="branch_name" class="form-label">State</label>
                           <select class="form-select" id="branch_name" required>
                              <option selected disabled value="">Select Branch </option>
                              <option value="Pune">Pune</option>
                              <option value="Mumbai">Mumbai</option>
                              <option value="Nashik">Nashik</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Other">Other</option>
                           </select>
                           <div class="invalid-tooltip">
                              Please select a valid state.
                           </div>
                        </div>

                        <!-- New Field for Username -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">Invoice Username</label>
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

                    <!-- Invoice List -->
                    <div id="Invoice-list" style="display:none;">
                        <h5>Invoice List</h5>

                        
                        
                        <?php if (is_array($invoices_list) || is_object($invoices_list)): ?>
                            <?php foreach ($invoices_list as $data): ?>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data->username; ?></h5>
                                    <p class="card-text">Access Levels: <?= $data->menu_names; ?></p>
                                    <a href="#" class="btn btn-warning edit-button" data-id="<?= $data->id; ?>">Edit</a>
                                    <a href="<?= base_url('delete_Invoice/'.$data->id); ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No Invoices found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- End of Invoice List -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/../Admin/footer.php'; ?>

<script>
// Toggle between form and Invoice List
document.getElementById('toggle-view').addEventListener('click', function() {
    var form = document.getElementById('access-form');
    var list = document.getElementById('Invoice-list');
    var title = document.getElementById('form-title');
    var button = document.getElementById('toggle-view');
    if (form.style.display === 'none') {
        form.style.display = 'block';
        list.style.display = 'none';
        title.textContent = 'Add Invoice';
        button.textContent = 'View Invoice List';
        document.getElementById('submit-button').textContent = 'Submit';
        form.reset();
    } else {
        form.style.display = 'none';
        list.style.display = 'block';
        title.textContent = 'Invoice List';
        button.textContent = 'Add New Invoice';
    }
});

// Fill form when editing
document.querySelectorAll('.edit-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        // Assuming Invoice data is available in $invoices_list array (JSON encoded)
        var Invoice = <?= json_encode($invoices_list); ?>.find(e => e.id == id);
        document.getElementById('invoice_id ').value = Invoice.id;
        document.getElementById('username').value = Invoice.username;
        document.getElementById('password').value = Invoice.password;
        document.getElementById('branch_name').value = Invoice.branch_name;


        // Uncheck all checkboxes
        document.querySelectorAll('input[name="menu_names[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });

        // Check the ones that the Invoice has access to
        Invoice.menu_names.split(', ').forEach(function(menu) {
            document.querySelector('input[value="' + menu + '"]').checked = true;
        });

        document.getElementById('submit-button').textContent = 'Update';
        document.getElementById('form-title').textContent = 'Edit Access Level Invoice';
        document.getElementById('access-form').style.display = 'block';
        document.getElementById('Invoice-list').style.display = 'none';
    });
});
</script>
