<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'dataEntrada' => 'required',
            'quantidade' => 'required',
            'precoCusto' => 'required',
            'fornecedor_id' => 'required',
            'produto_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dataEntrada.required' =>'Preencha o campo DATA ENTRADA',
            'quantidade.required' =>'Preencha o campo QUANTIDADE',
            'precoCusto.required' =>'Preencha o campo PREÇO DE CUSTO',
            'fornecedor_id.required' =>'Selecione um FORNECEDOR',
            'produto_id.required' =>'Selecione um PRODUTO',
        ];
    }
}
