<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'users_address';

    protected $fillable = ['street', 'neighborhood', 'zip_code','user_id','company_id','address_types_id','state_id', 'city_id'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($item) {
            $item->company_id = Auth::user()->company_id;
        });
    }

    public function TipoEndereco(){
        return $this->hasOne(UserAddressType::class,'tipo_endereco_id','id');
        
    }
}
