<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco',
        'cnpj'
    ];

    public function fornecedor(){
        return $this->hasMany('App\Compra');
    }


/*não deu certo o editar
    public function getCnpjAttribute(){
        $cnpj = $this->attributes['cnpj'];
        return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3). '.' . substr($cnpj, 5, 3). '/' . substr($cnpj, 8, 4). '-' . substr($cnpj, 12, 2);
    }

    public function getTelefoneAttribute(){
        $tel = $this->attributes['telefone'];
        return '(' . substr($tel, 0, 2). ') ' . substr($tel, 2);
    }
*/


}