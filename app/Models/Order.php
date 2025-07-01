<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['buyer', 'baskets', 'price', 'type'];

    protected $casts = [
        'baskets' => 'array',
    ];
}
