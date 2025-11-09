<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    protected $table = "campaigns";

    protected $fillable = [
        'name',
        'phone',
        'legend_phone',
        'description',
        'is_active',
        'beginning',
        'termination',
        'mark',
        'category_id',
        'institution_id'
    ];

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function collectionPoints()
    {
        return $this->hasMany(
            CollectionPoint::class,      
        );
    }

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function scopeName($query,$name){
        if($name){
            $query->where('name','like',$name);
        }

        return $query;
    }

   public function scopeDate($query, $beginning, $termination)
    {
        if ($beginning && $termination) {
            return $query->whereBetween('beginning', [$beginning, $termination])
                        ->orWhereBetween('termination', [$beginning, $termination]);
        }

        if ($beginning) {
            return $query->where('termination', '>=', $beginning);
        }

        if ($termination) {
            return $query->where('beginning', '<=', $termination);
        }

        return $query;
    }

    public function scopeActive($query, $active)
    {

        if (is_null($active)) {
            return $query;
        }
        $status = (bool)$active;
        return $query->where('is_active', $status);
    }

  


}
