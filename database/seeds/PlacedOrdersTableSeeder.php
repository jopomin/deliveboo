<?php

use Illuminate\Database\Seeder;
use App\Placed_order;

class PlacedOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $placorders = config('placorders');
        foreach($placorders as $placorder) {
            $new_placorder = new Placed_order();

            $new_placorder->customer_name = $placorder['customer_name'];
            $new_placorder->customer_phone = $placorder['customer_phone'];
            $new_placorder->doorbell = $placorder['doorbell'];
            $new_placorder->total_price = $placorder['total_price'];
            $new_placorder->address_delivery = $placorder['address_delivery'];
            $new_placorder->order_comment = $placorder['order_comment'];
            $new_placorder->product_comment = $placorder['product_comment'];
            $new_placorder->payment_status = $placorder['payment_status'];
            $new_placorder->created_at = $placorder['created_at'];

            $new_placorder->save();
        }
    }
}
