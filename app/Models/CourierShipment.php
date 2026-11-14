<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierShipment extends Model
{
    protected $fillable = [
        'order_id',
        'courier',
        'consignment_id',
        'tracking_code',
        'status',
        'delivery_charge',
        'cod_amount',
        'booking_response',
        'cancel_response',
        'booked_at',
        'cancelled_at',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'booking_response' => 'array',
            'cancel_response' => 'array',
            'booked_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function logs()
    {
        return $this->hasMany(CourierLog::class);
    }
}
