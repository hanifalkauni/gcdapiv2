<?php

namespace App\Http\Requests\StockItem;

use App\Http\Request\BaseApiRequest;

class UpdateStockItemRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'stockItemId'=>'required|integer',
            'outletId' => 'required|integer',
            'itemId' => 'required|integer',
            'stockItemDate' => 'required|date',
            'stockItemRemains'=>'required|numeric',
            'stockItemStatus'=>'required|string'
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
