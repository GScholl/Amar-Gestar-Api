<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'biography',
        'cpf',
        'email',
        'password',
        'phone',
        'device_token',
    ];
    
}
