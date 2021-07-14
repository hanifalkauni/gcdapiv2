<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\BaseApiRequest;

class UpdateItemRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'itemId' => 'required|integer',
            'itemName' => 'required',
            'itemUnitOfQuantity'=>'required|string'
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
