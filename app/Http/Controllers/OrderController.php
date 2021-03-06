<?php

namespace App\Http\Controllers;

use App\Product;
use App\Placed_order;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function valida(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:255',
            'customer_phone' => 'required|max:255',
            'doorbell' => 'max:255',
            'address_delivery' => 'required|max:255',
            'order_comment' => 'max:255',
            'product_comment' => 'max:255'
        ]);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $order = Placed_order::all();
        $products = Product::all();
        $cart = session()->get('cart');
        return view('guest.orders.create', compact('order', 'cart', 'products'));
    }

/*     public function pay(Request $request) {
        $data = $request->all();
        $this->valida($request);

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        $token = $gateway->ClientToken()->generate();

        $ordInfo = [
            'token' => $token,
            'data' => $data
        ];
    
        return view('guest.orders.payment', $ordInfo);
    } */
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->valida($request);
        $new_order = new Placed_order();
        $new_order->fill($data);
        $new_order->payment_status = 0;
        $new_order->save();
        $cart = session()->get('cart');
        
        for($i = 0; $i < count($data['products']); $i++) {
            if (array_key_exists('products', $data)) {
                $new_order->products()->attach($data['products'][$i], ['quantity' => $cart[$data['products'][$i]]['quantity']]);
            }
        }
        $id_order = $new_order->id;
/*         session()->forget('cart'); */
        
/*         return redirect()->route('restaurant_list')->with('success', 'Ordine effettuato'); */
        return redirect()->route('payment', compact('id_order'));



    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
