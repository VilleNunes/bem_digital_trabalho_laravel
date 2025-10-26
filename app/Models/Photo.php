<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'filename'
    ];

    public function imageable(){
        return $this->morphTo();
    }

}
