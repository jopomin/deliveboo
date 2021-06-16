<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
<<<<<<< HEAD
        $restaurants = User::all();

        return response()->json([
            'success' => true,
            'results' => $restaurants
=======

        $users = User::all();

        return response()->json([
            'success' => true,
            'results' => $users
>>>>>>> a7048406b3c153715800672b440571522f031d9f
        ]);
    }
}
