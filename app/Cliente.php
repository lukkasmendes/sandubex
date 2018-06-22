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

    public function caixa(){
        return $this->hasMany('App\Caixa');
    }

    public function pedido_produtos(){
        return $this->hasMany('App\PedidoProduto');
    }

    protected $table = 'Clientes';
}
