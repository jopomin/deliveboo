<?php

use Illuminate\Database\Seeder;
use App\PlacedOrder;
use App\Product;

class PlacedOrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = Product::find(1);
        $product1->placed_orders()->sync([1, 1, 1]);
/*         $product2 = Product::find(2);
        $product2->placed_orders()->sync([13, 16, 17]);
        $product3 = Product::find(3);
        $product3->placed_orders()->sync([11, 12, 14, 17]);
        $product4 = Product::find(4);
        $product4->placed_orders()->sync([9, 13]);
        $product5 = Product::find(5);
        $product5->placed_orders()->sync([9, 14, 16, 17]);
        $product6 = Product::find(6);
        $product6->placed_orders()->sync([9, 16, 17]);
        $product7 = Product::find(7);
        $product7->placed_orders()->sync([1, 4, 5]);
        $product8 = Product::find(8);
        $product8->placed_orders()->sync([2, 3, 15]);
        $product9 = Product::find(9);
        $product9->placed_orders()->sync([14, 16, 17]);
        $product10 = Product::find(10);
        $product10->placed_orders()->sync([1, 6, 7, 8]);
        $product11 = Product::find(11);
        $product11->placed_orders()->sync([11, 14, 17]);
        $product12 = Product::find(12);
        $product12->placed_orders()->sync([9, 10, 14, 16]); */

}

}
