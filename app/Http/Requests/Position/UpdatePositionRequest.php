<?php

namespace App\Http\Requests\Position;

use App\Http\Request\BaseApiRequest;

class UpdatePositionRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'positionId' => 'required|integer',
            'positionName' => 'required',
            'salary'=>'required'
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
