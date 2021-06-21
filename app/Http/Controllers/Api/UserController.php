<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Typology;

class UserController extends Controller
{

    public function index() {

        $users = User::with('typologies', 'products')->get();

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }
}
