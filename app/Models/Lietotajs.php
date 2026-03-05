<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\darbinieks as Authenticatable;
use Illuminate\Notifications\Notifiable;


class darbinieks extends Authenticatable
{
    //
       use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'Vards',
        'Uzvards',
        'Email',
        'Parole',
        'LietotajaVards',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'Parole',
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
            'Parole' => 'hashed',
        ];
    }
}


