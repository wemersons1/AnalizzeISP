<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEndereco extends Model
{
    use HasFactory;

    protected $table = 'tipo_endereco';

    protected $fillable = ['name'];


}
