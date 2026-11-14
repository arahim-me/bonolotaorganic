<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'fee',
        'is_published',
    ];

    protected $casts = [
        'fee' => 'decimal:2',
        'is_published' => 'boolean',
    ];
}
