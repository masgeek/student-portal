<?php
include 'security.php';

$amount = $_POST['amount'];
$refNumber = $_POST['reference_number'];
$currency = $_POST['currency'];
$transactionType = $_POST['transaction_type'];
?>

<html>
<head>
    <title>Confirm Payment</title>
    <!--<link rel="stylesheet" type="text/css" href="payment.css"/>-->
    <link rel="stylesheet" type="text/css" href="../vendor/bower-asset/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../vendor/bower-asset/font-awesome/css/font-awesome.css"/>
</head>
<body>
<div class="col-md-12 h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post">
            <?php
            foreach ($_REQUEST as $name => $value) {
                $params[$name] = $value;
            }
            ?>
            <fieldset id="confirmation">
                <h2 class="text-center">Review Payment Details</h2>
                <ul class="list-group">
                    <li class="list-group-item">Payment Reference: <?= $refNumber ?></li>
                    <li class="list-group-item">Amount to pay: <?= $currency . ' ' . $amount ?></li>
                    <li class="list-group-item">Transaction Type: <?= $transactionType ?></li>
                    <li class="list-group-item">
                        <input class="btn btn-outline-danger btn-block" type="submit" id="submit"
                               value="Confirm Payment"/>
                    </li>
                </ul
            </fieldset>
            <?php
            foreach ($params as $name => $value) {
                echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
            }
            echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
            ?>
        </form>
    </div>
</div>
</body>
</html>
