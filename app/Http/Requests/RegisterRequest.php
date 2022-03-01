<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'input_name'                =>  'required|string',
            'email'                     =>  'required|email|unique:users', 
            'input_password'            =>  'required',
            'input_password_confirm'    =>  'required|same:input_password',
        ];
    }

    public function messages()
    {
        return [
            'input_name.required'       =>  'Required',
            'input_name.string'         =>  'Not valid',

			'email.required'            =>  'Required', 
			'email.email'               =>  'Not valid',
			'email.unique'              =>  'Email already exist',

			'input_password.required'   =>  'Required',
			'input_password_confirm.required'   =>  'Required',
			'input_password_confirm.same'   =>  'Need to be match',
        ];
    }
}
