<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PedidoProduto extends Model
{
    use Notifiable;
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'status',
        'valor',
        'cliente_id',
        'observacao',
        'formaPagamento'
    ];

    public function produto(){
        return $this->belongsTo('App\Produto', 'produto_id', 'id');
    }

    public function pedido(){
        return $this->belongsTo('App\Pedido');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    protected $table = 'pedido_produtos';
}
