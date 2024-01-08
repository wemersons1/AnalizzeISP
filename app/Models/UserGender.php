<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGender extends Model
{
    use HasFactory;
    protected $table = 'users_genders';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
