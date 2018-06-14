<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $fillable = [
        'data',
        'tipo',
        'valor',
        'observacao'
    ];

    public function pedido(){
        return $this->belongsTo('App\Pedido');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

}
