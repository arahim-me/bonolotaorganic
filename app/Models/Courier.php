<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'api_key',
        'secret_key',
        'client_id',
        'client_secret',
        'username',
        'password',
        'base_url',
        'store_id',
        'is_active',
        'is_test_mode',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'api_key' => 'encrypted',
            'secret_key' => 'encrypted',
            'client_id' => 'encrypted',
            'client_secret' => 'encrypted',
            'username' => 'encrypted',
            'password' => 'encrypted',

            'is_active' => 'boolean',
            'is_test_mode' => 'boolean',
        ];
    }

    // Scope: Active Couriers
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
