<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'order_number',
        'grand_total',
        'status_id',
        'is_accept',
        'payment_method',
        'payment_status',
        'shipping_fee',
        'shipping_address',
        'shipping_phone'
    ];

    protected $casts = [
        'is_accept' => 'boolean',
        'payment_status' => 'boolean',
        'grand_total' => 'decimal:2',
        'shipping_fee' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function courierShipments()
    {
        return $this->hasMany(CourierShipment::class);
    }

    public function latestCourierShipment()
    {
        return $this->hasOne(CourierShipment::class)->latestOfMany();
    }
}
