<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
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

    public function institution(): HasOne
    {
        return $this->hasOne(Institution::class, 'address_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
