<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'image', 'visible', 'user_id', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function intolerances()
    {
        return $this->belongsToMany('App\Intolerance');
    }
    
    public function placed_orders()
    {
        return $this->belongsToMany('App\Placed_order');
    }
}
