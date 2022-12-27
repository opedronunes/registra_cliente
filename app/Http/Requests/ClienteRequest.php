<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Validation\Rules\Unique;

class ClienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string'],
            'rg' => ['required', ValidationRule::unique('clientes')->ignore($this->cliente)],
            'email' => ['required', 'email'],
            'telefone' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'imagem' => ['nullable', 'string'],
        ];
    }
}
