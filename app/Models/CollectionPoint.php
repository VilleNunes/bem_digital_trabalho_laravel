<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionPointFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'address_id'
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }

   public function campaigns()
    {
        return $this->belongsTo(
            Campaign::class,
            
        );
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }


}
