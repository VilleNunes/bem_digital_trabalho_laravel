<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionPointFactory> */
    use HasFactory;

    protected $fillable = [
        'name','beginning','termination','campaign_id'
    ];
}
