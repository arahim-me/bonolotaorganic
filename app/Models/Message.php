<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'email',
        'phone',
        'title',
        'message',
        'is_read',
        'read_by',
        'read_at'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function reader()
    {
        return $this->belongsTo(User::class, 'read_by');
    }
}
