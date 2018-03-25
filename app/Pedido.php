<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use Notifiable;
    protected $fillable = [
        'quantidade',
        'subtotal',
        'observacao',
        'formaPagamento',
        'produto_id',
        'cliente_id'
    ];

    public function caixa(){
        return $this->hasMany('App\Caixa');
        return $this->belongsTo('App\Produto');
        return $this->belongsTo('App\Cliente');
    }

    protected $table = 'Pedidos';
}
