<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['sender', 'receiver', 'subject','company','tickets','ending','type'];

    protected $casts = [
        'tickets' => 'array',
    ];
}
