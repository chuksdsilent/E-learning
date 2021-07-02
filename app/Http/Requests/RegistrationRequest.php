<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => 'required',
            'password' => 'min:6|required_with:password_confirmation',
            'password_confirmation' => 'same:password',
            'phone' => 'required',
            'country' => 'required',
            'department' => 'required',
            'role' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email is required!',
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
            'username.required' => 'Last Name is required!',
            'phone.required' => 'Phone is required!',
            'country.required' => 'Country is required!',
            'department.required' => 'Department is required!',
            'password.required' => 'Password is required!',
            'password_confirmation.same' => 'Password does not match'
        ];
    }
}
