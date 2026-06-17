<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGwateway extends Model
{
    protected $fillable = [
        'provider_id',
        'api_key',
        'client_id',
        'client_secret',
        'mode',
        'merchant_id',
        'merchant_number',
        'merchant_name',
        'status_id',
    ];

    public function provider()
    {
        return $this->belongsTo(PaymentMethod::class, 'provider_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
