<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoEndereco;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';

    protected $fillable = ['rua', 'bairro', 'CEP','tipo_endereco','tipo_endereco_id','state_id', 'city_id'];


    public function TipoEndereco(){
        return $this->hasOne(TipoEndereco::class,'tipo_endereco_id','id');
        
    }
}
