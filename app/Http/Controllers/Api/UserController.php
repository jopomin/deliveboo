<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $restaurants = User::all();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
