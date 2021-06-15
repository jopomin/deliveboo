<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Placed_order;

class OrderController extends Controller
{
    public function valida(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:255',
            'customer_phone' => 'required|max:255',
            'dorbell' => 'max:255',
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
    public function create($id)
    {
        $products = Product::where('user_id', $id)->get();
        return view('guest.orders.create', compact('products'));
    }

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
        $new_order->save();

        return redirect()->route('guest.restaurant_details')->with('status_create', 'Ordine aggiunto al carrello');
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