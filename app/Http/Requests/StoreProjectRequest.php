<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['required', 'string', 'min:3'],
            'title' => ['required', 'string', 'min:3'],
            'days' => ['required', 'json', 'min:1'],
            'city' => ['required', 'string', 'min:3'],
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
        ];
    }
}
