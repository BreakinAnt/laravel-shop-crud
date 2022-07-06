<?php

namespace App\Http\Requests\LojaProduto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LojaProdutoUpdateRequest extends FormRequest
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
            'id' => ['required', 'exists:loja_produtos'],
            'nome' => ['sometimes', 'max:60', 'min:3'],
            'valor' => ['sometimes', 'integer', 'max:999999', 'min:10'],
            'loja_id' => ['sometimes', 'exists:lojas'],
            'ativo' => ['sometimes', 'boolean'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'errors' => $validator->errors()->all()
            ], 422));
    }
}
