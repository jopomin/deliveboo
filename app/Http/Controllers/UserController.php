<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;

class UserController extends Controller
{
    public function index()
    {
        $restourant = User::all();
        $data = [
            'restourants' => $restourant
        ];

        return view('guest.restourant', $data);
    }

    public function show($id)
    {
        $restourants = User::findOrFail($id);
        $products = Product::where('user_id',$id)->get();
        $data = [
            'restourant' => $restourants,
            'menu' => $products
        ];
        return view('guest.resturants_details',$data);
    }
}
