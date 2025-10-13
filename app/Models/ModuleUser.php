<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleUser extends Model
{
    protected $fillable = [
        'title'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
