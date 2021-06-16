<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function index() 
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('admin.home', compact('products'));
    }
}
