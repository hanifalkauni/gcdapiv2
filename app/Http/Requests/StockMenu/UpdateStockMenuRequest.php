<?php

namespace App\Http\Requests\StockMenu;

use App\Http\Request\BaseApiRequest;

class UpdateStockMenuRequest extends BaseApiRequest
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'stockMenuId'=>'required|integer',
            'outletId' => 'required|integer',
            'menuId' => 'required|integer',
            'stockMenuDate' => 'required|date',
            'stockMenumRemains'=>'required|numeric'
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
