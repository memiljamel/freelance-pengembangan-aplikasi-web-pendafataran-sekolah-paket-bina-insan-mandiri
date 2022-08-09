<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:120',
            'content' => 'required|min:8|string',
            'thumbnail' => 'required_without:title,content,date|image|max:2048|mimes:png,jpg,jpeg',
            'date' => 'required|date',
        ];
    }
}
