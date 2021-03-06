<?php

namespace App\Http\Requests\Position;

use App\Http\Requests\BaseApiRequest;

class CreatePositionRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'positionName' => 'required',
            'salary'=>'required|numeric',
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
