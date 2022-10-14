<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ProductRequest extends FormRequest
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
            'ID_Type_Products'=>'required|numeric',
            'ID_Producer'=>'required|numeric',
            'Name_Product'=>'required',
            'Price'=>'required|numeric',
            'Create_Date'=>'required',
            'Status'=>'required|boolean',
            'Active'=>'required|boolean',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {

        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }
}
