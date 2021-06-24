<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Charts\OrdersChart;

class OrderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $recent_orders = DB::table("placed_orders")
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->select("products.name as name", "products.price as price", "quantity", "placed_orders.created_at as date")
        ->where("users.id", "=", Auth::id())
        ->orderBy("date", "desc")
        ->get();
        
        return view('admin.orders.index', compact('recent_orders'));
    }
    
    public function stats() {

        $sales = DB::table("placed_orders")
        ->selectRaw('SUM(total_price) AS price, MONTH(placed_orders.created_at) AS month')
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->where("user_id", "=", Auth::id())
        ->whereYear("placed_orders.created_at", "=", "2021")
        ->groupBy("month")
        ->orderBy('month')
        ->get();

        return view('admin.orders.stats');
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
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
