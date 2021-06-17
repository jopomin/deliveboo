<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Typology;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $typologies = Typology::all();
        $categories = Category::all();
        return view('guest.home', compact('categories', 'typologies'));
    }
}
