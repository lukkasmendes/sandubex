<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required',
            'precoVenda' => 'required',
            'estoqueMin' => 'required',
            'imagem' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' =>'Preencha o campo Nome',
            'precoVenda.required' => 'Preencha o campo Preço de Venda',
            'estoqueMin.required' => 'Preencha o campo Estoque Mínimo',
            'imagem.required' => 'Você deve selecionar uma imagem',
        ];
    }
}
