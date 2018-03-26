<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'dataEntrada',
        'quantidade',
        'precoCusto',
        'fornecedor_id',
        'produto_id'
    ];

    public function compra(){
        return $this->belongsTo('App\Fornecedor');
        return $this->belongsTo('App\Produto');
    }
}
