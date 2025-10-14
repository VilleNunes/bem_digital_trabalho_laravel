<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'name'
     
    ];

    function users(){
        return $this->hasMany(User::class);
    }
}
