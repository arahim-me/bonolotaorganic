<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierLog extends Model
{
    protected $fillable = [
        'courier_shipment_id',
        'courier',
        'action',
        'status',
        'request_data',
        'response_data',
        'error_message',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'request_data' => 'array',
            'response_data' => 'array',
        ];
    }

    public function shipment()
    {
        return $this->belongsTo(CourierShipment::class);
    }
}
