<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'position',
        'description',
        'status_id',
    ];

    // Relation with users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation with statuses
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
