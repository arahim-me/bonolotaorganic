<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'user_id',
        'policy_type_id',
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function policyType()
    {
        return $this->belongsTo(Policy_type::class, 'policy_type_id', 'id');
    }
}
