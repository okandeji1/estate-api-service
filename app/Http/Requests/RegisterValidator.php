<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidator extends FormRequest
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
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            // 'username' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string|exists:roles,user_type',
            'phoneNumber' => 'sometimes|required|numeric'
        ];
    }
}
