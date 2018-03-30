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
        'precoCusto',
        'precoVenda',
        'estoqueMin',
        'estoque',
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

    protected $table = 'Produtos';
}
