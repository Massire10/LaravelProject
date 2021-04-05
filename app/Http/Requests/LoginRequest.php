<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'       => 'required|email',
            'password'    => 'required|string|min:8',
            'remember_me' => 'sometimes|required|boolean',
        ];
    }

    public function message()
    {
        return [
            'email.required'    => 'Le champ email est obligatoire',
            'password.required' => 'Le champ mot de passe est obligatoire',
            'remember_me.required' => 'Le champ mot de passe est obligatoire',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
