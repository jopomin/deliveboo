<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_order extends Model
{
    protected $fillable = [
        'quantity'
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
