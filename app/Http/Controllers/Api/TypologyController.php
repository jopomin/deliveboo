<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Typology;
use App\User;

class TypologyController extends Controller
{
    public function index() {

        $typologies = Typology::with('users')->get();

        return response()->json([
            'success' => true,
            'results' => $typologies
        ]);
    }
}
