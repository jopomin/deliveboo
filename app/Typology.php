<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
