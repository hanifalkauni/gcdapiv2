<?php

namespace App\Http\Requests;


class GenerateRequest extends BaseApiRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'userId'=>'required|integer',
            'deviceId' => 'required',
            'deviceType' => 'required|in:1,2',
            'deviceToken' => 'sometimes'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
}
