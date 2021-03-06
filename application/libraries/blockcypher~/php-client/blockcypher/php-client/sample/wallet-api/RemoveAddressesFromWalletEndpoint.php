<?php

// Run on console:
// php -f .\sample\wallet-api\RemoveAddressesFromWalletEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Api\AddressList;
use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\WalletClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('2391f84fe7cc4de7be07b35a8a570dd6'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$walletClient = new WalletClient($apiContext);
// List of addresses to be removed from the wallet
$addressList = AddressList::fromAddressesArray(array(
    "13cj1QtfW61kQHoqXm3khVRYPJrgQiRM6j"
));
$wallet = $walletClient->removeAddresses('alice', $addressList);

ResultPrinter::printResult("Remove Addresses From Wallet Endpoint", "Wallet", 'alice', $addressList, $wallet);