<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddressType extends Model
{
    use HasFactory;

    protected $table = 'address_types';

    protected $fillable = ['name'];


}
