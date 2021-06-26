<?php

namespace App\Http\Requests\Outlet;



class UpdateOutletRequest extends BaseApiRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'outletId' => 'required|integer',
            'outletName' => 'required',
            'outletLocation'=>'required',
            'outletDateOperation'=>'required|date'
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
