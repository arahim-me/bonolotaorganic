<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressLine extends Model
{
    protected $fillable = [
        'division_id',
        'district_id',
        'upozila_id',
        'name',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function upozila()
    {
        return $this->belongsTo(Upozila::class, 'upozila_id', 'id');
    }


}
