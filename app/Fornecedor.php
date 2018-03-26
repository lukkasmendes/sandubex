<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco',
        'cnpj'
    ];

    public function fornecedor(){
        return $this->hasMany('App\Compra');
    }

}
