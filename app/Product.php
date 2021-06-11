<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'image', 'visible'
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

    public function in_orders()
    {
        return $this->hasMany('App\In_order');
    }
}
