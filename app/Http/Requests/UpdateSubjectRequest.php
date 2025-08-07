<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject_name' => 'required|string|min:3|max:20',
            'subject_hours' => 'integer|between:20,80',
            // 'teacher_id' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'subject_name' => [
                'required' => 'O campo Nome é obrigatório',
                'string' => 'O valor do campo Nome está inválido',
                'min' => 'O campo Nome precisa de no mínimo :min caracteres',
                'max' => 'O campo Nome pode ter no máximo :max caracteres',
            ],
            'subject_hours' => [
                'integer' => 'O valor do campo Carga Horária é inválido',
                'between' => 'O valor do campo Carga Horária deve estar entre :min e :max'
            ],
            'teacher_id' => [
                'integer' => 'O valor do campo Professor é inválido',
            ],
        ];
    }
}
