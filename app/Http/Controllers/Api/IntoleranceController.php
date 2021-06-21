<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intolerance;

class IntoleranceController extends Controller
{
    public function index() {

        $intolerances = Intolerance::with('products')->get();

        return response()->json([
            'success' => true,
            'results' => $intolerances
        ]);
    }
}
