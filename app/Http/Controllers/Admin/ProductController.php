<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Intolerance;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id',Auth::id())->get();
        $data = [
            'products' => $products
        ];
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'intolerances'=>Intolerance::all()
        ];
        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $newProduct = new Product();
        $newProduct->fill($formData);
        $newProduct->user_id = Auth::id();

        $newProduct->save();
        if(array_key_exists('intolerances', $formData)){
            $newProduct->intolerances()->sync($formData['intolerances']);
        };
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        $data = [
            'product' => $product
        ];
        return view('admin.products.show', $data);
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
                'categories' => Category::all(),
                'intolerances'=>Intolerance::all()
            ];
        }

        return view('admin.products.edit',$data);
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
        if(array_key_exists('intolerances', $data)){
            $editProduct->intolerances()->sync($data['intolerances']);
        }
        else {
            $editProduct->intolerances()->sync([]);
        };
        $editProduct->update($data);

        return redirect()->route("admin.products.index");
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

        $product->intolerances()->sync([]);


        $product->delete();

        return redirect()->route("admin.products.index");
    }
}
