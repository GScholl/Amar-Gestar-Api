<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Pregnant extends Authenticatable
{
    use HasFactory,HasApiTokens;
  

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'type',
        'baby_name',
        'baby_genre',
        'baby_birth_date',
        'pregnant_date',
        'password',
        'phone',
        'device_token',
    ];
}
