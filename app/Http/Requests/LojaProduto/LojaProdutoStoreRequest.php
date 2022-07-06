<?php

namespace App\Http\Requests\LojaProduto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LojaProdutoStoreRequest extends FormRequest
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
            'nome' => ['required', 'max:60', 'min:3'],
            'valor' => ['required', 'integer', 'max:999999', 'min:10'],
            'loja_id' => ['required', 'exists:lojas,id'],
            'ativo' => ['required', 'boolean'],
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
