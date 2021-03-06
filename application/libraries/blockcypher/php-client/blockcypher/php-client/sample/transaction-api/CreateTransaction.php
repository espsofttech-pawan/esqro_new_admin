<?php

// # Create TX (without sending it)
//
// This sample code demonstrate how you can create a new transaction, as documented here at:
// <a href="http://dev.blockcypher.com/#creating-transactions">http://dev.blockcypher.com/#creating-transactions</a>
//
// API used: POST /v1/btc/main/txs/new

// Addresses used in this sample:
// Source:
// <a href="https://live.blockcypher.com/btc-testnet/address/n3D2YXwvpoPg8FhcWpzJiS3SvKKGD8AXZ4/">n3D2YXwvpoPg8FhcWpzJiS3SvKKGD8AXZ4</a>
// Destination:
// <a href="https://live.blockcypher.com/btc-testnet/address/mvwhcFDFjmbDWCwVJ73b8DcG6bso3CZXDj/">mvwhcFDFjmbDWCwVJ73b8DcG6bso3CZXDj</a>

require __DIR__ . '/../bootstrap.php';

/*/// Tx inputs
$input = new \BlockCypher\Api\TXInput();
$input->addAddress("n1ucSDLByN5GLLQuE7BMrtTWHwHtkaVkfA");

/// Tx outputs
$output = new \BlockCypher\Api\TXOutput();
$output->addAddress("mx2CngEC3kVKQpQwd84ypSuLdL5gQqwQme");
$output->setValue(10000); // Satoshis*/

/// Tx
$tx = new \BlockCypher\Api\TX();
$tx->addInput($input);
$tx->addOutput($output);

/// For Sample Purposes Only.
$request = clone $tx;

$txClient = new \BlockCypher\Client\TXClient($apiContexts['BTC.test3']);

try {
    $output = $txClient->create($tx);
} catch (Exception $ex) {
    //ResultPrinter::printError("Created Transaction", "Transaction hash", null, $request, $ex);
    //exit(1);
}

//ResultPrinter::printResult("Created Transaction", "Transaction hash", $output->getTx()->getHash(), $request, $output);

return $output;