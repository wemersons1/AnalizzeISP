<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'corporate_name',
        'fantasy_name',
        'document',
        'email',
        'description',
        'representative_id',
        'phone1',
        'phone2'
    ];

    public function addresses() {

        return $this->hasMany(CompanyAddress::class, 'company_id', 'id');
    }
}
