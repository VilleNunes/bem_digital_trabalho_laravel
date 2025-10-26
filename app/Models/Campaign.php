<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'beginning',
        'termination',
        'mark',
        'category_id',
        'institution_id'
    ];

    public function institution(){
        return $this->belongsTo(institution::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function collectionPoints()
    {
        return $this->belongsToMany(
            CollectionPoint::class,
            'campaign_collection_points', 
            'campaign_id',               
            'collection_point_id'       
        );
    }

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }

}
