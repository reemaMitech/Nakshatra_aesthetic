<?php include __DIR__.'/../Admin/header.php'; ?>
<!-- DataTables CSS -->




<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Manage Financials</h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success" role="alert" id="successMessage">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert" id="errorMessage">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="bd-example">
                        <ul class="nav nav-tabs" id="financialsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="cash-tab" data-bs-toggle="tab"
                                    data-bs-target="#cash" type="button" role="tab" aria-controls="cash"
                                    aria-selected="true">Add Cash</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="expense-tab" data-bs-toggle="tab" data-bs-target="#expense"
                                    type="button" role="tab" aria-controls="expense" aria-selected="false">Add
                                    Expense</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="balanceSheet-tab" data-bs-toggle="tab"
                                    data-bs-target="#balanceSheet" type="button" role="tab" aria-controls="balanceSheet"
                                    aria-selected="false">Balance Sheet</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="financialsTabContent">
                            <!-- Add Cash Form -->
                            <div class="tab-pane fade show active" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                                <form class="row g-3 needs-validation mt-3" action="<?= base_url('add_cash'); ?>"
                                    method="post" novalidate>
                                    <div class="col-md-4">
                                        <label for="cashDate" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="cashDate" name="date" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid date.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cashBy" class="form-label">Cash By</label>
                                        <input type="text" class="form-control" id="cashBy" name="cash_by" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid name.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cashAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="cashAmount" name="amount"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid amount.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cashFor" class="form-label">For</label>
                                        <input type="text" class="form-control" id="cashFor" name="for" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid reason.
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Add Cash</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Add Expense Form -->
                            <div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="expense-tab">
                                <form class="row g-3 needs-validation mt-3" action="<?= base_url('add_expense'); ?>"
                                    method="post" enctype="multipart/form-data" novalidate>
                                    <!-- Date Field -->
                                    <div class="col-md-3">
                                        <label for="expenseDate" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="expenseDate" name="date" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid date.
                                        </div>
                                    </div>

                                    <!-- Bill Number Field -->
                                    <div class="col-md-3">
                                        <label for="billNumber" class="form-label">Bill Number</label>
                                        <input type="text" class="form-control" id="billNumber" name="bill_number"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid bill number.
                                        </div>
                                    </div>

                                    <!-- Expense By Field -->
                                    <div class="col-md-3">
                                        <label for="expenseBy" class="form-label">Expense By</label>
                                        <input type="text" class="form-control" id="expenseBy" name="expense_by"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid name.
                                        </div>
                                    </div>

                                    <!-- For Field -->
                                    <div class="col-md-3">
                                        <label for="expenseFor" class="form-label">For</label>
                                        <input type="text" class="form-control" id="expenseFor" name="for" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid reason.
                                        </div>
                                    </div>

                                    <!-- Biller or Oblick Shop Field -->
                                    <div class="col-md-3">
                                        <label for="billerOrShop" class="form-label">Biller or Oblick Shop</label>
                                        <input type="text" class="form-control" id="billerOrShop" name="biller_or_shop"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid name or shop.
                                        </div>
                                    </div>

                                    <!-- Amount Field -->
                                    <div class="col-md-3">
                                        <label for="expenseAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="expenseAmount" name="amount"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a valid amount.
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Add Expense</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Balance Sheet Section -->
                            <!-- Balance Sheet Section -->
                            <div class="tab-pane fade" id="balanceSheet" role="tabpanel"
                                aria-labelledby="balanceSheet-tab">

                         
                                <h4 class="mt-3">Balance Sheet</h4>
                                <table id="balanceSheetTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Bill Number</th>
                                            <th>Biller / Shop Name</th>
                                            <th>By</th>
                                            <th>For</th>
                                            <th class="text-right">Debit Amount</th>
                                            <th class="text-right">Credit Amount</th>
                                            <th class="text-right">Balance Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $totalCash = 0;
                                            $totalExpenses = 0;
                                            $netBalance = 0;

                                            if (!empty($cashData) || !empty($expenseData)) {
                                                $entries = array_merge(
                                                    array_map(function($item) use (&$totalCash) {
                                                        $amount = (float)($item['amount'] ?? 0);
                                                        $totalCash += $amount;
                                                        return [
                                                            'date' => $item['date'],
                                                            'bill_number' => '',
                                                            'biller' => '',
                                                            'by' => $item['by'],
                                                            'for' => $item['for'],
                                                            'amount' => $amount,
                                                            'type' => 'cash'
                                                        ];
                                                    }, $cashData),
                                                    array_map(function($item) use (&$totalExpenses) {
                                                        $amount = -(float)($item['amount'] ?? 0);
                                                        $totalExpenses += $amount;
                                                        return [
                                                            'date' => $item['date'],
                                                            'bill_number' => $item['bill_number'] ?? '',
                                                            'biller' => $item['biller_or_shop'] ?? '',
                                                            'by' => $item['expense_by'] ?? '',
                                                            'for' => $item['for'] ?? '',
                                                            'amount' => $amount,
                                                            'type' => 'expense'
                                                        ];
                                                    }, $expenseData)
                                                );


                                                    usort($entries, function($a, $b) {
                                                        return strtotime($a['date']) - strtotime($b['date']);
                                                    });


                                                foreach ($entries as $entry) {
                                                    $debitAmount = $entry['amount'] < 0 ? abs($entry['amount']) : 0;
                                                    $creditAmount = $entry['amount'] > 0 ? abs($entry['amount']) : 0;
                                                    $netBalance += $creditAmount - $debitAmount;
                                                    ?>
                                        <tr>
                                            <td><?= $entry['date']; ?></td>
                                            <td><?= $entry['bill_number']; ?></td>
                                            <td><?= $entry['biller']; ?></td>
                                            <td><?= $entry['by']; ?></td>
                                            <td><?= $entry['for']; ?></td>
                                            <td class="text-right">
                                                <?= $debitAmount > 0 ? number_format($debitAmount, 2) : '-'; ?></td>
                                            <td class="text-right">
                                                <?= $creditAmount > 0 ? number_format($creditAmount, 2) : '-'; ?></td>
                                            <td class="text-right"><?= number_format($netBalance, 2); ?></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th class="text-right" style="text-align: end;"><?= number_format(abs($totalExpenses), 2); ?></th>
                                            <th class="text-right" style="text-align: end;"><?= number_format($totalCash, 2); ?></th>
                                            <th class="text-right" style="text-align: end;"><?= number_format($netBalance, 2); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    setTimeout(function() {
        $('#successMessage, #errorMessage').fadeOut('slow');
    }, 4000);

    $('#balanceSheetTable').DataTable({
        order: [
            [0, 'asc']
        ]
    });
});
</script>