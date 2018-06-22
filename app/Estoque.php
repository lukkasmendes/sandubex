<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estoque extends Model
{
    use Notifiable;
    protected $fillable = [
        'precoCusto',
        'quantidade',
        'produto_id'
    ];



    public function produtos(){
        return $this->hasMany('App\Produto');
    }


    protected $table = 'Estoques';
}
