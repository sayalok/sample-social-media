<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'       => 'required|email',
            'password'    => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required'      => 'Email is required',
            'email.email'         => 'Not valid data',

            'password.required'   => 'Password is required',
            'password.string'     => 'Not valid data',
        ];
    }
}
