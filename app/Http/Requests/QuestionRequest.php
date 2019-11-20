<?php

namespace Bjora\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuestionRequest extends FormRequest
{
    /**
     * Request for Adding new question
     */


    public function authorize()
    {
        return true;
    }

    /**
     * Question must be filled
     * Topic_name must be selected
     */
    public function rules()
    {
        return [
            'question' => ['required',],
            'topic' => ['required',]

        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json($validator->errors(), 422));
//    }


}
