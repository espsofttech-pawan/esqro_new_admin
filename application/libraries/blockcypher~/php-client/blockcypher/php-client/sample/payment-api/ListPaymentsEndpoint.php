<?php

// Run on console:
// php -f .\sample\payment-api\ListPaymentsEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\PaymentForwardClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$paymentForwardClient = new PaymentForwardClient($apiContext);
$paymentForwardArray = $paymentForwardClient->listForwardingAddresses();

ResultPrinter::printResult("List all PaymentForwards", "PaymentForward[]", null, null, $paymentForwardArray);