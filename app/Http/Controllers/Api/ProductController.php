<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();

        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }
}
