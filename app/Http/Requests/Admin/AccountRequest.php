<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $admin = user('admin');
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => "required|string|email|max:255|unique:admins,email,{$admin->id}",
            'password' => 'nullable|string|min:8|confirmed',
        ];

        return $rules;
    }
}
