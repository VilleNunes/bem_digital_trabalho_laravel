<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasurement extends Model
{
    /** @use HasFactory<\Database\Factories\UnitMeasurementFactory> */
    use HasFactory;

    protected $fillable = [
        'is_active','name'
    ];
}
