<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status_id',
    ];
// Relation with User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
