<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Intolerance;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::All(),
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'intolerancess' => Intolerance::All(),
            'categorys' => Category::All(),
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|max:225",
            'price'=> "required",
            'description' => "required",
            'visibile' => "required"
        ]);
        $formData = $request->all();
        $newProduct = new Product();
        $newProduct->fill($formData);
        $newProduct->user_id = Auth::id();
        $newProduct->save();
        if(array_key_exists('intolerances', $formData)){
            $newProduct->intolerances()->sync($formData['intolerances']);
        };
        if(array_key_exists('category', $formData)){
            $newProduct->category()->sync($formData['category']);
        };

        return redirect()->route('product.index');
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
        return view('product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Product::findOrFail($id)){
            $data = [
                'product' => Product::findOrFail($id),
                'intolerances' => Intolerance::all(),
                'category' => Category::all(),
            ];
        }

        return view('product.edit',$data);
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
        $data = $request->all();
        

        $editProduct = Product::findOrFail($id);
        if(array_key_exists('category', $data)){
            $editProduct->category()->sync($data['category']);
        }
        else {
            $editProduct->category()->sync([]);
        };

        if(array_key_exists('intolerance', $data)){
            $editProduct->intolerance()->sync($data['intolerance']);
        }
        else {
            $editProduct->intolerance()->sync([]);
        };


        $editProduct->update($data);

        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route("product.index");
    }
}
