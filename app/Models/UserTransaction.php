<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'status',  // pending, paid, failed
    ];
}
