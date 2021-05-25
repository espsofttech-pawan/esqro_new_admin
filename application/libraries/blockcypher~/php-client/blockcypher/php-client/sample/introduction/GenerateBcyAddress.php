<?php

// Make new address; returns private key/public key/address
// Run on console:
// php -f .\sample\introduction\GenerateBcyAddress.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Api\AddressKeyChain;
use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\AddressClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'test', 'bcy', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

// For Sample Purposes Only.
$addressKeyChain = new AddressKeyChain();
$request = clone $addressKeyChain;

$addressClient = new AddressClient($apiContext);
$addressKeyChain = $addressClient->generateAddress();

ResultPrinter::printResult("Create Multisig Address", "AddressKeyChain", $addressKeyChain->getAddress(), $request, $addressKeyChain);