<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

            'image' => ['required', 'image', 'min:3'],
            'title' => ['required', 'string', 'min:3'],
            'days' => ['required', 'json', 'min:1'],
            'city' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'regex:/\(\d{2}\)\s\d{4,5}-\d{4}/'], //, "unique:$projectsModel,phone"],
            'description' => ['required','string'], //tava faltando, por isso deu erro
            'user_id' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome do cliente', 
            'phone.required' => 'Informe o telefone do cliente', 
            'phone.unique' => 'Já existe um cadastro com esse telefone',
        ];
    }
}
