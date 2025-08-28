<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
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
            'day' => 'required|string',
            'hour' => 'required|string',
            'semester' => 'required|string|between:1,2',
            'subject' => 'required|integer',
            'school_class' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'day' => [
                'required' => "O campo Dia é obrigatório",
                'string' => "O valor do campo Dia é inválido",
            ],
            'hour' => [
                'required' => "O campo Horário é obrigatório",
                'string' => "O valor do campo Horário é inválido"
            ],
            'semester' => [
                'required' => "O campo Semestre é obrigatório",
                'integer' => "O valor do campo Semestre é inválido",
                'between' => "O valor do campo Semestre é inválido"
            ],
            'subject' => [
                'required' => "O campo Matéria é obrigatório",
                'integer' => "O valor do campo Matéria é inválido"
            ],
            'school_class' => [
                'required' => "O campo Turma é obrigatório",
                'integer' => "O valor do campo Turma é inválido"
            ],
        ];
    }
}
