<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'firstname',
        'lastname',
        'phone_number',
        'email',
        'password',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 'is_active' => 'boolean'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function payments(): HasMany
    {
        return $this->hasMany(DwollaTransactionHistory::class, 'user_id', 'id');
    }

    public function getAccountAddedAttribute(): bool
    {
        return $this->dwolla()->exists();
    }

    public function dwolla(): hasOne
    {
        return $this->hasOne(Dwolla::class, 'user_id', 'id');
    }

    public function getAccountVerifiedAttribute(): bool
    {
        return $this->dwolla()->exists() ? $this->dwolla->is_verified : false;
    }
}
