<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pedido extends Model
{
    use Notifiable;
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function pedido_produtos(){
        return $this->hasMany('App\PedidoProduto')
            ->select(\DB::raw('produto_id, sum(valor) as valores, count(1) as qtd'))
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }

    public function pedido_produtos_itens(){
        return $this->hasMany('App\PedidoProduto');
    }

    public static function consultaId($where){
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }

    protected $table = 'Pedidos';
}
