<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name_fr',
        'last_name_fr',
        'first_name_ar',
        'last_name_ar',
        'sex',
        'cin',
        'nationality',
        'birth_date',
        'place_of_birth_fr',
        'place_of_birth_ar',
        'address_fr',
        'address_ar',
        'email_address',
        'family_situation',
        'mobile_phone',
        'photo_account',
    ];

    /**
     * Get the roles that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * Get the user that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
