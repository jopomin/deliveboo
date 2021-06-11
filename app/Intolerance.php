<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intolerance extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products() 
    {
        return $this->belongsToMany('App\Product');
    }
}
