<?php

// Run on console:
// php -f .\sample\block-api\BlockHeightEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\BlockClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$blockClient = new BlockClient($apiContext);
$params = array(
    'txstart' => 1,
    'limit' => 1,
);
$block = $blockClient->get('293000', $params);

ResultPrinter::printResult("Get Block With Paging", "Block", $block->getHash(), null, $block);