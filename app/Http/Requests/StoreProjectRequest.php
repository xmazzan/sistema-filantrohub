<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //return false;                ??????????/
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        //$projectsModel = Project::class;

        return [
            'image' => ['required', 'string', 'min:3'],
            'title' => ['required', 'string', 'min:3'],
            'days' => ['required', 'json', 'min:1'],
            'city' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'regex:/\(\d{2}\)\s\d{4,5}-\d{4}/'], //, "unique:$projectsModel,phone"],
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
            'title.required' => 'Informe o título do projeto',
            'phone.required' => 'Informe o telefone do responsável',
            'document.required' => 'Informe o CPF/CNPJ do responsável',
        ];
    }
}
