<?php

namespace Bjora\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'alpha_num', 'min:6', 'confirmed'],
            'gender' => ['required', 'in:Male,Female'],
            'address' => ['required'],
            'birthday' => ['required', 'date'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json($validator->errors(), 422));
//    }


}
