<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'description',
        'photo_path',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }

    public function donations()
    {
        return $this->hasManyThrough(Donation::class, Campaign::class, 'institution_id', 'campaign_id');
    }


    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo_path)
            return null;

        return asset('storage/' . $this->photo_path);
    }
}
