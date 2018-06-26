<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use Notifiable;
    protected $fillable = [
        'nome',
        'categoria_id',
        'unidade',
        'estoque_id',
        'precoVenda',
        'estoqueMin',
        'validade',
        'descricao',
        'imagem'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function pedido(){
        return $this->hasMany('App\Pedido');
    }

    public function compra(){
        return $this->hasMany('App\Compra');
    }

    public function estoque(){
        return $this->belongsTo('App\Estoque');
    }

    protected $table = 'Produtos';
}
