<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Intolerance;

class UserController extends Controller
{
    public function index()
    {
        $restaurant = User::all();
        $data = [
            'restaurants' => $restaurant
        ];

        session()->forget('cart');

        return view('guest.restaurant', $data);
    }

    public function show($id)
    {
        $restaurants = User::findOrFail($id);
        $products = Product::where([['user_id',$id],['visible', 0 ]])->get();
        $intolerances = Intolerance::all();
        $data = [
            'restaurant' => $restaurants,
            'menu' => $products,
            'intolerances' => $intolerances
        ];
        return view('guest.restaurant_details',$data);
    }
}
