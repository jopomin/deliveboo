<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Placed_order;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        $token = $gateway->clientToken()->generate();
        
        return view('guest.orders.payment', [
            'token' => $token,
            'request' => $request
        ]);
    }
    
    public function checkout(Request $request)
    {
        $id_order = $_GET['id_order'];
        $placed_orders = Placed_order::find($id_order);
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        $amount = $request->amount;
        $nonce = 'fake-valid-nonce';

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Giovanni',
                'lastName' => 'Porcelli',
                'email' => 'miamail@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true,
                ]
            ]);
            
            if ($result->success) {
                $transaction = $result->transaction;
                $placed_orders->payment_status = 1;
                $placed_orders->update();
                session()->forget('cart');
                
                return view('guest.thankyou')->with('success_message', 'Transazione eseguita. ID: ' . $transaction->id);
            } else {
                $errorString = "";
                
                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }
                
                return back()->withErrors('Transazione negata: ' . $result->message);
            }
        }
    }
    