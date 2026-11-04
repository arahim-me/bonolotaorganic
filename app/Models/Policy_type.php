<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy_type extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_published',
    ];

    public function policies()
    {
        return $this->hasMany(Policy::class, 'policy_type_id');
    }
}
