<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:40',
            'post.body' => 'required|string|max:4000',
        ];
    }
    
//     protected function failedValidation(Validator $validator)
// {
//     $res = response()->json([
//         'errors' => $validator->errors(),
//         ],
//         400);
//     throw new HttpResponseException($res);
// }
}
