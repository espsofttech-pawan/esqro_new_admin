<?php

// Run on console:
// php -f .\sample\introduction\FundAddressWithFaucetEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\FaucetClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'test', 'bcy', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$faucetClient = new FaucetClient($apiContext);
$faucetResponse = $faucetClient->fundAddress('CFqoZmZ3ePwK5wnkhxJjJAQKJ82C7RJdmd', 100000);

/// For Sample Purposes Only.
$faucet = new \BlockCypher\Api\Faucet();
$faucet->setAddress('CFqoZmZ3ePwK5wnkhxJjJAQKJ82C7RJdmd');
$faucet->setAmount(100000);

ResultPrinter::printResult("Fund Bcy Test Address", "FaucetResponse", null, $faucet, $faucetResponse);