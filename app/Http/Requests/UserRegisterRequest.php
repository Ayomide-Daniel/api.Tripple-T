<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class UserRegisterRequest extends BaseFormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email:filter|unique:users',
            'phone_number' => 'required|digits:11|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
