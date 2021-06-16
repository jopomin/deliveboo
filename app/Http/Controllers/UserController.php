<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;

class UserController extends Controller
{
    public function index()
    {
        $restaurant = User::all();
        $data = [
            'restaurants' => $restaurant
        ];

        return view('guest.restaurant', $data);
    }

    public function show($id)
    {
        $restaurants = User::findOrFail($id);
        $products = Product::where([['user_id',$id],['visible', 0 ]])->get();
        $data = [
            'restaurant' => $restaurants,
            'menu' => $products
        ];
        return view('guest.restaurant_details',$data);
    }
}
