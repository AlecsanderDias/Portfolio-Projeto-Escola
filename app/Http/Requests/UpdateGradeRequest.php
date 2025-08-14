<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quarter' => 'required|between:1,4',
            'first_test' => 'required|between:0,10|decimal:2',
            'second_test' => 'required|between:0,10|decimal:2',
        ];
    }

    public function messages()
    {
        return [
            'quarter' => [
                'required' => 'O campo Bimestre é obrigatório',
                'between' => 'O valor do Bimestre é inválido'
            ],
            'first_test' => [
                'required' => 'O campo Nota do Primeiro Teste é obrigatório',
                'between' => 'O valor do Nota do Primeiro Teste deve estar entre :min e :max',
                'decimal' => 'O valor do Nota do Primeiro Teste deve ter :min casas decimais'
            ],
            'second_test' => [
                'required' => 'O campo Nota do Segundo Teste é obrigatório',
                'between' => 'O valor do Nota do Segundo Teste deve estar entre :min e :max',
                'decimal' => 'O valor do Nota do Segundo Teste deve ter :min casas decimais'
            ],
        ];
    }
}
