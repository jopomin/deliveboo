<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intolerance extends Model
{
    protected $fillable = [
        'name', 'icon'
    ];

    public function products() 
    {
        return $this->belongsToMany('App\Product');
    }
}
