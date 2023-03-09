<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
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
            'nome' => ['required', 'min:3', 'max:100'],
            'descricao' => ['required', 'min:3', 'max:100'],
            'preco' => ['required', 'min:3', 'max:100'],
            'quantidade' => ['required', 'min:0', 'max:100'],
            'imagem' => 'mimes:jpg,bmp,pnwg',
            'categoria_id' => ['required', 'min:1', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'required'  => ' O campo ":attribute" é obrigatorio',
            'descricao.max' => "O campo deve ter no máximo 100 caracteres.",
            'preco.max' => "O campo deve ter no máximo 100 caracteres.",
            'quantidade.max' => "O campo deve ter no máximo 100 caracteres.",
            'imagem.max' => "O campo deve ter no máximo 100 caracteres.",
            'categoria_id.max' => "O campo deve ter no máximo 100 caracteres.",
        ];
    }
}
