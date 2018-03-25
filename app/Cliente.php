<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'cpf',
        'rg'
    ];

    public function cliente(){
        return $this->hasMany('App\Pedido');
    }

    protected $table = 'Clientes';
}
