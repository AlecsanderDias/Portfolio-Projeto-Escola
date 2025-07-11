<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolClassRequest extends FormRequest
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
            'className' => 'required|min:3|max:10',
            'year' => 'required|integer|between:2021,2025',
            'schoolYear' => 'required|integer|between:1,10',
            'room' => 'required|integer|between:10,99'
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages():array
    {
        return [
            'className' => [
                'required' => 'O campo Nome da Turma é obrigatório',
                'min' => 'O campo Nome da Turma precisa ter no mínimo :min caracteres',
                'max' => 'O campo Nome da Turma precisa ter no máximo :max caracteres',
            ],
            'year' => [
                'required' => 'O campo Ano Letivo é obrigatório',
                'between' => 'O campo Ano Letivo deve estar entre :min e :max',
            ],
            'schoolYear' => [
                'required' => 'O campo Série é obrigatório',
                'between' => 'O campo Série deve estar entre as opções',
            ],
            'room' => [
                'required' => 'O campo Sala é obrigatório',
                'between' => 'O campo Sala deve estar entre as opções',
            ],
        ];
    }
}
