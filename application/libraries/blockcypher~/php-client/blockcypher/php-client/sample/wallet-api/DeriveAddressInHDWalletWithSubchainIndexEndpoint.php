<?php

// Run on console:
// php -f .\sample\wallet-api\DeriveAddressInHDWalletWithSubchainIndexEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\HDWalletClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$walletClient = new HDWalletClient($apiContexts['BTC.main']);
$params = array('subchain_index' => 1);
$hdWallet = $walletClient->deriveAddress('bob', $params);

ResultPrinter::printResult("Derive Address in a HDWallet", "HDWallet", $walletName, null, $hdWallet);
