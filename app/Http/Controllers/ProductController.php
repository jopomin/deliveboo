<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Intolerance;
use App\User;
use Illuminate\Support\Facades\Session;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Product::where('user_id',$id)->get();
        $data = [
            'products' => $products
        ];

        return view('products', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $data = [
            'products' => $product
        ];
        return view('product_details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function cart($id)
    {
        $restaurant = User::findOrFail($id);

        return view('guest.cart', compact('restaurant'));
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart) 
        {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image,
                        "user_id" => $product->user_id
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Prodotto aggiunto al carrello');
        }
        if(isset($cart[$id])) 
        {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Prodotto aggiunto al carrello');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image,
            "user_id" => $product->user_id
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Prodotto aggiunto al carrello');

    }

    public function updatecart($id)
    {
        $cart = session()->get('cart');
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Prodotto aggiunto al carrello');
    }

    public function removecart($id)
    {
        $cart = session()->get('cart');
        if($cart[$id]['quantity']>1)
        {
        $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function cartdestroy(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
            return redirect()->back();
        }
        
    }

    public function resetCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrello svuotato');
    }

    public function prova()
    {
        $data = session()->get('cart');

        $dataProva = [
            'data' => $data
        ];
        return view('prova' , $dataProva);
    }
}
