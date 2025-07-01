<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Shop extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'owner',
        'address',
        'bank',
        'password',
        'recovery_code',
        'type',
    ];


}
