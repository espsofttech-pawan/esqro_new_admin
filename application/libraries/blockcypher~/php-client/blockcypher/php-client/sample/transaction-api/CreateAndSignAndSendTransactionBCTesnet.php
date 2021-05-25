<?php

// # Create, Sign and Send TX Sample
//
// This sample code demonstrate how you can create a new transaction and send it to the network, as documented here at:
// <a href="http://dev.blockcypher.com/#creating-transactions">http://dev.blockcypher.com/#creating-transactions</a>
// API used: POST /v1/bcy/test/txs/new and
// POST /v1/bcy/test/txs/send

/** @var \BlockCypher\Api\TXSkeleton $txSkeleton */
$txSkeleton = require 'CreateTransactionWithTXBuilderBCTestnet.php';

$txClient = new \BlockCypher\Client\TXClient($apiContexts['BTC.test3']);

// source addresses private keys
// private key in the same format as returned by Generate Address Endpoint:
// http://dev.blockcypher.com/?shell#generate-address-endpoint
$privateKeys = array(
    "af5fbcbd0d760ad4fda7c85f245a4df050aff7d48b7e775320b1ac19530e957c" // Address: C5vqMGme4FThKnCY44gx1PLgWr86uxRbDm
);

// ### Sign the TX
try {
    $txClient->sign($txSkeleton, $privateKeys);
} catch (Exception $ex) {
    ResultPrinter::printError("Sign Transaction DOGE", "TXSkeleton", null, $request, $ex);
    exit(1);
}
// Source address: <a href="https://live.blockcypher.com/bcy/address/C5vqMGme4FThKnCY44gx1PLgWr86uxRbDm/">C5vqMGme4FThKnCY44gx1PLgWr86uxRbDm</a>
// Destination address: <a href="https://live.blockcypher.com/bcy/address/C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi/">C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi</a>

// For sample purposes only.
$request = clone $txSkeleton;

try {
    // ### Send TX to the network
    $txSkeleton = $txClient->send($txSkeleton);
} catch (Exception $ex) {
    ResultPrinter::printError("Send Transaction DOGE", "TXSkeleton", null, $request, $ex);
    exit(1);
}

ResultPrinter::printResult("Send Transaction DOGE", "TXSkeleton", $txSkeleton->getTx()->getHash(), $request, $txSkeleton);