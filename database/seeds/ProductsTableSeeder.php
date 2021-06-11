<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('products');
        foreach($products as $product) {
            $new_product = new Product();
            $new_product->user_id = $product['user_id'];
            $new_product->category_id = $product['category_id'];
            $new_product->name = $product['name'];
            $new_product->price = $product['price'];
            $new_product->description = $product['description'];
            $new_product->image = $product['image'];
            $new_product->visible = $product['visible'];
            $new_product->save();
        }
    }
}
