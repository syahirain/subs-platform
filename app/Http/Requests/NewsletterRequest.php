<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class NewsletterRequest extends FormRequest
{

    public function rules()
    {
        return [
            'website_id' => 'required|exists:\App\Models\website,id',
            'title' => 'required|max:500',
            'description' => 'required',
            'content' => 'required',
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
            'title' => 'title is required',
            'title.max' => 'max character is 500',
            'description' => 'description is required',
            'content' => 'content is required',
        ];

    }

}