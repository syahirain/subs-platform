<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SendEmailRequest extends FormRequest
{

    public function rules()
    {
        return [
            'id' => 'required|exists:\App\Models\newsletter,id'
        ];
    }



    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }



    public function messages()
    {
        return [
            'id' => 'newsletter id is required',
            'id.exists' => 'newsletter id not exist'
        ];

    }

}