<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class BatteryRequest extends FormRequest
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
            'Battery_Capacity'=>'required',
            'Type_Battery'=>'required',
            'Support_Charger'=>'required',
            'Charger_With_Phone'=>'required',
            'Battery_Technology'=>'required',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {

        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }
}
