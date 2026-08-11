<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'favicon',
        'email',
        'phone',
        'socials',
        'address',
        'short_description',
        'long_description',
    ];

    protected $casts = [
        'phone' => 'array',
        'email' => 'array',
        'socials' => 'array',
        'address' => 'array',
    ];

    // public function socialLinks()
    // {
    //     return $this->hasMany(SocialLink::class, 'site_info_id', 'id');
    // }
}
