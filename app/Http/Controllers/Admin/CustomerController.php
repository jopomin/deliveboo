<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index() {
        $recent_customers = DB::table("placed_orders")
            ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
            ->join("products", "product_id", "=", "products.id")
            ->join("users", "user_id", "=", "users.id")
            ->select("placed_orders.customer_name as name", "placed_orders.address_delivery as address", "placed_orders.created_at as date")
            ->where("users.id", "=", Auth::id())
            ->groupBy("placed_orders.id")
            ->orderBy("date", "desc")
            ->get();
    
        return view('admin.customers.index', compact('recent_customers'));
    }
}
