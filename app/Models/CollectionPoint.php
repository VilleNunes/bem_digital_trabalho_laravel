<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionPointFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address_id'
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }

   public function campaigns()
    {
        return $this->belongsToMany(
            Campaign::class,
            'campaign_collection_points',
            'collection_point_id',
            'campaign_id'
        );
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }


}
