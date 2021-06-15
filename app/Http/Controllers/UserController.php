<?php

namespace App\Http\Controllers;

use App\User;

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
}
