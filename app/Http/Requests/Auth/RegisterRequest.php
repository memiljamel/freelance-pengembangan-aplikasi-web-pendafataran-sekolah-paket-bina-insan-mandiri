<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required|string|min:3|max:70',
            'nickname' => 'required|string|min:3|max:70',
            'avatar' => 'required|image|max:2048|mimes:png,jpg,jpeg',
            'phone_number' => 'required|numeric|digits_between:11,13|unique:users,phone_number',
            'password' => 'required|string|min:8|max:50',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'place_of_birth' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'religion' => 'required|in:Islam,Protestan,Katolik,Hindu,Buddha,Khonghucu',
            'everyday_language' => 'required|string|max:50',
            'body_height' => 'required|numeric|gt:0|max:300',
            'body_weight' => 'required|numeric|gt:0|max:300',
            'address' => 'required|min:8|string|max:120',
            'distance' => 'required|numeric|gt:0|max:127',
            'father_name' => 'required|string|min:3|max:70',
            'mother_name' => 'required|string|min:3|max:70',
            'father_education' => 'required|in:SD,SLTP,SLTA,D3,S1,S2,S3',
            'mother_education' => 'required|in:SD,SLTP,SLTA,D3,S1,S2,S3',
            'father_job' => 'required|string|max:50',
            'mother_job' => 'required|string|max:50',
            'father_age' => 'required|numeric|gt:0|max:127',
            'mother_age' => 'required|numeric|gt:0|max:127',
            'education_category' => 'required|string|max:50',
            'other_choice' => 'nullable|string|max:50',
            'birth_certificate' => 'required|image|max:2048|mimes:png,jpg,jpeg',
            'identity_card' => 'required|image|max:2048|mimes:png,jpg,jpeg',
            'family_card' => 'required|image|max:2048|mimes:png,jpg,jpeg',
        ];
    }
}
