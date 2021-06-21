<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlacedOrder extends Model
{
    protected $fillable = [
        'customer_name', 'customer_phone', 'doorbell', 'total_price', 'address_delivery', 'order_comment', 'product_comment', 'payment_status'
    ];

    public function products()
    {
        return $this->hasbelongsToMany('App\Products');
    }
}
