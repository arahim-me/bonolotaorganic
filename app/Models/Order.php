<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'invoice_id',
        'quantity',
        'price',
        'status_id',
        'order_number',
        'total',
        'shipping_address',
        'payment_method',
        'placed_at',
    ];

    protected $casts = [
        'placed_at' => 'datetime',
        'total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
