<?php

namespace App\Http\Requests\Menu;

use App\Http\Request\BaseApiRequest;

class UpdateMenuRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'menuId'  =>'required|integer',
            'menuName' => 'required',
            'menuPrice'=>'required|numeric',
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
