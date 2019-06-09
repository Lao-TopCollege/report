<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'email', 'password', 'name'
    ];

    protected $hidden = [
        'password', 'remeber_token'
    ];
}
