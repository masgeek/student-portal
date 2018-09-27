<?php
require_once('security.php'); //this sings field s and encrypts data

$currency = 'KES';
$gmtTimestamp = gmdate("YmdHis");
$accessKey = 'a16505da386433a580f786f7604e3335';
$profileID = 'A06B075A-43B6-4BCC-8B7A-D770BFD2D848';
$amount = number_format(10, 2);
$transactionRef = 'P52/85958/2016'; //this will be the registration number
$transactionUUID = uniqid();//uniqid($gmtTimestamp, true);

//fields that need secuirity signing to protect from attacs and fraud
$fieldsToSign = 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency';
$signedField = sign($fieldsToSign);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fees Payment CARDS</title>
    <link rel="stylesheet" type="text/css" href="../vendor/bower-asset/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../vendor/bower-asset/font-awesome/css/font-awesome.css"/>
</head>

<body>
<div class="jumbotron text-center">
    <h1>Student FEES Payment</h1>
    <p>CARD PAYMENT</p>
</div>

<div class="container">
    <form id="payment_form" action="payment_confirmation.php" method="POST">
        <input type="hidden" name="access_key" value="<?= $accessKey ?>">
        <input type="hidden" name="profile_id" value="<?= $profileID ?>">
        <input type="hidden" name="transaction_uuid" value="<?= uniqid() ?>">
        <input type="hidden" name="signed_field_names"
               value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
        <input type="hidden" name="unsigned_field_names">
        <input type="hidden" name="signed_date_time" value="<?= gmdate("Y-m-d\TH:i:s\Z"); ?>">
        <input type="hidden" name="locale" value="en">
        <fieldset>
            <legend>Payment Details</legend>
            <div id="paymentDetailsSection" class="section">
                <span>transaction_type:</span>
                <input type="text" name="transaction_type" class="form-control" title="Transaction Type"><br/>

                <span>reference_number:</span>
                <input type="text" name="reference_number" class="form-control"><br/>

                <span>amount:</span>
                <input type="text" name="amount" class="form-control" value="<?= $amount ?>"><br/>

                <span>currency:</span>
                <input type="text" name="currency" class="form-control" value="<?= $currency ?>"><br/>
            </div>
        </fieldset>
        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-danger btn-block"/>
    </form>
</div>

<script type="text/javascript" src="../vendor/bower-asset/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../vendor/bower-asset/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="payment_form.js"></script>
</body>

</html>