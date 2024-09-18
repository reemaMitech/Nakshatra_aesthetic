<?php include __DIR__.'/../Admin/header.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Sales Reports</h4>
                    </div>
                    <button id="exportBtn" class="btn btn-primary">Export to Excel</button>
                </div>
                <div class="card-body">
                    <!-- Filter section -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label>From Date</label>
                            <input type="date" id="fromDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>To Date</label>
                            <input type="date" id="toDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Branch</label>
                            <select id="branchFilter" class="form-control">
                                <option value="">All Branches</option>
                                <?php
                                // Ensure only unique branch names are displayed
                                $uniqueBranches = [];
                                foreach ($orders as $order) {
                                    if (!in_array($order->branch_name, $uniqueBranches)) {
                                        $uniqueBranches[] = $order->branch_name;
                                        echo "<option value=\"{$order->branch_name}\">{$order->branch_name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Product Name</label>
                            <select id="productFilter" class="form-control">
                                <option value="">All Products</option>
                                <?php
                                // Ensure only unique product names are displayed
                                $uniqueProducts = [];
                                foreach ($orders as $order) {
                                    foreach ($order->items as $item) {
                                        if (!in_array($item->product_name, $uniqueProducts)) {
                                            $uniqueProducts[] = $item->product_name;
                                            echo "<option value=\"{$item->product_name}\">{$item->product_name}</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Table section -->
                    <div class="table-responsive">
                        <table id="salesTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Invoice Date</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Branch</th>
                                    <th>Product Name</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <?php foreach ($order->items as $item): ?>
                                        <tr>
                                            <td><?= $order->invoiceNo; ?></td>
                                            <td><?= $order->invoice_date; ?></td>
                                            <td><?= $order->customer_name; ?></td>
                                            <td><?= $order->contact_no; ?></td>
                                            <td><?= $order->branch_name; ?></td>
                                            <td><?= $item->product_name; ?></td>
                                            <td><?= $order->final_total; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-end"><strong>Total Amount:</strong></td>
                                    <td id="totalAmount">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fromDateInput = document.getElementById('fromDate');
    const toDateInput = document.getElementById('toDate');
    const branchFilterInput = document.getElementById('branchFilter');
    const productFilterInput = document.getElementById('productFilter');
    const salesTable = document.getElementById('salesTable');
    const exportBtn = document.getElementById('exportBtn');
    const rows = salesTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    const totalAmountCell = document.getElementById('totalAmount');

    function filterTable() {
        const fromDate = fromDateInput.value;
        const toDate = toDateInput.value;
        const branch = branchFilterInput.value.toLowerCase();
        const productName = productFilterInput.value.toLowerCase();
        const today = new Date().toISOString().split('T')[0]; // Today's date

        // Validation for From Date greater than today's date
        if (fromDate && new Date(fromDate) > new Date(today)) {
            alert("From Date cannot be greater than today's date.");
            fromDateInput.value = '';
            return;
        }

        // Validation for To Date less than From Date
        if (fromDate && toDate && new Date(toDate) < new Date(fromDate)) {
            alert("To Date cannot be earlier than From Date.");
            toDateInput.value = '';
            return;
        }

        let totalAmount = 0;

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const invoiceDate = row.cells[1].innerText; // Invoice Date
            const branchName = row.cells[4].innerText.toLowerCase(); // Branch Name
            const rowProductName = row.cells[5].innerText.toLowerCase(); // Product Name

            let showRow = true;

            // Filter by date range
            if (fromDate && new Date(invoiceDate) < new Date(fromDate)) {
                showRow = false;
            }
            if (toDate && new Date(invoiceDate) > new Date(toDate)) {
                showRow = false;
            }

            // Filter by branch
            if (branch && branch !== branchName) {
                showRow = false;
            }

            // Filter by product name
            if (productName && productName !== rowProductName) {
                showRow = false;
            }

            // Show or hide the row
            row.style.display = showRow ? '' : 'none';

            // If row is shown, add its total to the overall total
            if (showRow) {
                totalAmount += parseFloat(row.cells[6].innerText);
            }
        }

        // Update total amount display
        totalAmountCell.innerText = totalAmount.toFixed(2);

        // If "All Branches" is selected, show all records
        if (!branch) {
            row.style.display = '';
        }
    }

    function exportTableData() {
        const wb = XLSX.utils.table_to_book(document.getElementById('salesTable'), {sheet:"Sheet1"});
        const wbout = XLSX.write(wb, {bookType:'xlsx', type: 'array'});

        // Create a Blob and a link to download the file
        const blob = new Blob([wbout], {type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'});
        const link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'Sales_Report.xlsx';
        link.click();
    }

    // Add event listeners to the filters
    fromDateInput.addEventListener('change', filterTable);
    toDateInput.addEventListener('change', filterTable);
    branchFilterInput.addEventListener('change', filterTable);
    productFilterInput.addEventListener('change', filterTable);

    // Export button event listener
    exportBtn.addEventListener('click', exportTableData);
});
</script>

<?php include __DIR__.'/../Admin/footer.php'; ?>
