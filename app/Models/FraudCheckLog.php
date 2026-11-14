<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraudCheckLog extends Model
{
    protected $fillable = [
        'phone',
        'own_total_orders',
        'own_delivered_orders',
        'own_cancelled_orders',
        'pathao_result',
        'steadfast_result',
        'redx_result',
        'risk_level',
        'checked_by',
    ];

    protected function casts(): array
    {
        return [
            'pathao_result' => 'array',
            'steadfast_result' => 'array',
            'redx_result' => 'array',
        ];
    }
}
