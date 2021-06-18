<?php

use Illuminate\Database\Seeder;
use App\InOrder;

class InOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inorders = config('inorders');
        foreach($inorders as $inorder) {
            $new_inorder = new InOrder();
            $new_inorder->product_id = $inorder['product_id'];
            $new_inorder->placed_order_id = $inorder['placed_order_id'];
            $new_inorder->quantity = $inorder['quantity'];
            $new_inorder->save();
        }
    }
}
