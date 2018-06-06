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
            'validade' => 'required',
            'imagem' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' =>'Preencha o campo NOME',
            'precoVenda.required' => 'Preencha o campo PREÇO DE VENDA',
            'estoqueMin.required' => 'Preencha o campo ESTOQUE MÍNIMO',
            'validade.required' => 'Preencha o campo VALIDADE',
            'imagem.required' => 'Selecione uma IMAGEM',
        ];
    }
}
