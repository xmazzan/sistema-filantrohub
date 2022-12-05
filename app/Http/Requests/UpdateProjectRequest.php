<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'postcode' => ['nullable', 'string', 'regex:/\d{5}-\d{3}/'],
            'state' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'neighborhood' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'number' => ['nullable', 'string'],
            'complement' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Informe o telefone do cliente', 
            //'phone.unique' => 'Já existe um cadastro com esse telefone',
            'document.required' => 'Informe o CPF do cliente',
            //'document.unique' =>'Já existe um cadastro com esse CPF',
        ];
    }
}
