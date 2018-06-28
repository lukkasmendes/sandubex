<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'endereco' => 'required',
            'cnpj' => 'required|unique:fornecedors',
        ];
    }

     public function messages()
    {
        return [
            'nome.required' =>'Preencha o campo NOME',
            'telefone.required' =>'Preencha o campo TELEFONE',
            'email.required' =>'Preencha o campo E-MAIL',
            'endereco.required' =>'Preencha o campo ENDEREÇO',
            'cnpj.required' =>'Preencha o campo CNPJ',
            'cnpj.unique' =>'Este CNPJ já está cadastrado',
        ];
    }
}