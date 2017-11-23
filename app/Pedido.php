<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function caixa(){
        return $this->hasMany('App\Caixa');
    }
}
