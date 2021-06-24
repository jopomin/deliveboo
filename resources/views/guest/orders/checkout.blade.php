<?php

$amount = $request->amount;
$nonce = $request->payment_method_nonce;
dd($nonce);

$result = $gateway->transaction()->sale([
    'amount' => $amount,
    'paymentMethodNonce' => $nonce,
    'customer' => [
        'firstName' => 'Tony',
        'lastName' => 'Stark',
        'email' => 'tony@avengers.com',
    ],
    'options' => [
        'submitForSettlement' => true
    ]
]);

if ($result->success) {
    $transaction = $result->transaction;

    return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);

}
    
else {
    $errorString = "";

    foreach ($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
    }

    return back()->withErrors('An error occurred with the message: '.$result->message);
};