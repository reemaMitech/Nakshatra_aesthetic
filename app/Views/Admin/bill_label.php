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
/* For screen view */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
    font-size: 12px;
}

.invoice {
    width: 700px; /* Set a fixed width to 7 inches for screen view */
    height: auto; /* Set a flexible height */
    margin: 0 auto; /* Center the invoice */
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center; /* Center the items vertically */
    position: relative;
}

/* For print */
@media print {
    @page {
        size: 7in 4in;
        margin: 5mm; /* Adjust margin as necessary */
    }

    .invoice {
        width: 100%;
        height: 100%;
        max-width: 100%;
        padding: 10px;
        border: none;
        page-break-after: always;
        display: flex;
        justify-content: space-between;
    }

    .footer {
        display: block;
    }

    .page-break {
        page-break-before: always;
    }
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

/* Section for "To" and "From" side-by-side */
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
?>

<div class="invoice">
    <!-- Dashed line divider -->
    <div class="dashed-line"></div>

    <!-- "To" Section on the left -->
    <div class="customer_details text-left">
        <div><b>To:</b></div>
        <p><span><b>Name :</b> <?php if(!empty($invoice_data)){ echo $invoice_data->customer_name; }?> </span></p> 
        <p><span><b>Address :</b> <?php if(!empty($invoice_data)){ echo $invoice_data->delivery_address; }?> </span> </p> 
        <p><span><b>Pincode :</b>  </span></p> 
        <p><span><b>Contact :</b> <b><?php if(!empty($invoice_data)){ echo $invoice_data->contact_no; }?> </b></span> </p> 
    </div>

    <!-- "From" Section on the right, starting closer to the dashed line -->
    <div class="customer_details text-right">
        <div><b>In case of undelivered, please return to:</b></div>
        <p><span><b>Name :</b> Nakshatra Aesthetics </span></p> 
        <p><span><b>Address :</b> Lakshmi chowk, Moshi, PCMC, Pune, Maharashtra-412105 </span> </p> 
        <p><span><b>Pincode :</b> 412105 </span></p> 
        <p><span ><b>Contact :</b> <b>+91 8459639126 </b></span> </p> 
    </div>
</div>

</body>
</html>
