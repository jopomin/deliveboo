<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placed_order extends Model
{
    protected $fillable = [
        'customer_name', 'customer_phone', 'customer_doorbell', 'total_price', 'address_delivery', 'order_comment', 'product_comment', 'payment_status'
    ];

    public function in_orders()
    {
        return $this->hasMany('App\In_order');
    }
}
