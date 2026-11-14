<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierShipment extends Model
{
    protected $fillable = [
        'order_id',
        'courier_setting_id',
        'courier',
        'merchant_invoice',
        'consignment_id',
        'tracking_code',
        'status',
        'cod_amount',
        'delivery_charge',
        'booking_data',
        'request_payload',
        'response_payload',
        'failure_reason',
        'booked_at',
        'delivered_at',
        'returned_at',
    ];

    protected function casts(): array
    {
        return [
            'cod_amount' => 'decimal:2',
            'delivery_charge' => 'decimal:2',
            'booking_data' => 'array',
            'request_payload' => 'array',
            'response_payload' => 'array',
            'booked_at' => 'datetime',
            'delivered_at' => 'datetime',
            'returned_at' => 'datetime',
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function courierSetting()
    {
        return $this->belongsTo(CourierSetting::class);
    }
}
