<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Intolerance;
use App\Typology;

class UserController extends Controller
{
    public function index()
    {
        $typologies = Typology::all();
        $restaurant = User::all();
        $data = [
            'typologies' => $typologies,
            'restaurants' => $restaurant
        ];

        session()->forget('cart');

        return view('guest.restaurant', $data);
    }

    public function show($id)
    {
        $restaurants = User::findOrFail($id);
        $products = Product::where([['user_id',$id]])->get();
        $intolerances = Intolerance::all();
        $typologies = Typology::all();
        $data = [
            'restaurant' => $restaurants,
            'menu' => $products,
            'intolerances' => $intolerances,
            'typologies' => $typologies
        ];
        return view('guest.restaurant_details', $data);
    }
}
