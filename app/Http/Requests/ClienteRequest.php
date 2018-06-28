<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:2',
            'telefone' => 'required',
            'email' => 'required',
            'cpf' => 'required|unique:clientes',
            'rg' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' =>'Preencha o campo NOME',
            'telefone.required' =>'Preencha o campo TELEFONE',
            'email.required' =>'Preencha o campo E-MAIL',
            'cpf.required' =>'Preencha o campo CPF',
            'cpf.unique' =>'Este CPF já está cadastrado',
            'rg.required' =>'Preencha o campo RG',
        ];
    }
}
