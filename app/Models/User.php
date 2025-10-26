<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_active',
        'cpf',
        'phone',
        'address_id',
        'rule_id',
        'institution_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    public function scopeUsersUnit($query)
    {
        return $query->where('institution_id', Auth::user()->institution_id)->whereHas('rule', function ($q) {
            return $q->where('name', 'user');
        });
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }

        return $query;
    }

    public function scopeEmail($query, $email)
    {
        if ($email) {
            return $query->where('email', 'LIKE', "%$email%");
        }
        return $query;
    }

    public function scopePhone($query, $tel)
    {
        if ($tel) {
            return $query->where('phone', 'LIKE', "%$tel%");
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

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : asset('images/default-avatar.png');
    }
}