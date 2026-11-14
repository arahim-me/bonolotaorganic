<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierSetting extends Model
{
    protected $fillable = [
        'courier',
        'name',
        'base_url',

        // Pathao
        'client_id',
        'client_secret',
        'username',
        'password',
        'store_id',

        // Steadfast
        'api_key',
        'secret_key',

        // RedX
        'access_token',

        // Settings
        'is_active',
        'last_tested_at',
        'connection_status',
        'last_error',
    ];

    protected $hidden = [
        'client_id',
        'client_secret',
        'username',
        'password',
        'api_key',
        'secret_key',
        'access_token',
    ];

    protected function casts(): array
    {
        return [
            'client_id' => 'encrypted',
            'client_secret' => 'encrypted',
            'username' => 'encrypted',
            'password' => 'encrypted',
            'api_key' => 'encrypted',
            'secret_key' => 'encrypted',
            'access_token' => 'encrypted',

            'is_active' => 'boolean',
            'last_tested_at' => 'datetime',
        ];
    }
}
