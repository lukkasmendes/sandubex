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
        'precoVenda',
        'precoCusto',
        'estoqueMin',
        'estoque',
        'descricao',
        'imagem'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    protected $table = 'Produtos';
}
