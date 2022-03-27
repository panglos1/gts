<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|exists:users',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'username.required' => 'Entrer votre nom',
            'username.exists' => 'Cette nom n\'est pas exits',
            'password.required' => 'Entrer votre mot de pass'
        ];
    }
}
