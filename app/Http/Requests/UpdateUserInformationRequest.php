<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserInformationRequest extends FormRequest
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
        // dd($this, $this->user);
        return [
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:40',
            'email' => [
                'required', 'email', 'min:7', 'max:30',
                Rule::unique('informations')->ignore($this->user->information_id),
            ],
            'cpf' => [
                'required', 'digits:11', 
                Rule::unique('informations')->ignore($this->user->information_id),
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'name.min' => 'O mínimo de caracteres para Nome é :min',
            'name.max' => 'O máximo de caracteres para Nome é :max',
            'surname.required' => 'O campo Sobrenome é obrigatório',
            'surname.min' => 'O mínimo de caracteres para Sobrenome é :min',
            'surname.max' => 'O máximo de caracteres para Sobrenome é :max',
            'email.required' => 'O campo Email é obrigatório',
            'email.min' => 'O mínimo de caracteres para Email é :min',
            'email.max' => 'O máximo de caracteres para Email é :max',
            'email.email' => 'O campo Email está com formato inválido',
            'email.unique' => 'Este email não pode ser utilizado',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.digits' => 'O campo CPF está com valor inválido',
            'cpf.unique' => 'Este CPF não pode ser utilizado',
        ];
    }
}
