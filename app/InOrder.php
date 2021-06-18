<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InOrder extends Model
{
    protected $fillable = [
        'product_id', 'placed_order_id', 'quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function placed_order()
    {
        return $this->belongsTo('App\Placed_order');
    }
}
