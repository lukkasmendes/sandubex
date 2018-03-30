<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Compra extends Model
{
    use Notifiable;
    protected $fillable = [
        'dataEntrada',
        'quantidade',
        'precoCusto',
        'fornecedor_id',
        'produto_id'
    ];

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }


    protected $table = 'Compras';
}
