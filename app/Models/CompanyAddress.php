<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;
    protected $table = 'companies_address';
    protected $fillable = [
            'street', 
            'neighborhood', 
            'zip_code',
            'user_id',
            'company_id',
            'address_types_id',
            'state_id', 
            'city_id'
        ];

}
