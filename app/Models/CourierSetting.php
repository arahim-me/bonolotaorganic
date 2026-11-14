<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierSetting extends Model
{
    protected $fillable = [
        'courier',
        'name',
        'base_url',
        'credentials',
        'is_active',
        'is_default',
        'connection_status',
        'last_tested_at',
        'last_error',
    ];

    protected $hidden = [
        'credentials',
    ];

    protected function casts(): array
    {
        return [
            'credentials' => 'encrypted:array',
            'is_active' => 'boolean',
            'is_default' => 'boolean',
            'last_tested_at' => 'datetime',
        ];
    }

    public function shipments()
    {
        return $this->hasMany(CourierShipment::class);
    }
}
