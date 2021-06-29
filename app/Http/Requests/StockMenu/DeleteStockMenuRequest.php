<?php

namespace App\Http\Requests\StockMenu;

use App\Http\Request\BaseApiRequest;

class DeleteStockMenuRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'stockMenuId'=>'required|integer',
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
