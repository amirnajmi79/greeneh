<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class
 APIRequest extends FormRequest
{
    /**
     * Determine if user authorized to make this request
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator): array
    {

        $data = [
            'status'=>'error',
            'message'=> 'اطلاعات ارسالی صحیح نیست',
            'result' => $validator->errors()
        ];

        throw new HttpResponseException(response()->json(['data' => $data], 422));
    }
    abstract public function rules();
}
