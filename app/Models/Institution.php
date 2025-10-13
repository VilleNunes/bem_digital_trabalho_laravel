<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Institution extends Model
{
    /** @use HasFactory<\Database\Factories\InstitutionFactory> */
    use HasFactory;

    protected $fillable = [
        'fantasy_name',
        'cnpj',
        'phone',
        'email',
        'is_active',
        'address_id',
    ];

    public function adress(): HasOne
    {
        return $this->hasOne(Address::class, 'address_id');
    }
}
