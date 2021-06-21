<?php

use Illuminate\Database\Seeder;
use App\Placed_order;
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
        /* BEER CONDICIO */
        $product1 = Product::find(1);
        $product1->placed_orders()->attach([1], ['quantity' => 3]);
        $product2 = Product::find(2);
        $product2->placed_orders()->attach([1], ['quantity' => 2]);
        /* SAPEMORE */
        $product17 = Product::find(17);
        $product17->placed_orders()->attach([2], ['quantity' => 2]);
        $product18 = Product::find(18);
        $product18->placed_orders()->attach([2], ['quantity' => 1]);
        $product24 = Product::find(24);
        $product24->placed_orders()->attach([2], ['quantity' => 2]);
        /* ERBAVOGLIO */
        $product30 = Product::find(30);
        $product30->placed_orders()->attach([3], ['quantity' => 1]);
        $product33 = Product::find(33);
        $product33->placed_orders()->attach([3], ['quantity' => 1]);
        /* XO */
        $product40 = Product::find(40);
        $product40->placed_orders()->attach([4], ['quantity' => 2]);
        $product47 = Product::find(47);
        $product47->placed_orders()->attach([4], ['quantity' => 1]);
        /* L'INSOLITO */
        $product60 = Product::find(60);
        $product60->placed_orders()->attach([5], ['quantity' => 2]);
        $product61 = Product::find(61);
        $product61->placed_orders()->attach([5], ['quantity' => 2]);
        /* A RA GGHJAZZA */
        $product62 = Product::find(62);
        $product62->placed_orders()->attach([6], ['quantity' => 2]);
        $product65 = Product::find(65);
        $product65->placed_orders()->attach([6], ['quantity' => 2]);
        /* MOMO PIZZERIA */
        $product72 = Product::find(72);
        $product72->placed_orders()->attach([7], ['quantity' => 2]);
        $product73 = Product::find(73);
        $product73->placed_orders()->attach([7], ['quantity' => 2]);
        $product76 = Product::find(76);
        $product76->placed_orders()->attach([7], ['quantity' => 1]);
        $product78 = Product::find(78);
        $product78->placed_orders()->attach([7], ['quantity' => 1]);
        /* I-SUSHI */
        $product82 = Product::find(82);
        $product82->placed_orders()->attach([8], ['quantity' => 1]);
        $product85 = Product::find(85);
        $product85->placed_orders()->attach([8], ['quantity' => 2]);
        $product86 = Product::find(86);
        $product86->placed_orders()->attach([8], ['quantity' => 2]);
        $product87 = Product::find(87);
        $product87->placed_orders()->attach([8], ['quantity' => 1]);
        /* TIGELLA */
        $product97 = Product::find(97);
        $product97->placed_orders()->attach([9], ['quantity' => 2]);
        $product103 = Product::find(103);
        $product103->placed_orders()->attach([9], ['quantity' => 1]);
        $product108 = Product::find(108);
        $product108->placed_orders()->attach([9], ['quantity' => 1]);
        $product110 = Product::find(110);
        $product110->placed_orders()->attach([9], ['quantity' => 1]);
        /* PIZZA GOURMET */
        $product111 = Product::find(111);
        $product111->placed_orders()->attach([10], ['quantity' => 3]);
        $product113 = Product::find(113);
        $product113->placed_orders()->attach([10], ['quantity' => 1]);
        /* DAI C'ANDAM */
        $product123 = Product::find(123);
        $product123->placed_orders()->attach([11], ['quantity' => 1]);
        $product124 = Product::find(124);
        $product124->placed_orders()->attach([11], ['quantity' => 1]);
        $product126 = Product::find(126);
        $product126->placed_orders()->attach([11], ['quantity' => 1]);
        /* SOSTA EMILIANA */
        $product137 = Product::find(137);
        $product137->placed_orders()->attach([12], ['quantity' => 1]);
        $product139 = Product::find(139);
        $product139->placed_orders()->attach([12], ['quantity' => 1]);

}

}
