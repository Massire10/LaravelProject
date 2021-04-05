<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|string|between:2,100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function message()
    {
        return [
            'email.required'    => 'Le champ email est obligatoire',
            'password.required' => 'Le champ mot de passe est obligatoire',
            'remember_me.required' => 'Le champ seouvenir de moi est obligatoire',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
