<?php

// Run on console:
// php -f .\sample\chain-api\ChainEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\BlockchainClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$blockchainClient = new BlockchainClient($apiContext);
$blockchain = $blockchainClient->get('BTC.main');

ResultPrinter::printResult("Get Blockchain", "Blockchain", $blockchain->getName(), null, $blockchain);