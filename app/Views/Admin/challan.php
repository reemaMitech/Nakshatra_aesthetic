<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice</title>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
@page {
    size: A5;
    margin: 20mm;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
    font-size:12px;
}

.invoice {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px; /* Adjust as necessary */
}

.logo {
    height: 76px;
    margin-right: 20px; /* Adjust the space between the logo and the title as necessary */
}

.invoice-title {
    flex-grow: 1;
    margin: 0;
    font-weight: 500;
}

.top-right-text {
    margin: 0;
    text-align: right; /* Ensure the text is aligned to the right */
}


.header-section, .footer-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.bdetails {
    padding: 5px 0px;
}

.address-section {
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 20px;
}

.left, .right {
    width: 22%;
}

.buyer-section {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 5px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.text-right {
    text-align: right;
}

.tax th, .tax td {
    text-align: center;
}

.computer-generated {
    text-align: center;
    margin-top: 6px;    
}

.no-border td {
    border-top: none !important;
    border-bottom: none !important;
}

.no_border td {
    border-bottom: none !important;
}

.footer {
    position: fixed;
    bottom: 20mm; /* Adjust according to your page margin */
    width: 100%;
    text-align: center;
    display: none;
}

.continue {
    display: none;
    text-align: center;
    padding-top: 10px;
}
.mitechdetails{
    padding: 10px 0px;
}
p {
    margin: 0 0 -4px !important;
}
.dark-blue-line {
    border: 2px solid #5499aa;
}
.dark-blue-line.first {
    border: 2px solid #5499aa;
    margin: 5px !important;
}
.bill_title{
    text-align:center;
    font-weight: 600;
}

.customer_details {
  font-family: Arial, sans-serif; /* Set font for better readability */
}

.customer_details p {
  margin: 0; /* Remove default margin */
  padding: 10px 0;
  display: flex; /* Use flexbox for alignment */
  align-items: center; /* Center items vertically */
}

.customer_details span {
  margin-right: 20px; /* Space between items */
  flex: 1; /* Allow spans to grow and take equal space */
}

.customer_details span:last-child {
  margin-right: 0; /* Remove margin from the last span */
}
.qrcode{
    height:180px;
}
.qrcodeno{
    padding: 0px 16px;}

.qr-code-cell {
        border-top: none;
        border-bottom: none;
        border-left: none;
        width: 150px; /* Adjust as needed */
    }


@media print {
    .invoice {
        width: 100%;
        max-width: 100%;
        page-break-after: always;
    }
    
    .continue {
        display: block;
    }

    .footer {
        display: block;
    }

    .page-break {
        page-break-before: always;
    }
    /* Dashed Line Styling */
.dashed-line {
    border: none;
    border-left: 2px dashed #000; /* Vertical dashed line */
    height: 100%; /* Full height of the container */
    position: absolute;
    left: 50%; /* Center the dashed line */
    top: 0;
    bottom: 0;
    transform: translateX(-50%); /* Adjust to center the line properly */
}
.customer_details {
    width: 45%; /* Decrease width for each section to provide space */
    padding: 0 10px; /* Add padding for spacing around the content */
}

.text-left {
    text-align: left;
}

.text-right {
    text-align: left; /* Align text to the left in the "From" section */
}
.signPara {
    padding-left: 25px!important;
}
}

</style>
</head>
<body>

<?php 
 $adminModel = new \App\Models\AdminModel();
 $wherecond1 = [];

 if(!empty($invoice_data)){ 

 $wherecond1 = [
    'tbl_iteam.is_deleted' => 'N',
    'tbl_iteam.invoice_id' =>$invoice_data->id
];

}

$item_data = $adminModel->getalldata('tbl_iteam', $wherecond1);
// echo'<pre>';print_r($item_data);die;
?>
    <div class="invoice">
        <div class="header">
            <img src="<?=base_url();?>public/assets/images/logo.webp" alt="Logo" class="logo"> 
              
                <br>
        </div>
        <div class="text-center">  
            <span><b>Contact No.</b> +91 8459639126</span>&nbsp;&nbsp; 
            <span><b>Email Id.</b> nakshatraaestheticspune@gmail.com</span>
        </div> 
        <hr class="dark-blue-line first">
        <h2 class="bill_title"> Delivery Challan</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- "To" Section -->
                <div class="col-md-6 customer-details text-left" style="border-right: 2px solid #000; padding-right: 20px;">
                    <div><b>To:</b></div>
                    <p><span><b>Name :</b> <?php if(!empty($challan_data)){ echo $challan_data[0]->customer_name; }?> </span></p> 
                    <p><span><b>Delivery Address :</b> <?php if(!empty($challan_data)){ echo $challan_data[0]->delivery_address; }?> </span></p>
                    <p><span><b>Contact :</b> <?php if(!empty($challan_data)){ echo $challan_data[0]->customer_mobile; }?> </span></p> 
                    <!-- <p><span><b>Bill Number :</b> <?php if(!empty($challan_data)){ echo $challan_data[0]->invoiceNo; }?> </span></p> -->
                    <!-- <p><span><b>Bill Date :</b> <?php if(!empty($challan_data)){ echo $challan_data[0]->invoice_date; }?> </span></p>  -->
                </div>
                <!-- "From" Section -->
                <div class="col-md-6">
                    <div><b>From:</b></div>
                    <p><span><b>Name :</b> Nakshatra Aesthetics </span></p> 
                    <p><span><b>Address :</b> Lakshmi chowk, Moshi, PCMC, Pune, Maharashtra- 412105 </span></p>
                    <!-- <p><span><b>Pincode :</b> 412105 </span></p>  -->
                    <!-- <p><span><b>Contact :</b> <b>+91 8459639126</b></span></p>  -->
                </div>
            </div>
        </div>


        <hr class="dark-blue-line">

        <table  style="margin-bottom: 0px !important;">
            <thead>
                <tr>
                    <th  class="text-center">Sr. No.</th>
                    <th  class="text-center">Product Name</th>
                    <th  class="text-center">Wt/Unit</th>
                    <th  class="text-center">Qty</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($item_data)){ $i=1;
                    ?>
                    <?php foreach($item_data as $data){

                    $wherecond = array('is_deleted' => 'N', 'id' => $data->product_id);
                    $product_data = $adminModel->getsingleuser('tbl_product', $wherecond);

                    // echo "<pre>";print_r($product_data);exit();

                     ?>
                    <tr class="no-border">
                        <td class="text-center"><?=$i;?></td>
                        <td><b><?php if(!empty($product_data)){ echo $product_data->product_name;} ?></b></td>
                        
                        <td style="text-align: center;"><?=$data->price; ?></td>
                        <td style="text-align: center;"><b><?=$data->quantity; ?></b></td>
                    </tr>
                 <?php $i++;} ?>
                 <?php } ?>
            </tbody>
        </table>

     <!-- Stamp and Signature -->
<div class="row m-3">
    <div class="d-flex align-items-center" style="width: 100%; justify-content: space-around;">
        <!-- Stamp Image -->
        <span>
            <img src="<?=base_url();?>public/assets/images/demoStamp1.png" alt="Stamp" class="img-fluid" style="width: 150px;">
        </span>
        <!-- Signature Image -->
        <span>
            <img src="<?=base_url();?>public/assets/images/sign.jpeg" alt="Signature" class="img-fluid" style="width: 150px;">
        </span>
    </div>
    <p class="signPara p-5" style="padding-left: 25px;">Authorized Signatory</p>
</div>

        <div class="text-right" >
            <b>Delivery Date: 
            <?php if (!empty($challan_data)) {
                $date = new DateTime($challan_data[0]->courier_date);
                echo $date->format('d/m/Y'); // Format the date to DD/MM/YYYY
            } ?>
        </b>
        </div>




      

    </div>
</body>
</html>