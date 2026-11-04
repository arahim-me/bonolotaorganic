<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'policy_type_id',
        'title',
        'description',
    ];

    public function policyType()
    {
        return $this->belongsTo(Policy_type::class, 'policy_type_id', 'id');
    }
}
