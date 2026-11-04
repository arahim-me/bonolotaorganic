<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'position',
        'description',
        'status_id',
    ];

    // Relation with statuses
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
