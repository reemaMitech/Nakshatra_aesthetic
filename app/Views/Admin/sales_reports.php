<?php include __DIR__.'/../Admin/header.php'; ?>

  

    <div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Sales Reports</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                     <thead>
                     <tr>
                                <th>Invoice No</th>
                                <th>Customer Name</th>
                                <th>Contact No</th>
                                <th>Branch Location</th>
                                <th>Final Total</th>
                                <th>Invoice Date</th>
                                <!-- Add more columns as needed -->
                            </tr>
                     </thead>
                     <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order->invoiceNo; ?></td>
                                <td><?= $order->customer_name; ?></td>
                                <td><?= $order->contact_no; ?></td>
                                <td><?= $order->branch_location; ?></td>
                                <td><?= $order->final_total; ?></td>
                                <td><?= $order->invoice_date; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
      </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>


