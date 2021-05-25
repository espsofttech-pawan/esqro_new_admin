<?php

// # Create TX Sample (without sending it)
//
// This sample code demonstrate how you can create a new transaction, as documented here at:
// <a href="http://dev.blockcypher.com/#creating-transactions">http://dev.blockcypher.com/#creating-transactions</a>
// Destination address is a multisig address.
// API used: POST /v1/bcy/test/txs/new

require __DIR__ . '/../bootstrap.php';

// Create a new instance of TX object
$tx = new \BlockCypher\Api\TX();

$input = \BlockCypher\Builder\TXInputBuilder::aTXInput()
    ->addAddress("n4pECCwkz1EF8E7aiLH5HYFVXJD3QXEv7w")
    ->build();

$output = \BlockCypher\Builder\TXOutputBuilder::aTXOutput()
    ->addAddress("n4pECCwkz1EF8E7aiLH5HYFVXJD3QXEv7w")
    ->withValue(1)
    ->build();

$tx = \BlockCypher\Builder\TXBuilder::aTX()
    ->addTXInput($input)
    ->addTXOutput($output)
    ->build();

// For Sample Purposes Only.
$request = clone $tx;

$txClient = new \BlockCypher\Client\TXClient($apiContexts['BTC.test3']);

try {
    // ### Create New TX
    $txSkeleton = $txClient->create($tx);
} catch (Exception $ex) {
    ResultPrinter::printError("Created TX BlockCypher Testnet", "TXSkeleton", null, $request, $ex);
    exit(1);
}

ResultPrinter::printResult("Created TX BlockCypher Testnet", "TXSkeleton", $txSkeleton->getTx()->getHash(), $request, $txSkeleton);

return $txSkeleton;