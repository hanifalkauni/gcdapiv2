<?php

namespace App\Http\Requests\SubTransaction;

use App\Http\Request\BaseApiRequest;

class CreateSubTransactionRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'transactionId' => 'required|integer',
            'subTransactionName' => 'required|string',
            'subTransactionQuantity' => 'required|numeric',
            'subTransactionTotal'=>'required|numeric'
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
