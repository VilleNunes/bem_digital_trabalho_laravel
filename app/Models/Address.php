<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'city',
        'state',
        'zip',
        'road',
        'neighborhood',
        'complement',
        'number',
    ];

    // Um endereço pode estar vinculado a uma instituição
    public function institution(): HasOne
    {
        return $this->hasOne(Institution::class, 'address_id', 'id');
    }

    // Um endereço pode estar vinculado a um usuário
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'address_id', 'id');
    }
}
