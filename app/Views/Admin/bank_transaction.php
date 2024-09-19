<?php include __DIR__.'/../Admin/header.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
function toggleChequeFields(show) {
    var chequeFields = document.getElementById('chequeFields');
    chequeFields.style.display = show ? 'block' : 'none';
}
</script>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Bank Transactions</h4>
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
                        <ul class="nav nav-tabs" id="bankTransactionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="deposit-tab" data-bs-toggle="tab"
                                    data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit"
                                    aria-selected="true">Add Deposit</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="withdrawal-tab" data-bs-toggle="tab"
                                    data-bs-target="#withdrawal" type="button" role="tab" aria-controls="withdrawal"
                                    aria-selected="false">Add Withdrawal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="balance-tab" data-bs-toggle="tab" data-bs-target="#balance"
                                    type="button" role="tab" aria-controls="balance"
                                    aria-selected="false">Balance</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="bankTransactionContent">

                            <!-- Add Deposit Form -->
                            <div class="tab-pane fade show active" id="deposit" role="tabpanel"
                                aria-labelledby="deposit-tab">
                                <h4 class="mt-3">Add Deposit</h4>
                                <form id="depositForm" method="post" action="<?= base_url('add_deposit'); ?>">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="depositTransactionDate" class="form-label">Transaction
                                                Date</label>
                                            <input type="date" class="form-control" id="depositTransactionDate"
                                                name="transaction_date" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="depositDescription" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="depositDescription"
                                                name="description" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Cheque</label>
                                            <div>
                                                <input type="radio" id="depositChequeYes" name="cheque" value="yes"
                                                    onclick="toggleChequeFields(true)">
                                                <label for="depositChequeYes">Yes</label>
                                                <input type="radio" id="depositChequeNo" name="cheque" value="no"
                                                    onclick="toggleChequeFields(false)" checked>
                                                <label for="depositChequeNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chequeFields" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="chequeNumber" class="form-label">Cheque Number</label>
                                                <input type="text" class="form-control" id="chequeNumber"
                                                    name="cheque_number">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="chequeDate" class="form-label">Cheque Date</label>
                                                <input type="date" class="form-control" id="chequeDate"
                                                    name="cheque_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="depositAmount" class="form-label">Deposit Amount</label>
                                            <input type="number" class="form-control" id="depositAmount"
                                                name="deposit_amount" step="0.01" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Deposit</button>
                                </form>
                            </div>

                            <!-- Add Withdrawal Form -->
                            <div class="tab-pane fade" id="withdrawal" role="tabpanel" aria-labelledby="withdrawal-tab">
                                <h4 class="mt-3">Add Withdrawal</h4>
                                <form id="withdrawalForm" method="post" action="<?= base_url('add_withdrawal'); ?>">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="withdrawalTransactionDate" class="form-label">Transaction
                                                Date</label>
                                            <input type="date" class="form-control" id="withdrawalTransactionDate"
                                                name="transaction_date" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="withdrawalDescription" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="withdrawalDescription"
                                                name="description" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="withdrawalAmount" class="form-label">Withdrawal Amount</label>
                                            <input type="number" class="form-control" id="withdrawalAmount"
                                                name="withdrawal_amount" step="0.01" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Withdrawal</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="balance" role="tabpanel" aria-labelledby="balance-tab">
                                <h4 class="mt-3">Balance</h4>
                                <table id="balanceTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Cheque Number</th>
                                            <th>Cheque Date</th>
                                            <th>Deposit Amount</th>
                                            <th>Withdrawal Amount</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $runningBalance = 0; 
                                            $totalDeposit = 0;   
                                            $totalWithdrawal = 0; 
                                            $allTransactions = [];

                                            foreach ($depositData as $deposit) {
                                                $allTransactions[] = [
                                                    'date' => $deposit['transaction_date'],
                                                    'description' => $deposit['description'],
                                                    'deposit' => $deposit['deposit_amount'],
                                                    'withdrawal' => null,
                                                    'cheque_number' => $deposit['cheque_number'] ?? null, 
                                                    'cheque_date' => $deposit['cheque_date'] ?? null,     
                                                ];
                                                $totalDeposit += $deposit['deposit_amount']; 
                                            }

                                            foreach ($withdrawalData as $withdrawal) {
                                                $allTransactions[] = [
                                                    'date' => $withdrawal['transaction_date'],
                                                    'description' => $withdrawal['description'],
                                                    'deposit' => null,
                                                    'withdrawal' => $withdrawal['withdrawal_amount'],
                                                    'cheque_number' => null, 
                                                    'cheque_date' => null,
                                                ];
                                                $totalWithdrawal += $withdrawal['withdrawal_amount']; 
                                            }

                                            usort($allTransactions, function ($a, $b) {
                                                return strtotime($a['date']) - strtotime($b['date']);
                                            });

                                            foreach ($allTransactions as $transaction) {
  
                                                if ($transaction['deposit']) {
                                                    $runningBalance += $transaction['deposit'];
                                                } elseif ($transaction['withdrawal']) {
                                                    $runningBalance -= $transaction['withdrawal'];
                                                }

                                                echo "<tr>";
                                                echo "<td>" . $transaction['date'] . "</td>";
                                                echo "<td>" . $transaction['description'] . "</td>";
                                                echo "<td>" . ($transaction['cheque_number'] ? $transaction['cheque_number'] : '-') . "</td>";
                                                echo "<td>" . ($transaction['cheque_date'] ? $transaction['cheque_date'] : '-') . "</td>";
                                                echo "<td>" . ($transaction['deposit'] ? number_format($transaction['deposit'], 2) : '-') . "</td>";
                                                echo "<td>" . ($transaction['withdrawal'] ? number_format($transaction['withdrawal'], 2) : '-') . "</td>";
                                                echo "<td>" . number_format($runningBalance, 2) . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                    </tbody>
                                </table>

                                <div class="mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Total Deposit: <?= number_format($totalDeposit, 2); ?></h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Total Withdrawal: <?= number_format($totalWithdrawal, 2); ?>
                                                    </h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Final Balance: <?= number_format($runningBalance, 2); ?></h5>
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


<script>
$(document).ready(function() {
    $('#balanceTable').DataTable();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('depositTransactionDate').setAttribute('max', today);
    document.getElementById('withdrawalTransactionDate').setAttribute('max', today);
    document.getElementById('chequeDate').setAttribute('max', today);
});
</script>
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


<?php include __DIR__.'/../Admin/footer.php'; ?>