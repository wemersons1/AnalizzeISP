<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRepresentative extends Model
{
    use HasFactory;
    protected $table = 'companies_representative';
    protected $fillable = [
        'name',
        'cpf',
        'rg',
        'birth_date',
        'email',
        'phone1',
        'phone2'
    ];
}
