<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'             => 'required|max:255',
            'description'      => 'required',
            'tool'             => ['exists:tools,id'],
            'language_tool_id' => ['exists:language_tool,id'],
            'image'            => 'image|mimes:png,jpg,jpeg',
            'documentation'    => ['file', 'mimes:application/json,json'],
        ];

        if (!$this->project) {
            $rules['language_tool_id'][] = 'required';
            $rules['tool'][]             = 'required';
            $rules['documentation'][]    = 'required';
        }

        return $rules;
    }
}
