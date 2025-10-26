<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'collection_point_id',
        'dia',
        'abertura',
        'fechamento'
    ];

    public function collectionPoint()
    {
        return $this->belongsTo(CollectionPoint::class);
    }
}
