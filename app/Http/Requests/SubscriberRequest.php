<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SubscriberRequest extends FormRequest
{

    public function rules()
    {
        return [
            'website_id' => 'required|exists:\App\Models\website,id',
            'name' => 'required',
            'email' => 'required|unique:subscriber'
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
            'website_id' => 'website_id is required',
            'website_id.exists' => 'website_id not exist',
            'name' => 'name is required',
            'email' => 'email is required',
            'email.unique' => 'email must be unique',
        ];

    }

}