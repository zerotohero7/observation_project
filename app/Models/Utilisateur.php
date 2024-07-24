<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'phone_number',
        'gender',
    ];
}

