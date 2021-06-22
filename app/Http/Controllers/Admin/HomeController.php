<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        $products = Product::where('user_id', Auth::id())->get();
        
        $orders_count = DB::table("placed_orders")
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->select("placed_order_id")
        ->where("user_id", "=", Auth::id())
        ->groupBy("placed_order_id")
        ->get();

        $categories_count = DB::table("categories")
        ->join("products", "category_id", "=", "categories.id")
        ->join("users", "user_id", "=", "users.id")
        ->select("category_id")
        ->where("users.id", "=", Auth::id())
        ->groupBy("category_id")
        ->get();

        $sale = DB::table("placed_orders")
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->where("user_id", "=", Auth::id())
        ->sum("total_price");

        $recent_orders = DB::table("placed_orders")
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->select("products.name as name", "products.price as price", "quantity", "placed_orders.created_at as date")
        ->where("users.id", "=", Auth::id())
        ->limit(8)
        ->orderBy("date", "desc")
        ->get();

        $recent_customers = DB::table("placed_orders")
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->select("placed_orders.customer_name as name", "placed_orders.address_delivery as address", "placed_orders.created_at as date")
        ->where("users.id", "=", Auth::id())
        ->limit(8)
        ->groupBy("placed_orders.id")
        ->orderBy("date", "desc")
        ->get();

        return view('admin.home', compact('products', 'orders_count', 'categories_count', 'sale', 'recent_orders', 'recent_customers'));
    }
}
