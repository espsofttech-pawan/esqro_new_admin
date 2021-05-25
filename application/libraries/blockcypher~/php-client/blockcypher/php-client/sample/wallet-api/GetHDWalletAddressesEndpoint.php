<?php

// Run on console:
// php -f .\sample\wallet-api\GetHDWalletAddressesEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\HDWalletClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$walletClient = new HDWalletClient($apiContext);
$addressList = $walletClient->getWalletAddresses('bob');

ResultPrinter::printResult("Get HDWallet Addresses endpoint", "AddressList", 'bob', null, $addressList);