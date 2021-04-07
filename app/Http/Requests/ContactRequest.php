<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       => 'required|string',
            'message'       => 'required|string',
            'email'       => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required'    => 'Renseignez votre sujet',
            'message.required' => 'Renseignez votre message',
            'email.required' => 'Renseignez votre email',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
