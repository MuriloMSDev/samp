<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => "required|string|email|max:255|unique:users,email,{$this->user->id}",
            'password' => 'nullable|string|min:8|confirmed',
        ];

        return $rules;
    }
}
