<?php

// Run on console:
// php -f .\sample\hook-api\WebHookIdEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('c0afcccdde5081d6429de37d16166ead'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$webHookClient = new \BlockCypher\Client\WebHookClient($apiContext);
$webHook = $webHookClient->get('d5ca3bd3-5dfb-477d-9fb4-ac3510af258d');

ResultPrinter::printResult("WebHook ID Endpoint", "WebHook", $webHook->getId(), null, $webHook);