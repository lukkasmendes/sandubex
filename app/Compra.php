<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use Notifiable;
    protected $fillable = [
        'data',
        'fornecedor_id',
        'produto_id'
    ];

    public function compra(){
        return $this->belongsTo('App\Fornecedor');
        return $this->belongsTo('App\Produto');
    }

    protected $table = 'Compras';
}
